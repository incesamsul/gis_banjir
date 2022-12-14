<?php

namespace App\Http\Controllers;

use App\Models\Banjir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Admin extends Controller
{

    protected $userModel;
    protected $profileUserModel;
    protected $kritikSaranModel;
    protected $kuisionerModel;
    protected $penilaianModel;


    public function __construct()
    {
        $this->userModel = new User();
    }

    public function pengguna()
    {
        $data['pengguna'] = $this->userModel->getAllUser();
        return view('pages.pengguna.index', $data);
    }

    public function dataBanjir()
    {
        $data['banjir'] = Banjir::all();
        return view('pages.banjir.index', $data);
    }

    public function hasilClustering($year = 2022)
    {
        $data['banjir'] = Banjir::whereYear('tgl_kejadian', '=', $year)->get();
        $data['centeroid'] = Banjir::whereYear('tgl_kejadian', '=', $year)->take(3)->get();
        if (count($data['centeroid']) < 3) {
            return redirect('/admin/data_banjir')->with('message', 'belum ada data banjir untuk tahun terpilih');
        }
        $data['tahun'] = $year;
        return view('pages.hasil_cluster.index', $data);
    }




    public function createDataBanjir(Request $request)
    {

        Banjir::create([
            'tgl_kejadian' => $request->tgl_kejadian,
            'kecamatan' => $request->kecamatan,
            // 'kelurahan' => $request->kelurahan,
            // 'titik_bencana' => $request->titik_bencana,
            // 'terdampak_kk' => $request->terdampak_kk,
            'terdampak_jiwa' => $request->terdampak_jiwa,
            'kerusakan_berat' => $request->kerusakan_berat,
            'kerusakan_ringan' => $request->kerusakan_ringan,
            'kerusakan_sedang' => $request->kerusakan_sedang,
            // 'kerusakan' => $request->kerusakan,
        ]);

        return redirect()->back()->with('message', 'data berhasil disimpan');
    }

    public function updateDataBanjir(Request $request)
    {
        Banjir::where('id_banjir', $request->id)->update([
            'tgl_kejadian' => $request->tgl_kejadian,
            'kecamatan' => $request->kecamatan,
            // 'kelurahan' => $request->kelurahan,
            // 'titik_bencana' => $request->titik_bencana,
            // 'terdampak_kk' => $request->terdampak_kk,
            'terdampak_jiwa' => $request->terdampak_jiwa,
            'kerusakan_berat' => $request->kerusakan_berat,
            'kerusakan_ringan' => $request->kerusakan_ringan,
            'kerusakan_sedang' => $request->kerusakan_sedang,
        ]);
        return redirect()->back()->with('message', 'data berhasil diupdate');
    }

    public function deleteDataBanjir(Request $request)
    {
        Banjir::where('id_banjir', $request->id)->delete();
        return 1;
    }


    public function profileUser()
    {
        $data['user'] = User::all();
        $data['profile'] = $this->profileUserModel->getProfileUser();
        return view('pages.rekaptulasi_data.index', $data);
    }






    // fetch data user by admin
    function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            if ($request->filter == "") {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            } else {
                $data['pengguna'] = DB::table('users')
                    ->where('role', '!=', 'Admin')
                    ->Where('role', '=', $request->filter)
                    ->Where('name', 'like', '%' . $query . '%')
                    ->Where('email', 'like', '%' . $query . '%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
            }

            return view('pages.pengguna.users_data', $data)->render();
        }
    }

    public function createPengguna(Request $request)
    {
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->email),
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di tambahkan');
    }

    public function updatePengguna(Request $request)
    {
        $user = User::where([
            ['id', '=', $request->id]
        ])->first();
        $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'role' => $request->tipe_pengguna,
        ]);
        return redirect('/admin/pengguna')->with('message', 'Pengguna Berhasil di update');
    }

    public function deletePengguna(Request $request)
    {
        User::destroy($request->post('user_id'));
        return 1;
    }
}
