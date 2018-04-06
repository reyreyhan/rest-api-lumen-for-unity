<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ScoreModel;

class ScoreController extends Controller
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
      $data = ScoreModel::with(['akun','posisi'])->get();
      return response()->json($data);
    }

    public function show($id) {
      $data = ScoreModel::where('id_akun',$id)->with(['akun','posisi'])->get();
      return response()->json($data);
    }

    public function store(Request $request) {
      $data = new ScoreModel();
      $data->score = $request->input('score');
      $data->save();

      return response('Berhasil Register');
    }

    public function update(Request $request, $id) {
      $data = ScoreModel::where('id_akun',$id)->first();
      $data->score = $request->input('score');
      $data->save();
      return response('Berhasil Update');
    }

    public function destroy($id) {
      $data = ScoreModel::where('id',$id)->first();
      $data->delete();

      return response('Berhasil Hapus');
    }

    //
}
