<?php namespace App\Dave\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	public function section()
    {
        return $this->belongsTo('App\Dave\Models\Section');
    }

}
