<?php namespace App\Dave\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $fillable = ['name', 'description'];

	public function owner()
    {
        return $this->belongsTo('App\Dave\Models\User', 'user_id');
    }

    public function sections()
    {
        return $this->hasMany('App\Dave\Models\Section');
    }

    public function members()
    {
        return $this->belongsToMany('App\Dave\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Dave\Models\Category');
    }

}
