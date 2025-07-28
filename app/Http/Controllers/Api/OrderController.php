<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Book;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            $request->user()->orders()->with('items.book')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.book_id' => 'required|exists:books,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $user = $request->user();

        $total = 0;
        $items = [];

        foreach ($data['items'] as $item) {
            $book = Book::find($item['book_id']);
            $price = $book->price;
            $quantity = $item['quantity'];
            $total += $price * $quantity;

            $items[] = [
                'book_id' => $book->id,
                'quantity' => $quantity,
                'price' => $price,
            ];
        }

        $order = $user->orders()->create([
            'total_price' => $total,
            'status' => 'pending',
        ]);

        foreach ($items as $item) {
            $order->items()->create($item);
        }

        return response()->json($order->load('items.book'), 201);
    }

    public function show($id)
    {
        $order = Order::with('items.book')->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }
}
