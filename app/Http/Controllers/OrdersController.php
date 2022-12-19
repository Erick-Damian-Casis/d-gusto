<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\Orders\StoreOrderRequest;
use App\Http\Requests\V1\Orders\UpdateOrderRequest;
use App\Http\Resources\Orders\OrderCollection;
use App\Http\Resources\Orders\OrderResource;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(StoreOrderRequest $request)
    {
        $user = Auth::user()->getAuthIdentifier();
        $order = new Order();
        $order->food()->associate(Food::find($request->input('food.id')));
        $order->user()->associate(User::find($user));
        $order->amount = $request->input('amount');
        $order->spec = $request->input('spec');
        $order->order_at = Carbon::now()->toDateTimeString();
        $order->save();
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

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->food()->associate(Food::find($request->input('food.id')));
        $order->spec = $request->input('spec');
        $order->amount = $request->input('amount');
        $order->save();
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
