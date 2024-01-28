<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use \Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Checkout View Page
    public function checkout(Request $request)
    {
        // return $request;
        $productId = $request['product_id'];
        $product = Product::where('id', $productId)->first();
        $quantity = $request['quantity'];
        $totalPrice = $product->price * $quantity;
        return view('orders.checkout', [
            'title' => 'Checkout Page',
            'product' => $product,
            'quantity' => $quantity,
            'totalPrice' => $totalPrice,
        ]);
    }

    // All Orders by user
    public function index()
    {
        $userId = auth()->user()->id;
        $orders = Order::where('user_id', $userId)->get();
        return view('orders.index', [
            'title' => 'Orders Page',
            'orders' => $orders,
        ]);
    }

    // All Order Customer on my products
    public function indexOrders()
    {
        // return 1;
        // $orders = Order::all();
        $userId = auth()->user()->id;
        $orders = Order::where('seller_id', $userId)->get();
        return view('orders.customerOrders', [
            'title' => 'Orders From Customer Page',
            'orders' => $orders,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        // return $request;
        $ValidatedData = $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'seller_id' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
            'address' => 'required|min:3|max:2056',
            'status' => 'required|max:1'
        ]);

        Order::create($ValidatedData);

        $userId = $ValidatedData['user_id'];
        $orders = Order::where('user_id', $userId)->get();
        $product = Product::where('id', $ValidatedData['product_id'])->first();
        Alert::success('Success', 'Order Created');
        return view('orders.index', [
            'title' => 'Product Page',
            'product' => $product,
            'orders' => $orders,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    //  Change Status Order
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $status = $request['status'];
        $orderId = $request['order_id'];
        $order = Order::where('id', $orderId)->first();
        $order->status = $status;
        $order->save();
        // dd($order);
        $orders = Order::where('seller_id', auth()->user()->id)->get();
        Alert::success('Success', 'Product Delivered');
        return view('orders.customerOrders', [
            'title' => 'Orders from Customer',
            'orders' => $orders,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
