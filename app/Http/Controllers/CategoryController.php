<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{

    public function index()
    {
        return view('dashboard.categories', [
            'categories' => Category::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function show_image($id){
        $category = Category::find($id);
        return $category->category_image;
    }

    public function create()
    {
        //
    }

    public function status($id)
    {
        $category = Category::find($id);

        try {
            if ($category->category_active == 1) {
                Category::where('category_id', $id)
                    ->update(['category_active' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado la categoría exitosamente.');
            } else {
                Category::where('category_id', $id)
                    ->update(['category_active' => 1]);
                return redirect()->back()->with('status', 'Se ha activado la categoría exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:30',
            'file_image' => 'dimensions:min_width=128,min_height=128,max_width=128,max_height=128|required|mimes:png|file|max:1024', // . app('configuration')->configuration_file_size,
        ]);
        $request['category_active'] = '1';
        $request['category_image'] = base64_encode(file_get_contents($request->file('file_image')->getRealPath()));

        try {

            Category::create([
                'category_name' => $request->category_name,
                'category_active' => $request->category_active,
                'category_image' => $request->category_image,
            ]);
            return redirect()->back()->with('status', 'Categoría creada exitosamente.');

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
        return redirect()->back()->with('data', Category::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:30',
            'file_image' => 'dimensions:min_width=128,min_height=128,max_width=128,max_height=128|mimes:png|file|max:1024' //. app('configuration')->configuration_file_size,
        ]);
        $category = Category::find($id);

        if ($request->file('file_image')) {
            $request['category_image'] = base64_encode(file_get_contents($request->file('file_image')->getRealPath()));
        } else {
            $request['category_image'] = $category->category_image;
        }
        try {

            Category::where('category_id', $id)
                ->update([
                    'category_name' => $request->category_name,
                    'category_image' => $request->category_image,
                ]);
            return redirect()->back()->with('status', 'Categoría actualizada exitosamente.');

        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
//            if (count($category->product) > 0) {
//                return redirect()->back()->with('warning', 'Eliminación fallida, la categoría cuenta con productos.');
//            }
            $category->delete();
            return redirect()->back()->with('status', 'Categoría eliminada exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }
}
