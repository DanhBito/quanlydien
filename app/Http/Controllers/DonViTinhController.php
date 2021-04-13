<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Unit as UnitResource;
use App\Http\Requests\UnitPost;
use Illuminate\Support\Facades\DB;

class DonViTinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Unit::get();
        return view('danhmuc.donvitinh.danhsach')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitPost $request)
    {
        $validated = $request->validated();
        try {
            DB::table('units')->insert($request->all());
            return response()->json($request->unit_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($request->unit_name, Response::HTTP_OK);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Unit::where('id' , $id)->first();
        return response()->json($datas, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $update = $request->all();

        $x = Unit::where('unit_name', $request->unit_name)
                    ->where('id', '!=', $request->id)->count();
        
        if($x == 0){
            $unit->where('id', $request->id)->update($update);
            return response()->json($request->unit_name, Response::HTTP_OK);
        }
        
        // return response()->json($x, Response::HTTP_OK);

        // $new_update = $unit->updateOrCreate($update);

        // if($new_update->id == $unit->id OR !$new_update->exists){
            
        // }
        // $count = Unit::select('unit_name')->where('id', $request->id)->get();
        // if($count < 1){
        //     $datas = Unit::where('id', $request->id)->first();
        //              Unit::where('id', $request->id)->update($request->all());
        //     return response()->json($datas, Response::HTTP_OK);
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, $id)
    {
        $datas = $unit->find($id);
        $unit->destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }
}
