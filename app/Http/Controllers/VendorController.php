<?php
namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    private $daftar_kategori = [
        'Pemasok Kemasan', 'Pemasok Bahan Baku', 'Pemasok Elektronik',
        'Pemasok Alat Kantor', 'Lainnya',
    ];

    // tampil semua data
    public function index()
    {
        $vendors = Vendor::orderByDesc('id')->get();
        return view('vendors.index', compact('vendors'));
    }

    // form tambah
    public function create()
    {
        $vendor = new Vendor(['status' => 1]);
        $daftar_kategori = $this->daftar_kategori;
        return view('vendors.form', compact('vendor', 'daftar_kategori'));
    }

    // simpan data baru
    public function store(Request $request)
    {
        $data = $this->validasi($request);
        Vendor::create($data);
        return redirect()->route('vendors.index');
    }

    // form edit
    public function edit(Vendor $vendor)
    {
        $daftar_kategori = $this->daftar_kategori;
        return view('vendors.form', compact('vendor', 'daftar_kategori'));
    }

    // simpan perubahan
    public function update(Request $request, Vendor $vendor)
    {
        $data = $this->validasi($request);
        $vendor->update($data);
        return redirect()->route('vendors.index');
    }

    // hapus data
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendors.index');
    }

    // validasi dipakai bersama oleh store dan update
    private function validasi(Request $request)
    {
        $data = $request->validate([
            'nama_perusahaan' => 'required',
            'kategori'        => 'required',
            'email'           => 'required|email',
            'telepon'         => 'required',
            'alamat'          => 'required',
            'kota'            => 'required',
            'npwp'            => 'nullable',
            'nib'             => 'nullable',
            'nama_pic'        => 'required',
            'telepon_pic'     => 'required',
        ]);

        // checkbox: dicentang = 1, tidak = 0
        $data['status'] = $request->has('status') ? 1 : 0;

        return $data;
    }
}