<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Principal;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Principal $principal
     * @return \Illuminate\Http\Response
     */
    public function index(Principal $principal)
    {
        $products = $principal->products()->get();

        return view('admin.principals.products.index', compact('products', 'principal'));
    }

    public function indexJson(Principal $principal)
    {
        return response()->json([
            'products' => $principal->products()->get()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Principal $principal
     * @return \Illuminate\Http\Response
     */
    public function create(Principal $principal)
    {
        return view('admin.principals.products.create', compact('principal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Principal $principal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Principal $principal)
    {
        $rows = intval($request->rows);
        if($rows > 0){
            for ($i = 0; $i < $rows; $i++){
                $principal->products()->create([
                    'name' => $request->name[$i],
                    'generic_name' => $request->generic_name[$i],
                    'strength' => $request->strength[$i],
                    'pack_size' => $request->pack_size[$i],
                    'carton_size' => $request->carton_size[$i],
                ]);
            }
        }

        return redirect()->route('admin.principals.products.index', [$principal]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
