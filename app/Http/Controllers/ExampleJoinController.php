<?php

namespace App\Http\Controllers;

use App\CoreModel;
use Illuminate\Http\Request;


class CoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index() {
      $data = CoreModel::with(['user','page'])->get();
      return response()->json($data);
    }

    public function show($id) {
      $data = CoreModel::where('CORE_ID',$id)->with(['user','page'])->first();
      return response()->json($data);
    }

    public function store(Request $request) {
      $data = new CoreModel();
      $data->timestamps = false;
      $data->USER_ID = $request->input('USER_ID');
      $data->CORE_JUDUL = $request->input('CORE_JUDUL');
      $data->CORE_DESC = $request->input('CORE_DESC');
      $data->CORE_TGL_RILIS = $request->input('CORE_TGL_RILIS');

      $A = $request->input('CORE_JUDUL');
      $B = $request->input('USER_ID');
      $C = $B . '-' . str_replace(" ","-",$A);
      $data->CORE_FOLDER = $C;
      $data->save();
      return response('Success Add Data Core');
    }

    public function update(Request $request, $id) {
      $data = CoreModel::where('CORE_ID',$id)->first();
      $data->timestamps = false;
      $data->USER_ID = $request->input('USER_ID');
      $data->CORE_JUDUL = $request->input('CORE_JUDUL');
      $data->CORE_DESC = $request->input('CORE_DESC');
      $data->CORE_TGL_RILIS = $request->input('CORE_TGL_RILIS');
      $data->save();
      return response('Berhasil Update Data Core');
    }

    public function destroy($id) {
      $data = CoreModel::where('CORE_ID',$id)->first();
      $data->delete();
      return response('Berhasil Hapus Data Core');
    }

    //
}
