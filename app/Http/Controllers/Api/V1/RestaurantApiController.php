<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::paginate();

        return response()->json($restaurants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Restaurant $restaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Restaurant   $restaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Restaurant $restaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
    }
}
