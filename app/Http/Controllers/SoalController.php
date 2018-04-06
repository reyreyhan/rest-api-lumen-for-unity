<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SoalModel;

class SoalController extends Controller
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
      $data = SoalModel::with(['posisi'])->get();
      return response()->json($data);
    }

    public function show($id) {
      $data = SoalModel::where('id',$id)->with(['posisi'])->get();
      return response()->json($data);
    }

    public function store(Request $request) {
      $data = new SoalModel();
      $data->id_posisi = $request->input('id_posisi');
      $data->soal = $request->input('soal');
      $data->A = $request->input('A');
      $data->B = $request->input('B');
      $data->C = $request->input('C');
      $data->D = $request->input('D');
      $data->benar = $request->input('benar');
      $data->save();

      return response('Berhasil Register');
    }

    public function update(Request $request, $id) {
      $data = SoalModel::where('id',$id)->first();
      $data->id_posisi = $request->input('id_posisi');
      $data->soal = $request->input('soal');
      $data->A = $request->input('A');
      $data->B = $request->input('B');
      $data->C = $request->input('C');
      $data->D = $request->input('D');
      $data->benar = $request->input('benar');
      $data->save();
      return response('Berhasil Update');
    }

    public function destroy($id) {
      $data = SoalModel::where('id',$id)->first();
      $data->delete();

      return response('Berhasil Hapus');
    }

    //
}
