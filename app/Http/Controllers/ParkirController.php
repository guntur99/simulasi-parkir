<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parkir;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ParkirController extends Controller
{
    public function checkIn()
    {
        return view('parkir.check-in');
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'no_polisi'         => 'required',
            'jenis_kendaraan'   => 'required',
            'waktu_masuk'       => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $parkir = new Parkir;
        $parkir->no_polisi = request()->no_polisi;
        $parkir->jenis_kendaraan = request()->jenis_kendaraan;
        $parkir->waktu_masuk = request()->waktu_masuk;
        $parkir->save();

        return redirect()->route('welcome')->with('success', 'Data berhasil disimpan');
    }

    public function checkOut()
    {
        $parkir = null;

        return view('parkir.check-out', compact('parkir'));
    }

    public function cariKendaraan()
    {
        $validator = Validator::make(request()->all(), [
            'no_polisi'         => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $parkir = Parkir::where('no_polisi', request()->no_polisi)->first();

        if($parkir) {
            return view('parkir.check-out', compact('parkir'));
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function update($id)
    {
        $validator = Validator::make(request()->all(), [
            'no_polisi'         => 'required',
            'jenis_kendaraan'   => 'required',
            'waktu_masuk'       => 'required',
            'waktu_keluar'      => 'required',
            'biaya'             => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $parkir                     = Parkir::find($id);
        $parkir->no_polisi          = request()->no_polisi;
        $parkir->jenis_kendaraan    = request()->jenis_kendaraan;
        $parkir->waktu_masuk        = request()->waktu_masuk;
        $parkir->waktu_keluar       = request()->waktu_keluar;
        $parkir->biaya              = request()->biaya;
        $parkir->save();

        return redirect()->route('parkir.report')->with('success', 'Data berhasil disimpan');
    }

    public function report()
    {
        $parkirs = Parkir::all();

        return view('parkir.report', compact('parkirs'));
    }
}
