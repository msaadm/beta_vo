<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountType;
use App\Models\Distribution;
use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributions = Distribution::get();

        return view('admin.distributions.index', compact('distributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.distributions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distribution = new Distribution;
        $distribution->name = $request->name;
        $distribution->email = $request->email;
        $distribution->password = Hash::make('abcd1234');
        $distribution->account_type_id = AccountType::DISTRIBUTION;
        $distribution->save();

        return redirect()->route('admin.distributions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribution $distribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribution $distribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribution $distribution)
    {
        //
    }

    public function connectedPrincipalsGet(Distribution $distribution)
    {
        $principals = $distribution->principals()->get();

        return view('admin.distributions.principals.index', compact('distribution', 'principals'));
    }

    public function connectedPrincipalsCreate(Distribution $distribution)
    {
        $principals = Principal::whereNotIn('id',
                            $distribution->principals()->pluck('principal_id')->toArray()
                        )->get();

        return view('admin.distributions.principals.create', compact('distribution', 'principals' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @return \Illuminate\Http\Response
     */
    public function connectedPrincipalsPost(Request $request, Distribution $distribution)
    {
        $principal = Principal::find($request->principal);

        $distribution->principals()->attach($principal);

        return redirect()->route('admin.distributions.principals.index', [$distribution]);
    }
}
