<?php

namespace App\Http\Controllers;

use App\Quality;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\QualityPost;

class ChatLuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Quality::get();
        return view('danhmuc.chatluong.danhsach')->with(compact('datas'));
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
    public function store(QualityPost $request)
    {
        $validated = $request->validated();

        try {
            Quality::create($request->all());
            return response()->json($request->qua_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($request->qua_name, Response::HTTP_OK);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function show(Quality $quality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function edit(Quality $quality, $id)
    {
        $datas = $quality->where('id' , $id)->first();
        return response()->json($datas, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quality $quality)
    {
        $update = $request->all();

        $x = $quality->where('qua_name', $request->qua_name)
                     ->where('id', '!=', $request->id)->count();
        
        if($x == 0){
            $quality->where('id', $request->id)->update($update);
            return response()->json($request->qua_name, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quality $quality, $id)
    {
        $datas = $quality->find($id);
                 $quality->destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }
}
