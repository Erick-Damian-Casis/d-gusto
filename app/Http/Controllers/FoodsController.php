<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\Foods\StoreFoodRequest;
use App\Http\Requests\V1\Foods\UpdateFoodRequest;
use App\Http\Resources\Foods\FoodCollection;
use App\Http\Resources\Foods\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function store(StoreFoodRequest $request)
    {
        $food = new Food();
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->state = $request->input('state');
        $food->special = $request->input('special');
        if ($request->hasFile('image')){
            $food->image = Storage::url($request->file('image')
                ->store('public/images')
            );
        }
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

    public function update(UpdateFoodRequest $request, Food $food)
    {
        $food->name = $request->input('name');
        $food->cost = $request->input('cost');
        $food->state = $request->input('state');
        $food->special = $request->input('special');
        if ($request->hasFile('image')){
            $food->image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('image',$food->image);
        }
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
