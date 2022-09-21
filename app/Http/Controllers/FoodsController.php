<?php

namespace App\Http\Controllers;

use App\Http\Resources\Foods\FoodCollection;
use App\Http\Resources\Foods\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodsController extends Controller
{

    public function index()
    {
        $foods = Food::get();
        return (new FoodCollection($foods))->additional([
                'msg'=>[
                    'summary' => 'success',
                    'detail' => '',
                    'code' => '200'
                ]
    ])->response()->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $food = new Food();
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->state = $request->input('state');
        $food->special = $request->input('special');
        $food->save();
        return (new FoodResource($food))->additional([
            'msg'=>[
                'summary' => 'create food success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function show(Food $food)
    {
        return (new FoodResource($food))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function update(Request $request, Food $food)
    {
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->state = $request->input('state');
        $food->special = $request->input('special');
        $food->save();
        return (new FoodResource($food))->additional([
            'msg'=>[
                'summary' => 'update food success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Food $food)
    {
        $food->delete();
        return (new FoodResource($food))->additional([
            'msg'=>[
                'summary' => 'delete food success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
