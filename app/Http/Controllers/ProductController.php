<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Product_category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $categories = Product_category::all();
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $this->saveImage($request->image, 'img/products');

        Product::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,

            'description' => $request->description,
            'description_ar' => $request->description_ar,

            'price' => $request->price,
//            'category_id' => $request->category_id,
            'discount' => $request->discount ?? 0,
            'image' => $img,
        ]);

        return redirect()->route('admin.dashboard.products.index')->with('success', 'تم الإضافة بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Implement the show method if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,

            'description' => $request->description,
            'description_ar' => $request->description_ar,

            'price' => $request->price,
            'discount' => $request->discount ?? 0,
        ]);

        if (!isset($request->image)) {
            $product->update([
                'image' => $request->old_image
            ]);
        } else {
            $img = $this->saveImage($request->image, 'img/products');
            $product->update([
                'image' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.products.index')->with('success', 'تم التعديل بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
