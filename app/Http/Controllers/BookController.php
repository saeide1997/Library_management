<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *  for showing books
     */

    public function index(Request $request)
    {
        $title = $request->input("Title");
        $books = Book::when($title, function ($query, $title) {
            return $query->title($title);
        })->get();


        $boooks=DB::table('borrowings')
            ->RightJoin('books', 'book_id','=','books.id')
            ->get();


        // $books = Book::all();

        // $data = [
        //     'books' => $books
        // ];

        return view('book.table', ['boooks' => $boooks]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books=Book::all();
        $categories=DB::table('categories')->select('Name')->get();

        return view('book.create',['books'=>$books, 'categories'=>$categories]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Date' => 'required',
            'Category' => 'required',
            'Shelf_no' => 'required',

        ]);



        Book::create($data);
        // return redirect()->route('book',$book);

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     * show one book
     */
    public function show(string $id)
    {
        return view('book.table');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=DB::table('categories')->select('Name')->get();
        return view('book.edit', ['book' => Book::findOrFail($id),'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     * handle editing form
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Date' => 'required',
            'Category' => 'required',
            'Shelf_no' => 'required'
        ]);
        Book::findOrFail($id)->update($data);

        // $request->session()->flash('success', 'library is updated');
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrfail($id);
        $book->delete();

        return redirect()->route('book.index');
    }
}
