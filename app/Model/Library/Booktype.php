<?php

namespace App\Model\Library;

use Illuminate\Database\Eloquent\Model;

class Booktype extends Model
{
    public function subjectType()
    {
    	return $this->hasOne('App\Model\SubjectType','id','subject_id');
    }

     public function author()
    {
    	return $this->hasOne('App\Model\Library\Author','id','author_id');
    }
    public function bookCategory()
    {
        return $this->hasOne('App\Model\Library\BookCategory','id','category_id');
    }

     public function publisher()
    {
    	return $this->hasOne('App\Model\Library\Publisher','id','publisher_id');
    }
}
