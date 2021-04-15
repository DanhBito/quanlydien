<?php

namespace App\Http\Controllers;

use App\Supplies;
use App\Producer;
use App\Unit;
use App\Quality;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class VatTuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Supplies::with('unit:id,unit_name,unit_simplify')
                        ->with('producer:id,pro_name')
                        ->with('quality:id,qua_name')
                        ->get();              
        return view('danhmuc.vattu.danhsach')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pro = Producer::select('pro_name')->get();
        $pro = Unit::select('unit_name')->get();
        $pro = Quality::select('qua_name')->get();
        return response()->json($pro, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function show(Supplies $supplies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplies $supplies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplies $supplies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplies $supplies)
    {
        //
    }
}
