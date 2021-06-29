<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Auth;
use Illuminate\Support\Facades\App;
use phpDocumentor\Reflection\Types\Null_;

class ClientsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function checkOwnClient(Client $client, User $user=NULL){
        if($user!=NULL){
            $currentUser=$user;
        }else{
            $currentUser=Auth::user();
        }
        if($currentUser->id != $client->user_id){
            abort(403);
        }

    }
    
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'clientID' => 'required|max:255',
            'clientName' => 'required|max:255'
        ]);
        
        $client = Client::create([
            'user_id' => $user->id,
            'clientID' => $request->clientID,
            'clientName' => $request->clientName,
            'is_online' => false
        ]);

        session()->flash('success', '客户端创建成功！');
        return redirect()->route('clients.show', [$client]);
    }

    public function show(Client $client)
    {
        //$this->authorize('showClient', Auth::user(), $client);
        
        return view('clients.show', compact('client'));
    }

    public function index(User $user)
    {
        //$this->authorize('adminOnly', Auth::user());
        $clients = Client::where('user_id','=',$user->id)->paginate(5);
        return view('clients.index', compact('clients', 'user'));
    }

    public function destroy(User $user, Client $client)
    {
        //$this->authorize('destroyClient', $client);
        if($client->user_id === $user->id){
            $client->delete();
            session()->flash('success', '成功删除客户端！');
            return back();
        }else{
            abort(403);;
        }
        
    }

    public function edit(Client $client)
    {
        if($client->user_id != Auth::user()->id && Auth::user()->is_admin === 0){
            abort(403);
        }
        return view('clients.edit', compact('client'));
    }

    public function update(Client $client, Request $request)
    {
        if($client->user_id != Auth::user()->id && Auth::user()->is_admin === 0){
            abort(403);
        }
        $this->validate($request, [
            'clientName' => 'required|max:255',
            'clientID' => 'required|max:255'
        ]);

        $data = [];
        $data['clientName'] = $request->clientName;
        $data['clientID'] = $request->clientID;
        $client->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('clients.show', $client);
    }
}
