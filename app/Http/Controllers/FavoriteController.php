<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Meal $meal)
    // {
    //     $favorite = new Favorite();
    //     $favorite->user_id = Auth::user()->id;
    //     $favorite->meal_id = $meal;
    //     // $favorite->save();
    //     return redirect()
    //         ->route('meals.show', $meal);
    // }
        public function store(Request $request, $id)
    {
        $favorite = new Favorite;
        $meal = Meal::find($id);
        $favorite->meal_id = $meal->id;
        $favorite->user_id = $request->user()->id;
        $favorite->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($meal, Favorite $favorite)
    // {
    //     $favorite->delete();
    //     return redirect()->route('meals.show', $meal);
    // }
        public function destroy(Request $request, $id)
    {
        $favorite = new Favorite;
        $meal = Meal::find($id);
        $user = $request->user()->id;
        $favorite = Favorite::where('meal_id', $meal->id)
            ->where('user_id', $user)
            ->first();
        $favorite->delete();
        return back();
    }
}
