<?php

namespace App\Http\Controllers;

use App\Http\Resources\Orders\OrderCollection;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return (new OrderCollection($orders))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->food()->associate(Food::find($request->input('food.id')));
        $order->spec = $request->input('spec');
        $order->amount = $request->input('amount');
        return (new OrderResource($order))->additional([
            'msg'=>[
                'summary' => 'create order success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function show(Order $order)
    {
        return (new OrderResource($order))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function update(Request $request, Order $order)
    {
        $order->food()->associate(Food::find($request->input('food.id')));
        $order->spec = $request->input('spec');
        $order->amount = $request->input('amount');
        return (new OrderResource($order))->additional([
            'msg'=>[
                'summary' => 'update order success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return (new OrderResource($order))->additional([
            'msg'=>[
                'summary' => 'delete order success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
