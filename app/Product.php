<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const PER_PAGE = 5;
    const PATH_PRODUCTS_BOOKS = '/img/products/books/';
    public $timestamps = false;

    protected $fillable = ['category', 'name', 'describe', 'url_image'];

    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    public function create($category, $name, $describe, $url_image = null)
    {
        $this->category = $category;
        $this->name = $name;
        $this->describe = $describe;
        $this->url_image = $url_image;
    }
}
