<?php

namespace App\Http\Controllers;

use App\Models\Banjir;

class Home extends Controller
{
    public function beranda()
    {
        $data['banjir'] = Banjir::all();
        $data['centeroid'] = Banjir::take(3)->get();
        return view('halaman_depan.beranda', $data);
    }
}
