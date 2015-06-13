<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

}
