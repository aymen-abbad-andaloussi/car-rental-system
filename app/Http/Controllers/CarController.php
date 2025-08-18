<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate(6);
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
     * fiterCar to filter the cars.
     */
    public function fiterCar(Request $request)
    {
        $markPriority = $request->filter_mark;
        $cityPriority = $request->filter_city;

        $query = Car::query();

        if ($markPriority != 'all') {
            $query->where('marque', $markPriority);
        }

        if ($cityPriority != 'all') {
            $query->where('city', $cityPriority);
        }

        $cars = $query->paginate(6);

        // dd($cars);
        return view('homeCarRental', compact('cars'));

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

        

        flash()->success("The Car Added Successfully!");
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
        $request->validate([
            'image'=>'nullable',
            'name'=>'nullable|string',
            'marque'=>'nullable|string',
            'price'=>'nullable|integer',
            'city'=>'nullable|string',
            'description'=>'nullable|string'
        ]);

        $data = [];

        if ($request->hasFile('image')) {
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        if ($request->filled('name')) $data['name'] = $request->name;
        if ($request->filled('marque')) $data['marque'] = $request->marque;
        if ($request->filled('price')) $data['price'] = $request->price;
        if ($request->filled('city')) $data['city'] = $request->city;
        if ($request->filled('description')) $data['description'] = $request->description;

        $car->update($data);

        flash()->success("The Car Edited Successfully!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $path = $car->image;
        $storage = Storage::disk('public');

        if ($storage->exists($path)) {
            $storage->delete($path);
            $car->delete();
        }

        flash()->success("The Car Deleted Successfully!");
        return back();
    }
}
