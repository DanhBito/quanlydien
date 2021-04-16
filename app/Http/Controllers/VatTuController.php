<?php

namespace App\Http\Controllers;

use App\Supplies;
use App\Producer;
use App\Unit;
use App\Quality;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $pros = Producer::select('id', 'pro_name')->get();
        $units = Unit::select('id','unit_name')->get();     
        $quas = Quality::select('id', 'qua_name')->get()  ;
        return view('danhmuc.vattu.danhsach')->with(compact('datas','pros','units','quas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        try {
            DB::table('supplies')->insert($datas);
            return response()->json($datas, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json("ABC", Response::HTTP_OK);
        }

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
    public function edit(Supplies $supplies, $id)
    {
        $datasa = $supplies->where('id', $id)->first();
        return response()->json($datasa, Response::HTTP_OK);
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
        $update = $request->all();

        try {
            $supplies->where('id', $request->id)->update($update);
            return response()->json($request->sup_name, Response::HTTP_OK);
        } catch (\Throwable $th) {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplies $supplies, $id)
    {
        $datas = $supplies->find($id);
                 $supplies->destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }

}
