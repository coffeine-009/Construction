<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function children() {
        return $this->hasMany('App\Category', 'id_parent_category');
    }

    public function items() {
        return $this->hasMany('App\Item');
    }

}
