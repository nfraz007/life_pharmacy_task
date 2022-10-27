<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Resources\TransactionDetailResource;
use App\Http\Resources\TransactionTableResource;
use App\Models\Order;
use App\Models\Transaction;
use Inertia\Inertia;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $type_data = [
            "1" => "Online",
            "0" => "Cash",
        ];
        return Inertia::render('Transaction/TransactionCreate', compact("order", "type_data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Order $order, StoreTransactionRequest $request)
    {
        $transaction = Transaction::create([
            "order_id" => $order->id,
            "type" => $request->type,
            "amount" => $request->amount,
        ]);

        return redirect(route("order.show", $order->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Transaction $transaction)
    {
        $transaction = new TransactionDetailResource($transaction);
        return Inertia::render('Transaction/TransactionShow', compact("order", "transaction"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, Transaction $transaction)
    {
        $type_data = [
            "1" => "Online",
            "0" => "Cash",
        ];
        return Inertia::render('Transaction/TransactionEdit', compact("order", "transaction", "type_data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order, UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->type = $request->type;
        $transaction->amount = $request->amount;
        $transaction->save();

        return redirect(route("order.show", $order->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Transaction $transaction)
    {
        $transaction->delete();
        return redirect(route("order.show", $order->id));
    }
}
