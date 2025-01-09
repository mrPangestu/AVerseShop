<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Tampilkan daftar item dalam keranjang.
     */
    public function index()
    {
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->with('product')->get();

        return view('Halaman.keranjang', compact('carts'));
    }


    /**
     * Tambahkan produk ke keranjang.
     */
    public function addToCart(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Anda harus login untuk menambahkan ke keranjang.'
            ], 401);
        }

        $productId = $request->product_id;
        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan.'
            ], 404);
        }

        if ($product->stock < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Stok produk habis.'
            ], 400);
        }

        try {
            // Tambahkan ke keranjang
            $cartItem = Cart::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->where('status', 'active')
                            ->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->total_price = $cartItem->quantity * $product->price;
                $cartItem->save();
            } else {
                $cartItem = Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => 1,
                    'price' => $product->price,
                    'total_price' => $product->price,
                    'status' => 'active'
                ]);
            }

            // Kurangi stok
            $product->stock -= 1;
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan ke keranjang.',
                'new_stock' => $product->stock // Kirim stok terbaru
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menambahkan ke keranjang.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Update jumlah item di keranjang.
     */
    public function updateCartQuantity(Request $request, $cartId)
    {
        $cartItem = Cart::find($cartId);
        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan di keranjang.'
            ], 404);
        }

        $product = $cartItem->product;

        // Menambah quantity
        if ($request->action == 'increase') {
            if ($product->stock > 0) {
                $cartItem->quantity += 1;
                $product->stock -= 1;
                $cartItem->total_price = $cartItem->quantity * $product->price;
                $product->save();
                $cartItem->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Quantity berhasil ditambahkan.',
                    'new_quantity' => $cartItem->quantity,
                    'new_total_price' => $cartItem->total_price,
                    'new_stock' => $product->stock,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok produk habis.'
                ]);
            }
        }

        // Mengurangi quantity
        if ($request->action == 'decrease') {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $product->stock += 1;
                $cartItem->total_price = $cartItem->quantity * $product->price;
                $product->save();
                $cartItem->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Quantity berhasil dikurangi.',
                    'new_quantity' => $cartItem->quantity,
                    'new_total_price' => number_format($cartItem->total_price, 0, ',', '.'),
                    'new_stock' => $product->stock,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Quantity tidak bisa kurang dari 1.'
                ]);
            }
        }
    }


    /**
     * Hapus item dari keranjang.
     */
    public function deleteCartItem(Request $request)
    {
        $cartItems = Cart::whereIn('id', $request->cart_ids)->get();
    
        foreach ($cartItems as $cartItem) {
            $product = $cartItem->product;
            $product->stock += $cartItem->quantity;  // Mengembalikan stok produk
            $product->save();
            $cartItem->delete();  // Menghapus produk dari keranjang
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus dan stok diperbarui.'
        ]);
    }
    


}
