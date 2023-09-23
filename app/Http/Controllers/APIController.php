<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use Illuminate\Support\Facades\DB;
use App\Models\Akar;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    //
    public function tampil(){

        $response = Akar::latest('id')->take(2)->get(); // Mengambil semua data dari tabel items

        return view('akar_kuadrat',compact('response'));
    }


    public function postAPI(Request $request){
        //dd($request->bilangan);
        $start_time = microtime(true); 
        $request->validate([
            'bilangan' => 'required|numeric|min:0',
        ]);

        Http::post('http://127.0.0.1:8000/api/hitung-akar',[
            'number' => $request->bilangan,
        ]);
        
        $end_time = microtime(true); // Selesai mengukur waktu proses
        $execution_time = ($end_time - $start_time); 
        $response = Akar::latest('id')->first();

        $response->waktu = $execution_time;
        
        $response->update();
  
        
        return redirect('/akar-kuadrat');
    }

    public function postPLSQL(Request $request){
        $start_time = microtime(true); 
        
        $request->validate([
            'bilangan1' => 'required|numeric|min:0',
        ]);
        //dd($request->bilangan1);
        
        DB::select('CALL hitungAkar(?)', array($request->bilangan1));
        $end_time = microtime(true); // Selesai mengukur waktu proses
        $execution_time = ($end_time - $start_time); 
        $response = Akar::latest('id')->first();

        $response->waktu = $execution_time;
        
        $response->update();
        
        return redirect('/akar-kuadrat');
    }
}