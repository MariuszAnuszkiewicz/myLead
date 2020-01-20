<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Traits\SortProductsTrait;

class UserController extends Controller
{
    use SortProductsTrait;

    public function index()
    {
        $products = Product::paginate(Product::PER_PAGE);
        return view('user.products.index', ['products' => $products]);
    }

    public function showProduct($id)
    {
        $where = ['id' => $id];
        $product = Product::where($where)->first();
        return view('user.products.show', ['product' => $product]);
    }

    public function searchProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|max:150',
        ]);
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', "%{$search}%")->get();
        if ($request->isMethod('post') || $request->isMethod('get')) {
            if ($request->input('submit_search_product')) {
                if ($validator->fails()) {
                    return redirect('/user/index')
                        ->withErrors($validator)
                        ->withInput();
                }
                $findProducts = [];
                foreach ($products as $key => $product) {
                    $findProducts[] = $product;
                }
                if (!empty($findProducts)) {
                    return view('user.products.findResult', ['findProducts' => $findProducts]);
                } else {
                    return redirect()->back()->with('error', ['This Product Not Exist']);
                }
            }
        }
        return view('user.products.search');
    }

    public function sortProduct(Request $request, Product $product)
    {
        $selectSort = $request->input('product_sort');
        if ($request->isMethod('post')) {
            if ($request->input('submit_sort_products')){
                $products = $this->sort($selectSort, $product);
            }
        }
        $products = !empty($products) ? $products : null;
        if (is_null($products)) {
            return redirect('/user/index');
        }
        return view('user.products.sort', ['products' => $products]);
    }
}
