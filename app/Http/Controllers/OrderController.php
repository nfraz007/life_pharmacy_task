<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderTableResource;
use App\Http\Resources\TransactionTableResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = ["ID", "User", "Product", "Total", "Status", "Transaction", "Created At", "Action"];
        $order = Order::all();
        $items = OrderTableResource::collection($order);
        return Inertia::render('Product/ProductIndex', compact("headers", "items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_data = User::all()->pluck("name", "id");
        $product_data = Product::all()->pluck("name", "id");
        $product_price_data = Product::all()->pluck("price", "id");
        return Inertia::render('Order/OrderCreate', compact("user_data", "product_data", "product_price_data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $user = User::find($request->user_id);
        $product = Product::find($request->product_id);
        $order = Order::create([
            "user_id" => $request->user_id,
            "product_id" => $request->product_id,
            "user_name" => $user->name,
            "user_email" => $user->email,
            "product_name" => $product->name,
            "product_price" => $product->price,
            "qty" => $request->qty,
            "total" => $request->qty * $product->price,
        ]);

        return redirect(route("order.show", $order->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = new OrderDetailResource($order);

        // transaction
        $headers = ["ID", "Type", "Amount", "Created At", "Updated At", "Action"];
        $transactions = Transaction::where("order_id", $order->id)->get();
        $items = TransactionTableResource::collection($transactions);
        return Inertia::render('Order/OrderShow', compact("order", "headers", "items"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $user_data = User::all()->pluck("name", "id");
        $product_data = Product::all()->pluck("name", "id");
        $product_price_data = Product::all()->pluck("price", "id");
        return Inertia::render('Order/OrderEdit', compact("order", "user_data", "product_data", "product_price_data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $user = User::find($request->user_id);
        $product = Product::find($request->product_id);

        $order->user_id = $request->user_id;
        $order->user_name = $user->name;
        $order->user_email = $user->email;
        $order->product_id = $request->product_id;
        $order->product_price = $product->price;
        $order->qty = $request->qty;
        $order->total = $request->qty * $product->price;
        $order->save();

        return redirect(route("order.show", $order->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route("order.index"));
    }

    public function mark_inprocess(Order $order)
    {
        $order->status = 1;
        $order->save();
        return redirect(route("order.show", $order->id));
    }

    public function mark_completed(Order $order)
    {
        $order->status = 2;
        $order->save();
        return redirect(route("order.show", $order->id));
    }
}
