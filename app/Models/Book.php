<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'publication_year'];
    protected $hidden = [
        'laravel_through_key',
        'created_at',
        'updated_at'
    ];

    public function author(){
        return $this->hasManyThrough(
            //related model name
            '\App\Models\Author',
            //BookAuthor, that is the pivot table model
            '\App\Models\BookAuthor',
            //the current model id in the pivot table
            'book_id',
            //the related and current model id
            'id',
            'id',
            //related model id in th pivot table
            'author_id'
        );
    }
}
