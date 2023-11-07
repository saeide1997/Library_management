<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
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


        $user = DB::table('borrowings')
            ->rightJoin('users', 'borrowings.user_id', '=', 'users.id')
            ->whereNull('borrowings.id')
            ->select("borrowings.id", "users.id as userId", "users.Name")
            ->get();

        $book = DB::table('borrowings')
            ->rightJoin('books', 'borrowings.book_id', '=', 'books.id')
            ->whereNull('borrowings.id')
            ->select("borrowings.id", "books.id as bookId", "books.Title")
            ->get();

        return view('book.borrow', ['users' => $user, 'books' => $book]);
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

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
