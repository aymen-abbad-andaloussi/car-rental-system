<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('homeCarRental', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'name'=>'required|string',
            'marque'=>'required|string',
            'price'=>'required|integer',
            'city'=>'required|string',
            'description'=>'required|string'
        ]);

        $path = $request->file('image')->store('images','public');

        Car::create([
            'image'=>$path,
            'name'=>$request->name,
            'marque'=>$request->marque,
            'price'=>$request->price,
            'city'=>$request->city,
            'description'=>$request->description
        ]);

        flash()->success("The car added successfully!");
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
