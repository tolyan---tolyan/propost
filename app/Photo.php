<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['name', 'path', 'project_id'];

    public function project(){
    	return $this->belongsTo('App\Project');
    }
}
