<?php namespace App\Dave\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	public function project()
    {
        return $this->belongsTo('App\Dave\Models\Project');
    }

    public function pages()
    {
        return $this->hasMany('App\Dave\Models\Page');
    }

}
