<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Returnn;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $users = User::all();
        $users=DB::table('returnns')->RightJoin('users','user_id','=','users.id')->get();

//        dd($fines);
        return view('identy.table', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view('identy.createUser',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'Name'=> 'required',
            'Email'=> 'required',
            'password'=> 'required',
            'Gender'=>'required',
            'Phone'=>'required'
        ]);


            User::create($data);
            // return redirect()->route('book',$book);

            return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('identy.editUser', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'Name'=> 'required',
            'Email'=> 'required',
            'password'=> 'required',
            'Gender'=>'required',
            'Phone'=>'required'
        ]);


        User::findOrFail($id)->update($data);
        // return redirect()->route('book',$book);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
