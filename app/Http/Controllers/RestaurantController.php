<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRestaurant;
use App\Models\OpeningTimes;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        return view('restaurants.create', compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRestaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRestaurant $request)
    {
        $restaurant = new Restaurant();
        $restaurant->fill($request->input())->save();

        collect($request->input('openingTimes'))->each(function ($time, $day) use ($restaurant) {
            $time = new OpeningTimes();
            $time->restaurant_id = $restaurant->id;
            $time->day = $day;
            $time->closed = isset($time['closed']) ? true : false;
            $time->open = $time['open'];
            $time->close = $time['close'];
            $time->save();
        });

        return redirect("restaurants/{$restaurant->id}");
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
        return view('restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Restaurant $restaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
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
