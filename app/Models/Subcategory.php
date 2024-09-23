<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subcategories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'parent', 'image'];

    public function categorys()
    {
        return $this->belongsTo('App\Category', 'parent', 'id');
    }
    public function products()
    {
        return $this->hasMany('App\Product', 'category', 'id');
    }
}
