<?php

namespace App\Http\Controllers;

use App\Models\UnitType;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit_types = UnitType::all();
        $total_unit_types = $unit_types->count();
        return view('unit_types.index',compact('unit_types','total_unit_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit_types.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit_type = new UnitType;

        $unit_type->name = $request->name;

        $unit_type->save();

        return redirect('unit_types')->with('message','Unit Type added successfully.')
                                    ->with('alert-class','alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $unit_type
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $unit_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $unit_type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit_types = UnitType::findOrFail($id);
        return view('unit_types.create-edit',compact('unit_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $unit_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit_type = UnitType::find($id);

        $unit_type->name = $request->name;

        $unit_type->save();

        return redirect('unit_types')->with('message','Unit Type updated successfully.')
                                    ->with('alert-class','alert-success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $unit_type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit_type = UnitType::find($id);
        $unit_type->delete();

        return redirect('unit_types')->with('message','Unit Type deleted.')
                                    ->with('alert-class','alert-danger');
    }
}
