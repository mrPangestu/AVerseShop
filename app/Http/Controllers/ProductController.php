<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Tampilkan semua produk
    public function showProduct()
    {
        $products = Product::all(); // Mengambil semua data produk dari database
        return view('Halaman.produk', compact('products')); // Mengirim data ke view
    }

    // Form tambah produk baru
    public function create()
    {
        return view('Halaman.tambah-produk');
    }

    // Simpan produk baru


    
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('product_images', 'public');

        // Simpan data ke database
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan!');
    }
    

    // Form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Halaman.edit-produk', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string|max:1000', // Ubah ke nullable
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $product = Product::findOrFail($id);
    
        // Jika gambar baru diunggah, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('image')) {
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
    
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
        }
    
        // Update data produk
        $product->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description, // Tetap update meskipun null
        ]);
    
        return redirect()->route('product', $product->id)->with('success', 'Produk berhasil diperbarui!');
    }

    // Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar dari penyimpanan jika ada
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        // Hapus produk dari database
        $product->delete();

        return redirect()->route('product')->with('success', 'Produk berhasil dihapus!');
    }
}
