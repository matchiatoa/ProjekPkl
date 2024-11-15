<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;

class ProdukController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Retrieve all products from the database
        $produks = Produk::all();
        $generator = new BarcodeGeneratorPNG();
        
        foreach ($produks as $produk) {
            $produk->barcode_image = base64_encode($generator->getBarcode($produk->barcode, $generator::TYPE_CODE_128));
        }

        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama_product' => 'required|string|max:255',
        'barcode' => 'required|string|max:255|unique:produks',
        'kategori' => 'required|string|max:255',
        'harga' => 'required|string', // Accepts as a string for formatted input
        'stok' => 'required|integer',
        'deskripsi' => 'nullable|string',
        'gambar' => 'nullable|image|max:2048',
    ]);

    $produk = new Produk($request->except('harga'));

    // Remove "Rp" and formatting symbols, then convert to numeric
    $harga = str_replace(['Rp', '.', ','], ['', '', '.'], $request->input('harga'));
    $produk->harga = (float) $harga;

    if ($request->hasFile('gambar')) {
        $filePath = $request->file('gambar')->store('images', 'public');
        $produk->gambar = $filePath;
    }

    $produk->save();

    return redirect()->route('produk.index')->with('success', 'Product added successfully');
}
    

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $generator = new BarcodeGeneratorPNG();
        $barcode_image = base64_encode($generator->getBarcode($produk->barcode, $generator::TYPE_CODE_128));
        
        return view('produk.show', compact('produk', 'barcode_image'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function scanBarcode(Request $request)
{
    $barcode = $request->input('barcode');
    $produk = Produk::where('barcode', $barcode)->first();

    if ($produk) {
        $generator = new BarcodeGeneratorPNG();
        $barcode_image = base64_encode($generator->getBarcode($produk->barcode, $generator::TYPE_CODE_128));

        return view('produk.show', compact('produk', 'barcode_image'));
    } else {
        return redirect()->route('produk.index')->with('error', 'Tidak Ada Produk');
    }
}


    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    // Fill all fields except 'harga'
    $produk->fill($request->except('harga'));

    // Convert 'harga' to a numeric value
    $harga = $request->input('harga');
    $harga = str_replace(['Rp', '.', ','], '', $harga); // Remove "Rp" and any commas or dots
    $produk->harga = (float) $harga; // Convert to float

    // Handle image upload if a new image is provided
    if ($request->hasFile('gambar')) {
        if ($produk->gambar) {
            // Delete the old image
            Storage::disk('public')->delete($produk->gambar);
        }
        $filePath = $request->file('gambar')->store('images', 'public');
        $produk->gambar = $filePath;
    }

    $produk->save();

    return redirect()->route('produk.index')->with('success', 'Product updated successfully');
}

    

    
    
    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        
        // Check if the product has an image and delete it from storage
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }
        
        // Delete the product from the database
        $produk->delete();

        // Redirect with a success message
        return redirect()->route('produk.index')->with('success', 'Product deleted successfully');
    }
}
