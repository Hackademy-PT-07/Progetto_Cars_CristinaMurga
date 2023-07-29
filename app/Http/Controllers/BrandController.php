<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Dotenv\Store\StoreBuilder;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }
    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->all());
        return redirect()->route('brands.index')->with(['success' => 'Marca aggiunta correttamente']);
    }

    public function edit(Brand $brand)
    {

        return view('brands.edit', compact('brand'));
    }

    public function update(StoreBrandRequest $request, Brand $brand)
    {
        $brand->name = $request->name;

        $brand->save();
        
        return redirect()->route('brands.index')->with(['success' => 'Marca modificata correttamente']);
    }

    public function destroy(Brand $brand)
    {
        if($brand->cars->count()) {
            return redirect()->back()->with(['error' => 'Non puoi cancellare questa marca']);
        }
        $brand->delete();
        return redirect()->route('brands.index')->with(['success'=> 'Marca eliminata correttamente']);
    }

}
