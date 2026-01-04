<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 全データ取得
        $names = Name::all();
        return response()->json([
            'data' => $names
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // データを追加
        $name = Name::create($request->all());
        return response()->json([
            'data' => Name::all()
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Name $name)
    {
        //データ更新
        $update = [
            //テーブルのカラム名
            'name' => $request->name,
        ];
        $item = Name::where('id', $name->id)->update($update);
        if ($item) {
            return response()->json([
                'data' => Name::all()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(Name $name)
    {
        //データ削除
        $item = Name::where('id', $name->id)->delete();
        if ($item) {
            return response()->json([
                'data' => Name::all()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
