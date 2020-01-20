<?php

namespace App\Traits;

trait SortProductsTrait {

    public function sort($type, $product)
    {
        switch ($type) {
            case 'ASC':
                if ($type == 'ASC') {
                    return $products = $product::orderBy('name', 'ASC')->paginate($product::PER_PAGE);
                }
            break;
            case 'DESC':
                if ($type == 'DESC') {
                    return $products = $product::orderBy('name', 'DESC')->paginate($product::PER_PAGE);
                }
            break;
            case 'BOOKS':
                if ($type == 'BOOKS') {
                    return $products = $product::where('category', '=', 'books')->paginate($product::PER_PAGE);
                }
            break;
            case 'MOVIES':
                if ($type == 'MOVIES') {
                    return $products = $product::where('category', '=', 'movies')->paginate($product::PER_PAGE);
                }
            break;
            case 'MUSIC':
                if ($type == 'MUSIC') {
                    return $products = $product::where('category', '=', 'music')->paginate($product::PER_PAGE);
                }
            break;
        }
    }
}