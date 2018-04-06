<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PosisiModel;

class PosisiController extends Controller
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
      $data = PosisiModel::with(['soal','akun'])->get();
      return response()->json($data);
    }

    public function show($id) {
      $data = PosisiModel::where('id',$id)->with(['soal','akun'])->get();
      //echo $data[0]->soal;
      //return response()->json($data[0]->soal[0]->soal);
      return response()->json($data);
    }

    public function store(Request $request) {
      $data = new PosisiModel();
      $data->nama = $request->input('nama');
      $data->save();

      return response('Berhasil Register');
    }

    public function update(Request $request, $id) {
      $data = PosisiModel::where('id',$id)->first();
      $data->nama = $request->input('nama');
      $data->save();
      return response('Berhasil Update');
    }

    public function destroy($id) {
      $data = PosisiModel::where('id',$id)->first();
      $data->delete();

      return response('Berhasil Hapus');
    }

    //
}
