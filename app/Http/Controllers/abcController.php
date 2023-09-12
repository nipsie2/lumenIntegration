<?php

namespace App\Http\Controllers;
use App\Models\abcModel;
use Illmuniate\Http\Request;

class abcController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getDaftarMhsBayar(){
        return abcModel::all(); 
    }
    public function updateRestriksi(Request $request, $idMHS){
        $mhs = abcModel::find($idMHS);
        if ($mhs) {
            $mhs->update($request->all());
            return response()->json([
                'message' => 'Mahasiswa telah direstriksi'
            ]);
        } else return response()->json([
            'message' => 'Post not found', 404
        ]);
    }

    //
}
