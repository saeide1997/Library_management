<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;



class Book extends Model
{
    use HasFactory;

    protected $fillable = ['Title','Author','Date','Category','Shelf_no'];

    public $timestamps = false;

    public function scopeTitle(Builder $query, string $title): Builder{
        return $query->where('title','like','%'. $title .'%');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }


    public function borrowing(){
        return $this->belongsTo(Borrowing::class);
    }

    public function returnn(){
        return $this->belongsTo(Returnn::class);
    }

    public function shelf(){
        return $this->belongsTo(Shelf::class);
    }


    public function scopeBook(Builder $query):Builder {
        $query->get();

    }
}
