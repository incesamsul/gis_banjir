<?php

namespace App\Http\Controllers;

use App\Models\Banjir;

class Home extends Controller
{
    public function beranda($year = 2020)
    {
        $data['banjir'] = Banjir::whereYear('tgl_kejadian', '=', $year)->get();
        $data['centeroid'] = Banjir::whereYear('tgl_kejadian', '=', $year)->take(3)->get();
        if (count($data['centeroid']) < 3) {
            return redirect('/')->with('message', 'belum ada data banjir untuk tahun terpilih');
        }
        $data['tahun'] = $year;
        return view('halaman_depan.beranda', $data);
    }

    public function peta()
    {
        return view('halaman_depan.peta');
    }
}
