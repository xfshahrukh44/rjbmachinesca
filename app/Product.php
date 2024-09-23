<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['product_title', 'description', 'stock_inventory', 'price', 'is_featured', 'short_desc', 'quarter_special', 'quarter_special_price', 'rental_or_lease', 'optional', 'cost_per_page', 'product_type', 'ebrochure', 'color_type'];

    public function subcategorys()
    {
        return $this->belongsTo('App\Models\Subcategory', 'category', 'id');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'product_id', 'id');
    }

}
