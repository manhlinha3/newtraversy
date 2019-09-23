<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table name
    protected $table = 'categories';
    // Primary key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;

    public function subcategory(){
        return $this->hasMany('App\Category', 'parent_id');
    }
}
