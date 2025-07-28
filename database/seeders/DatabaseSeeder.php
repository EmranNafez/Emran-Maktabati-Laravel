<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    // إنشاء 5 فئات
    \App\Models\Category::factory(5)->create()->each(function ($category) {
        // لكل فئة، أنشئ 10 كتب
        \App\Models\Book::factory(10)->create([
            'category_id' => $category->id,
        ]);
    });

    // إنشاء 10 مستخدمين مع طلبات
    \App\Models\User::factory(10)->create()->each(function ($user) {
        $orders = \App\Models\Order::factory(rand(1, 3))->create([
            'user_id' => $user->id,
        ]);

        foreach ($orders as $order) {
            $items = \App\Models\OrderItem::factory(rand(1, 5))->create([
                'order_id' => $order->id,
                'book_id' => \App\Models\Book::inRandomOrder()->first()->id,
            ]);

            // تحديث السعر الإجمالي للطلب
            $order->total_price = $items->sum(fn($item) => $item->price * $item->quantity);
            $order->save();
        }
    });
}

}
