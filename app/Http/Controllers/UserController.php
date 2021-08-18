<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('user.index', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('user.create', compact('User'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:posts|min:1|max:40',
            'username' => 'unique:posts|max:25',
            'email' => 'unique:posts'
        ]);

        User::create($validatedData);
        
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
        return view('user.edit', compact('User'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:40',
            'username' => 'max:25|unique:users,username',
            'email' => 'unique:users,email'
        ]);

        

        
        #create or update your data here
        $user = User::find($id);

        if(request('username')=='')
        {
            $risultatoQuery = DB::table('users')->where('users.id',$id)->select('users.username')->get();
            $username = $risultatoQuery[0]->username;
        }
        else
        {
            $username = request('username');
        }

        if(request('email')=='')
        {
            $risultatoQuery = DB::table('users')->where('users.id',$id)->select('users.email')->get();
            $email = $risultatoQuery[0]->email;
        }
        else
        {
            $email = request('email');
        }


        $user->name = request('name');
        $user->email = $email;
        $user->username = $username;

        $user->save();

        return json_encode(['status' => 'Utente modificato']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
      */



   public function destroy($id) {
        $user=User::find($id);
        $user->delete();
        return json_encode(['status' => 'Utente cancellato!']);
    }
}