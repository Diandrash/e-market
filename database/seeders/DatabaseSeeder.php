<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Diandra',
            'email' => 'diandra@gmail.com',
            'password' => '123456',
            'city' => 'Klaten',
            'province' => '',
        ]);

        User::factory()->create([
            'name' => 'Shadeva',
            'email' => 'shadeva@gmail.com',
            'password' => '123456',
            'city' => 'Klaten',
            'province' => '',
        ]);

        Category::factory()->create([
            'name' => 'Electronics',
        ]);
        Category::factory()->create([
            'name' => 'Fashion',
        ]);

        Product::factory()->create([
            'seller_id' => 1,
            'category_id' => 1,
            'name' => 'Mechanic Keyboard Gamen Titan Elite III',
            'description' => '',
            'price' => 10000000,
            'image' => 'product-2.png'
        ]);

        Order::factory()->create([
            'user_id' => 2,
            'seller_id' => 1,
            'product_id' => 1,
            'quantity' => 1,
            'address' => 'Jalan Pemuda No. 17 Kecamatan Klaten Tengah, Kabupaten Klaten',
            'total_price' => 10000000,
        ]);


    }
}
