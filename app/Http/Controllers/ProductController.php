<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.product.index', [
            'data' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.product.create', [
            'categories' => ProductCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:products',
            'harga' => 'required',
            'gambar' => 'image|max:1024|mimes:png,jpg,jpeg',
        ]);

        $image = $request->file('gambar');
        $image->storeAs('public/products', $image->hashName());

        $data = Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deksripsi' => $request->deskripsi,
            'gambar' => $image->hashName(),
            'id_category' => $request->id_category,
        ]);

        if ($data) {
            return redirect()
                ->to('master/product')
                ->with([
                    'success' => 'New data has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('master.product.edit', [
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $model = $request->validate($request, [
            'nama' => 'required|unique:products',
            'harga' => 'required',
        ]);

        $flag = Product::where('id', $product->id)
            ->update($model);

        if ($flag) {
            return redirect()
                ->to('master/product')
                ->with([
                    'success' => 'New data has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/master/product')->with('success', 'Data Berhasil dihapus');
    }
}
