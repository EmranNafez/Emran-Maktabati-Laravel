<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $items = CartItem::with('book')
            ->where('user_id', $request->user()->id)
            ->get();

        return view('cart.index', compact('items'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        CartItem::updateOrCreate(
            ['user_id' => $request->user()->id, 'book_id' => $data['book_id']],
            ['quantity' => $data['quantity']]
        );

        return redirect()->route('cart.index')->with('success', 'تمت الإضافة إلى السلة');
    }
}
