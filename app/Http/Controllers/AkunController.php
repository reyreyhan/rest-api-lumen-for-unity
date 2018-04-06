<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AkunModel;
use App\ScoreModel;
use App\PosisiModel;
use App\StatusPlayerModel;

class AkunController extends Controller
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
      $data = AkunModel::with(['score','statusplayer','posisi'])->get();
      return response()->json($data);
    }

    public function show($id) {
      $data = AkunModel::where('id',$id)->with(['score','statusplayer','posisi'])->get();
      return response()->json($data);
    }

    public function store(Request $request) {
      $data = new AkunModel();
      $data->username = $request->input('username');
      $data->password = $request->input('password');
      $data->email = $request->input('email');
      $data->posisi = 1;
      $data->save();

      return response('Berhasil Register');
    }

    public function update(Request $request, $id) {
      $data = AkunModel::where('id',$id)->first();
      $data->username = $request->input('username');
      $data->password = $request->input('password');
      $data->email = $request->input('email');
      $data->posisi = $request->input('posisi');
      $data->save();
      return response('Berhasil Update');
    }

    public function destroy($id) {
      $data = AkunModel::where('id',$id)->first();
      $data->delete();

      return response('Berhasil Hapus');
    }

    public function listing() {
      echo "get('/akun','AkunController@index');<br>";
      echo "get('/akun/{id}','AkunController@show');<br>";
      echo "post('/akun','AkunController@store');<br>";
      echo "put('/akun/{id}','AkunController@update');<br>";
      echo "delete('/akun/{id}','AkunController@destroy');<br><br>";

      echo "get('/posisi','PosisiController@index');<br>";
      echo "get('/posisi/{id}','PosisiController@show');<br>";
      echo "post('/posisi','PosisiController@store');<br>";
      echo "put('/posisi/{id}','PosisiController@update');<br>";
      echo "delete('/posisi/{id}','PosisiController@destroy');<br><br>";

      echo "get('/score','ScoreController@index');<br>";
      echo "get('/score/{id}','ScoreController@show');<br>";
      echo "post('/score','ScoreController@store');<br>";
      echo "put('/score/{id}','ScoreController@update');<br>";
      echo "delete('/score/{id}','ScoreController@destroy');<br><br>";

      echo "get('/soal','SoalController@index');<br>";
      echo "get('/soal/{id}','SoalController@show');<br>";
      echo "post('/soal','SoalController@store');<br>";
      echo "put('/soal/{id}','SoalController@update');<br>";
      echo "delete('/soal/{id}','SoalController@destroy');<br><br>";

      echo "get('/status','StatusPlayerController@index');<br>";
      echo "get('/status/{id}','StatusPlayerController@show');<br>";
      echo "post('/status','StatusPlayerController@store');<br>";
      echo "put('/status/{id}','StatusPlayerController@update');<br>";
      echo "delete('/status/{id}','StatusPlayerController@destroy');<br><br>";


      echo "//cek condition in game<br>";
      echo "post('/cek','AkunController@cek');";

    }

    public function cek(Request $request) {
      $A = $request->input('username');
      $B = $request->input('password');

      $data[0] = AkunModel::where('username',$A)->where('password',$B)->with(['score','statusplayer','posisi'])->count();

      if($data[0] == 1) {
        $data[1] = AkunModel::where('username',$A)->where('password',$B)->with(['score','statusplayer','posisi'])->get();
        for($L1 = 0; $L1 < 2; $L1++) {
          $data[2] = StatusPlayerModel::where('id_akun',$data[1][0]->id)->count();
          if($data[2] == 1) {
            for($L2 = 0; $L2 < 2; $L2++) {
              $data[3] = ScoreModel::where('id_akun',$data[1][0]->id)->count();
              if($data[3] == 1) {
                  $data[4] = AkunModel::where('username',$A)->where('password',$B)->with(['score','statusplayer','posisi'])->get();
                  return response()->json($data[4]);
              } else {
                  $data[3] = new ScoreModel();
                  $data[3]->id_akun = $data[1][0]->id;
                  $data[3]->score = 0;
                  $data[3]->id_posisi = 1;
                  $data[3]->save();
              }
              //return response()->json($data[3]);
            }
          } else {
            $data[3] = new StatusPlayerModel();
            $data[3]->id_akun = $data[1][0]->id;
            $data[3]->stamina = 0;
            $data[3]->sanity = 0;
            $data[3]->save();
          }
        }
        //print_r($data[1][0]->posisi->nama);
        //return response()->json($data[2]);
      } else {
        return response('Gagal Login');
      }
    }

    //
}
