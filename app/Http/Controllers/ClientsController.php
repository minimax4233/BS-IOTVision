<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Auth;
use Illuminate\Support\Facades\App;

class ClientsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', [
            'except' => []
        ]);
    }


    
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request, [
            'clientID' => 'required|unique:clients|max:255',
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
        $this->authorize('destroyClient', $user, $client);
        $client->delete();
        session()->flash('success', '成功删除客户端！');
        return back();
    }
}
