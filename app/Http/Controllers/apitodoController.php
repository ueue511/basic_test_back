<?php

namespace App\Http\Controllers;

use App\Models\apitodomodel;
use Illuminate\Http\Request;

class apitodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = apitodomodel::all();
        return response()->json([
            'message' => 'ok',
            'data' => $items
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
        $item = new apitodomodel;
        $item->comment = $request->comment;
        $item->save();
        return response()->json([
            'message' => 'Created comment',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = apitodomodel::where('id', $id)->first();
        if ($item) {
            return response()->json([
                'message' => 'ok',
                'data' => $item
            ], 200);
        }else{
            return response()->json([
                'message' => 'Not comment',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = apitodomodel::where('id', $id)->first();
        $item->comment = $request->comment;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => 'Updated comment',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not comment'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = apitodomodel::where('id', $id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted comment',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not comment',
            ], 404);
        }
    }
}
