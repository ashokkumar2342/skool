<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
 
{
	protected $fillable=['id'];
    public $tables='book_categories';
    public $timestamps=false;
}
