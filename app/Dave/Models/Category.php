<?php namespace App\Dave\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {

	use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function projects()
    {
        return $this->belongsToMany('App\Dave\Models\Project');
    }
}