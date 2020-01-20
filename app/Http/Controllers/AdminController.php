<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Price;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listProduct()
    {
        $productList = Product::with('prices')->get();
        $prices = null;
        foreach ($productList as $product) {
            $prices[] = $product->prices;
        }

        $product = null;
        if (!empty($prices)) {
            foreach ($prices as $price) {
                foreach ($price as $amount) {
                    $product[] = $amount;
                }
            }
        }
        return view('admin.products.list', compact('product', $product, 'prices', $prices));
    }

    public function showProduct($id)
    {
        $productList = Product::with('prices')->get();
        $prices = null;
        foreach ($productList as $product) {
            $prices[] = $product->prices;
        }
        $product = null;
        foreach($prices as $price) {
            foreach ($price as $amount) {
                if ($amount->id == $id) {
                    $product[] = $amount;
                }
            }
        }
        return view('admin.products.show', ['product' => $product]);
    }

    public function listPrice()
    {
        $prices = Price::all();
        return view('admin.prices.list', compact('prices', $prices));
    }

    public function createProduct(Request $request, Product $product, Price $price)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|max:150',
            'name' => 'required|max:150',
            'describe' => 'required',
            'amount' => 'required'
        ]);

        $category = $request->input('category');
        $name = $request->input('name');
        $describe = $request->input('describe');
        $amount = $request->input('amount');
        $breakIfExist = Product::where('name', $name)->first();

        if ($request->isMethod('post') || $request->isMethod('get')) {
            if ($request->input('submit_add_product')) {
                if ($validator->fails()) {
                    return redirect('/admin/createProduct')
                        ->withErrors($validator)
                        ->withInput();
                }
                if (!empty($breakIfExist)) {
                    $request->session()->flash('error', 'This Product Exist');
                } else {
                    $product->create($category, $name, $describe);
                    $product->save();

                    $product = Product::where('name', $name)->first();
                    $price->create($amount, $product->id);
                    $price->save();
                }
            }
        }
        return view('admin.products.create');
    }

    public function createPrice(Request $request, Product $product, Price $price)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'product_id' => 'required',
        ]);
        $products = $product::all();
        $productId = $request->input('product_id');
        $amount = $request->input('amount');
        if ($request->isMethod('post') || $request->isMethod('get')) {
            if ($request->input('submit_add_price')) {
                if ($validator->fails()) {
                    return redirect('/admin/createPrice')
                        ->withErrors($validator)
                        ->withInput();
                }
                $price->create($amount, $productId);
                $price->save();
            }
        }
        return view('admin.prices.create', ['products' => $products]);
    }

    public function editProduct($id)
    {
        $productList = Product::with('prices')->get();
        $prices = [];
        foreach ($productList as $product) {
            $prices[] = $product->prices;
        }
        $product = [];
        foreach($prices as $price) {
            foreach ($price as $amount) {
                if ($amount->id == $id) {
                    $product[] = $amount;
                }
            }
        }
        return view('admin.products.edit', ['product' => $product]);
    }

    public function editPrice($id)
    {
        $productList = Product::with('prices')->get();
        $prices = [];
        foreach ($productList as $product) {
            $prices[] = $product->prices;
        }
        $product = [];
        foreach($prices as $price) {
            foreach ($price as $amount) {
                if ($amount->id == $id) {
                    $product[] = $amount;
                }
            }
        }
        return view('admin.prices.edit', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required|max:150',
            'name' => 'required|max:150',
            'describe' => 'required'
        ]);

        $updateProduct = [
            'category' => $request->input('category'),
            'name' => $request->input('name'),
            'describe' => $request->input('describe'),
            'url_image' => $request->input('url_image')
        ];

        $updatePrice = [
            'amount' => $request->input('amount'),
        ];

        if ($request->input('submit_update_product')) {
            if ($validator->fails()) {
                return redirect('/admin/updateProduct/{id}')
                    ->withErrors($validator)
                    ->withInput();
            }
            $productList = Product::with('prices')->get();
            $prices = [];
            foreach ($productList as $product) {
                $prices[] = $product->prices;
            }
            $product = [];
            foreach($prices as $price) {
                foreach ($price as $amount) {
                    if ($amount->id == $id) {
                        $product[] = $amount;
                    }
                }
            }
            foreach ($product as $bind) {
                $bind->update($updatePrice);
                $bind->product->update($updateProduct);
            }
        }
        return redirect('/admin/listProduct');
    }

    public function updatePrice(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required'
        ]);

        $update = [
            'amount' => $request->input('amount'),
        ];

        if ($request->input('submit_update_price')) {
            if ($validator->fails()) {
                return redirect('/admin/updatePrice/{id}')
                    ->withErrors($validator)
                    ->withInput();
            }
            $productList = Product::with('prices')->get();
            $prices = [];
            foreach ($productList as $product) {
                $prices[] = $product->prices;
            }
            $product = [];
            foreach($prices as $price) {
                foreach ($price as $amount) {
                    if ($amount->id == $id) {
                        $product[] = $amount;
                    }
                }
            }
            foreach ($product as $bind) {
                $bind->update($update);
            }
        }
        return redirect('/admin/listPrice');
    }

    public function destroyProduct(Request $request, $id)
    {
        if ($request->input('submit_delete_product')) {
            $where = ['id' => $id];
            $del = Product::where($where)->first();
            $del->delete();
            return redirect()->back();
        }
    }

    public function destroyPrice(Request $request, $id)
    {
        if ($request->input('submit_delete_price')) {
            $where = ['id' => $id];
            $del = Price::where($where)->first();
            $del->delete();
            return redirect()->back();
        }
    }

    public function searchProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|max:150',
        ]);
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        if ($request->isMethod('post') || $request->isMethod('get')) {
            if ($request->input('submit_search_product')) {
                if ($validator->fails()) {
                    return redirect('/admin/searchProduct')
                        ->withErrors($validator)
                        ->withInput();
                }
                $findProducts = [];
                foreach ($products as $product) {
                    $findProducts[] = $product;
                }
                if (!empty($findProducts)) {
                    return view('admin.products.findResult', ['findProducts' => $findProducts]);
                } else {
                    $request->session()->flash('error', 'This Product Not Exist');
                }
            }
        }
        return view('admin.products.search');
    }
}
