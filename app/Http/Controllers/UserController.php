<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Gate::allows('gerente')) {
            $usuarios = User::paginate()->forget(0);
            return view('listagem.usuarios', compact('usuarios'));
        }else {
            return redirect('/');
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('gerente')) {
            return view('cadastrar.usuario');
        }else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        if(Gate::allows('gerente')) {
            $data = $request->all();

            $usuario = new User();
            $usuario->name = $data['name'];
            $usuario->username = $data['username'];
            $usuario->email = $data['username']."@padrao.com";
            $usuario->password = Hash::make($data['password']);
           
            if(array_key_exists("ehGerente", $data)){
                $usuario->ehGerente = 1;
            }else {
                $usuario->ehGerente = 0;
            }

            $usuario->save();
            
            return redirect()->route('users.index');
        }else {
            return redirect('/');
        }        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows('gerente')) {
            $user = new User();
            $user = $user->find($id);

            return view('cadastrar.usuario', compact('user'));
        }else {
            return view('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            
        ]);

        if(Gate::allows('gerente')) {
            $data = $request->all();
            $user = new User();

            if(array_key_exists("ehGerente", $data)){
                $ehGerente = 1;
            }else {
                $ehGerente = 0;
            }

            $user->where(['id'=>$id])->update([
                'name' => $data['name'],
                'email' => $data['username']."@padrao.com",
                'password' => Hash::make($data['password']),
                'ehGerente' => $ehGerente,
            ]);

            return redirect()->route('users.index');
        }else {
            return view('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('gerente')) {
            $user = new User();
            $user = $user->destroy($id);

            return($user)?"Sim":"Não";
        }else {
            return view('home');
        }
    }
}
