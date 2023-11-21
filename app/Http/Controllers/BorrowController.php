<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Returnn;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Eloquent;
use DB;

class BorrowController extends Controller

{
    public function d()
    {


    }

    public function selectBox()
    {


        $users = DB::table('borrowings')
            ->rightJoin('users', 'borrowings.user_id', '=', 'users.id')
            ->whereNull('borrowings.id')
            ->select("borrowings.id", "users.id as userId", "users.Name")
            ->get();

        $books = DB::table('borrowings')
            ->rightJoin('books', 'borrowings.book_id', '=', 'books.id')
            ->whereNull('borrowings.id')
            ->select("borrowings.id", "books.id as bookId", "books.Title")
            ->get();

        return view('borrow.borrow', ['users' => $users, 'books' => $books]);
    }

    public function insert(Request $request)
    {
//
        $Due = $request->all()['Due_date'];
        $borrowing = $request->all()['Date_borrowing'];
        $user = json_decode($request->get('user'));
        $book = json_decode($request->get('book'));


        $data = ([
            'book_id' => $book,
            'user_id' => $user,
            'Date_borrowing' => $borrowing,
            'Due_date' => $Due,

        ]);
        Borrowing::insert($data);

        return redirect()->route('borrow');

    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $d=DB::table('users')->select('Name')->get();
////dd($d);
        $borrows=Borrowing::all();
//        dd($borrows->Due_date);
        $ldate = date('Y-m-d');

//        dd( round($diff / 86400));



//
//        dd($borrows);
        return view('borrow.table',['borrows'=>$borrows, $ldate] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('borrow.editBorrow',['borrow'=> Borrowing::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Due = $request->all()['Due_date'];
        $borrowing = $request->all()['Date_borrowing'];
        $user = json_decode($request->get('user'));
        $book = json_decode($request->get('book'));


        $data = ([
            'book_id' => $book,
            'user_id' => $user,
            'Date_borrowing' => $borrowing,
            'Due_date' => $Due,

        ]);
        Borrowing::findOrFail($id)->update($data);

        return redirect()->route('borrowList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow=Borrowing::findOrFail($id);
        $borrow->delete();
        return redirect()->route('borrowList');
    }


    public function return(Request $request ,string $id)
    {
        $Due = Borrowing::findOrFail($id);
//        dd($Due);

        $ldate = date('Y-m-d');
        $diff = strtotime($Due->Due_date) - strtotime($ldate);
//        dd( round($diff / 86400));

        if ($diff<0){

            $fine=(abs(round($diff/86400)))*1000;

        }else{
            $fine=0;
        }




        $data = ([
            'borrowing_id'=>$Due->id,
            'book_id' => $Due->book_id,
            'user_id' => $Due->user_id,
            'Date_returned' => $ldate,
            'Due_date' => $Due->Due_date,
            'Fine'=>$fine,

        ]);
        Returnn::insert($data);
        Borrowing::find($id)->delete();

        return redirect()->route('borrowList');
    }


}
