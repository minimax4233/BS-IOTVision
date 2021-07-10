<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['showLogin']
        ]);
    }

    public function showLogin()
    {
        return view('sessions.login');
    }

    public function doLogin(Request $request)
    {
        $input = $request->all();

        $messages = [
            'account.required' => '名称或邮箱 不能为空。'
        ];
        $this->validate($request, [
            'account' => 'required|string|max:255',
            'password' => 'required'
        ], $messages);

        $fieldType = filter_var($input['account'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        
        if(Auth::attempt(array($fieldType => $input['account'], 'password' => $input['password']))){
            session()->flash('success', '欢迎回来！');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);
        }else{
            session()->flash('danger', '很抱歉，您的名称或邮箱或密码不正确！');
            return redirect()->back()->withInput();
        }

    }
    
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功登出！');
        return redirect()->route('home');
    }
}
