<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Traits\Translatable;

class Product extends Model implements Buyable
{
    use HasFactory, Translatable;

    protected $guarded = [];

    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(ProductSubcategory::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPriceAttribute($value)
    {
        return number_format((float)$value, 2, '.', '');
    }
}
