<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Project extends Model
{
    //
	protected $fillable = ['title','author','image_banner','content'];
	/*
		@params making accessor for retrieving content to limit character visibility
	*/
    public function getContentShortAttribute()
    {
    	return Str::limit($this->content, 100);
    }
}
