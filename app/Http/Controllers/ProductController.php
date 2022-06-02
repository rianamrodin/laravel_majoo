<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'categories' => ProductCategory::all(),

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
            'deskripsi' => $request->deskripsi,
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
        // echo '<pre>';
        // print_r($product);
        // die;
        return view('master.product.edit', [
            'data' => $product,
            'categories' => ProductCategory::all(),
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
        $this->validate($request, [
            'nama'     => 'required',
            'harga'   => 'required',
            'deskripsi'   => 'required',
        ]);

        //get data Blog by ID
        $product = Product::findOrFail($product->id);

        if ($request->file('gambar') == "") {

            $product->update([
                'nama'     => $request->nama,
                'harga'   => $request->harga,
                'deskripsi'   => $request->deskripsi,
                'id_category'   => $request->id_category,
            ]);
        } else {

            //hapus old image
            Storage::disk('public')->delete('public/products/' . $product->gambar);

            //upload new gambar
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/products', $gambar->hashName());

            $product->update([
                'gambar'     => $gambar->hashName(),
                'nama'     => $request->nama,
                'harga'   => $request->harga,
                'id_category'   => $request->id_category,
                'deskripsi'   => $request->deskripsi,
            ]);
        }

        if ($product) {
            //redirect dengan pesan sukses
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        if ($product->gambar) {
            Storage::disk('public')->delete('public/products/' . $product->gambar);
        }
        return redirect('/master/product')->with('success', 'Data Berhasil dihapus');
    }
}
