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
        $cars = Car::paginate(8);
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
        $modelPriority = $request->filter_model;
        $cityPriority = $request->filter_city;
        $pricePriority = $request->filter_price;

        $query = Car::query();

        if ($markPriority != 'all') {
            $query->where('marque', $markPriority);
        }

        if ($modelPriority != 'all') {
            $query->where('model', $modelPriority);
        }

        if ($cityPriority != 'all') {
            $query->where('city', $cityPriority);
        }

        if ($pricePriority != 'all') {
            if ($pricePriority == 'less_500') {
                $query->where('price', '<', 500);
            } elseif ($pricePriority == 'more_500') {
                $query->where('price', '>=', 500);
            }
        }

        $cars = $query->paginate(8);

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
            'model'=>'required|integer',
            'city'=>'required|string',
            'price'=>'required|integer'
        ]);

        $path = $request->file('image')->store('images','public');

        Car::create([
            'image'=>$path,
            'name'=>$request->name,
            'marque'=>$request->marque,
            'model'=>$request->model,
            'city'=>$request->city,
            'price'=>$request->price
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
            'model'=>'nullable|integer',
            'city'=>'nullable|string',
            'price'=>'nullable|integer'
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
        if ($request->filled('model')) $data['model'] = $request->model;
        if ($request->filled('city')) $data['city'] = $request->city;
        if ($request->filled('price')) $data['price'] = $request->price;

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
