<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Notifications\purchaseMade;
use App\Product;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function purchase(PurchaseRequest $request)
    {
        $product = Product::find($request->product_id);

        if ($product && $product->quantity > 0) {
            DB::beginTransaction();
            //reduce the quantity of item left
            $product->update(['quantity' => ($product->quantity - $request->qty)]);

            $transaction = Transaction::create([
                'quantity' => $request->qty,
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
            ]);
            $transaction ? DB::commit() : DB::rollBack();
            auth()->user()->notify(new purchaseMade($transaction));

            return back()->with('success', "{$product->name} bought successfully");

        }
        return back()->with('error', "{$product->name} no longer available successfully");
    }
}
