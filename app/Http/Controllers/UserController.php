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
            $usuarios = User::all();
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
        ],
        [
            'same' => 'Teste 1',
            'size' => 'Teste 2',
            'between' => 'Teste 3',
            'in' => 'teste 4',
        ]);

        if(Gate::allows('gerente')) {
            $data = $request->all();

            $usuario = new User();
            $usuario->name = $data['name'];
            $usuario->username = $data['username'];
            $usuario->email = $data['username']."@padrao.com";
            $usuario->password = Hash::make($data['password']);
            $usuario->ehGerente = '0';
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
