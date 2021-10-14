<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $hidden = [
        'laravel_through_key',
        'created_at',
        'updated_at'
    ];

    public function book(){
        return $this->hasManyThrough(
            //related model name
            '\App\Models\Book',
            //BookAuthor thats the pivot table model
            '\App\Models\BookAuthor',
            //the current model id in the pivot table
            'author_id',
            //the related and current model id
            'id',
            'id',
            //related model id in th pivot table
            'book_id'
        );
    }
}
