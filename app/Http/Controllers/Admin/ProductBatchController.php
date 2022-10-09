<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Principal;
use App\Models\ProductBatch;
use Illuminate\Http\Request;

class ProductBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Distribution $distribution, Principal $principal)
    {
        $batches = ProductBatch::where('distribution_id', $distribution->id)
                    ->where('principal_id', $principal->id)
                    ->get();

        return view('admin.distributions.principals.batches.index', compact('batches', 'distribution', 'principal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Distribution $distribution, Principal $principal)
    {
        $products = $principal->products()->get();

        return view('admin.distributions.principals.batches.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Distribution $distribution, Principal $principal)
    {
        return redirect()->route('admin.distributions.principals.batches.index', [$distribution, $principal]);
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
    public function destroy($id)
    {
        //
    }
}
