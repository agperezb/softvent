<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products', [
            'products' => Product::all(),
            'categories' => Category::all(),
            'providers' => Provider::all(),
        ]);
    }

    public function show_image($id){
        $product = Product::find($id);
        return $product->product_image;
    }

    public function create()
    {
        //
    }

    public function status($id)
    {
        $product = Product::find($id);

        try {
            if ($product->product_status == 1) {
                Product::where('product_id', $id)
                    ->update(['product_status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el producto exitosamente.');
            } else {
                Product::where('product_id', $id)
                    ->update(['product_status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el producto exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function store(Request $request)
    {
        $request['commerce_id'] = Auth::user()->commerce_id;
        $request->validate([
            'provider_id' => 'required|exists:categories,category_id',
            'category_id' => 'required|exists:providers,provider_id',
            'product_name' => 'required|string|max:50',
            'product_stock' => 'required|numeric|min:1',
            'file_image' => 'dimensions:min_width=800,min_height=800,max_width=800,max_height=800|required|mimes:png|file|max:1024', // . app('configuration')->configuration_file_size,
            'product_value' => 'required|numeric|min:1|regex:/^[\d]{0,6}(\.[\d]{1,2})?$/',
            'product_description' => 'required|string|max:200'
        ]);

        $request['product_status'] = 1;
        $request['product_image'] = base64_encode(file_get_contents($request->file('file_image')->getRealPath()));

        try {
            Product::create([
                'provider_id' => $request->provider_id,
                'category_id' => $request->category_id,
                'commerce_id' => $request->commerce_id,
                'product_name' => $request->product_name,
                'product_stock' => $request->product_stock,
                'product_image' => $request->product_image,
                'product_value' => $request->product_value,
                'product_description' => $request->product_description,
                'product_status' => $request->product_status,
            ]);
            return redirect()->back()->with('status', 'Producto creado exitosamente.');

        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if ($id == 'register') {
            session()->forget('id_to_update');
            return redirect()->back()->with('register', 1);
        }
        session(['id_to_update' => $id]);
        return redirect()->back()->with('data', Product::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'provider_id' => 'required|exists:categories,category_id',
            'category_id' => 'required|exists:providers,provider_id',
            'product_name' => 'required|string|max:50',
            'product_stock' => 'required|numeric|min:1',
            'file_image' => 'dimensions:min_width=800,min_height=800,max_width=800,max_height=800|mimes:png|file|max:1024', // . app('configuration')->configuration_file_size,
            'product_value' => 'required|numeric|min:1|regex:/^[\d]{0,6}(\.[\d]{1,2})?$/',
            'product_description' => 'required|string|max:200'
        ]);

        $product = Product::find($id);

        if ($request->file('file_image')) {
            $request['product_image'] = base64_encode(file_get_contents($request->file('file_image')->getRealPath()));
        } else {
            $request['product_image'] = $product->product_image;
        }

        try {
            Product::where('category_id', $id)
                ->update([
                    'provider_id' => $request->provider_id,
                    'category_id' => $request->category_id,
                    'product_name' => $request->product_name,
                    'product_stock' => $request->product_stock,
                    'product_image' => $request->product_image,
                    'product_value' => $request->product_value,
                    'product_description' => $request->product_description,
            ]);
            return redirect()->back()->with('status', 'Producto actualizado exitosamente.');

        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function destroy($id)
    {
        //
    }
}
