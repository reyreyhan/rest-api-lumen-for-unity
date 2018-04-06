<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\StatusPlayerModel;

class StatusPlayerController extends Controller
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
      $data = StatusPlayerModel::with(['akun'])->get();
      return response()->json($data);
    }

    public function show($id) {
      $data = StatusPlayerModel::where('id_akun',$id)->with(['akun'])->get();
      return response()->json($data);
    }

    public function store(Request $request) {
      $data = new StatusPlayerModel();
      $data->stamina = $request->input('stamina');
      $data->sanity = $request->input('sanity');
      $data->save();

      return response('Berhasil Register');
    }

    public function update(Request $request, $id) {
      $data = StatusPlayerModel::where('id',$id)->first();
      $data->stamina = $request->input('stamina');
      $data->sanity = $request->input('sanity');
      $data->save();
      return response('Berhasil Update');
    }

    public function destroy($id) {
      $data = StatusPlayerModel::where('id_akun',$id)->first();
      $data->delete();

      return response('Berhasil Hapus');
    }

    //
}
