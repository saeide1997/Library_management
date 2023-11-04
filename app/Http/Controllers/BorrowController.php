<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        DB::enableQueryLog();
//        $books = DB::table('books')
//            ->leftJoin('borrowings as bb','books.id','=','bb.book_id')
//            ->leftJoin('returnns as r','r.borrowing_id','=','bb.id')
//            ->where('bb.id',
//                DB::table('borrowings as b')->select('b.id')->where('b.book_id','=','books.id')
//            ->max('b.id')
//            )->where(function (Builder $query){
//                $query->whereNull('bb.id')
//                ->orWhere(function (Builder $builder){
//                    $builder->whereNotNull('bb.id')
//                        ->whereNotNull('r.id');
//                });
//            })
//        ->get();
//
//        "select * from `books` left join `borrowings` as `bb` on `books`.`id` = `bb`.`book_id`
//        left join `returnns` as `r` on `r`.`borrowing_id` = `bb`.`id`
//        where `bb`.`id` is null
//          and
//              (`bb`.`id` is null
//                   or
//               (`bb`.`id` is not null and `r`.`id` is not null)
//                  )";
//        dd(DB::getQueryLog());





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
