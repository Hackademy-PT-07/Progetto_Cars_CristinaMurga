<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
    

        return view('cars.index', compact('cars',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        $brands = Brand::all();
        $engines= ['Benzina', 'Diesel', 'Elettrico'];
        $extras = Extra::all();
        return view('cars.create', compact('brands','engines', 'extras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $car = Car::create($request->all());
        $car->extras()->attach($request->extras);
        return redirect()->route('cars.index')->with(['success' => 'Auto creata correttamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {   
       $extrasTotal = 0;
       foreach($car->extras as $extra) {
         $extrasTotal += $extra->price;
       }

        return view('cars.show', compact('car', 'extrasTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $engines= ['Benzina', 'Diesel', 'Elettrico'];
        $extras = Extra::all();
        return view('cars.edit', compact('car', 'brands', 'engines', 'extras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCarRequest $request, Car $car)
    {
        $car->fill($request->all())->save();

        $car->extras()->detach();
        $car->extras()->attach($request->extras);

        return redirect()->route('cars.show', $car)->with(['success' => 'Auto modificata correttamente']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->extras()->detach();
        $car->delete();
        return redirect()->route('cars.index')->with(['success' => 'Auto eliminata correttamente']);
    }
}
