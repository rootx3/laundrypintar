<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use Illuminate\Http\Request;
use App\Models\paket;
use Illuminate\Support\Facades\Session;
use App\Models\transaksi;
use App\Models\member;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = member::all();
        $data = [];
        if (!empty(Session::get('cart'))) {
            $session = Session::get('cart');
            foreach ($session as $key => $value) {
                $data[$key] = paket::find($value['id']);
            }
        } else {
            $session = [];
        }
        $paket = paket::all();
        return view('/admin/content/pemesanan/index')->with([
            'data' => $data,
            'paket' => $paket,
            'member' => $member,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $nama_paket = $request['nama_paket'];
            $data = [
                'id' => $id,
                'nama_paket' => $nama_paket,
            ];
            Session::push('cart', $data);
        } else {
            $nama_paket = "paket1";
            $data = [
                'id' => $id,
                'nama_paket' => $nama_paket,
            ];
            Session::push('cart', $data);
            if (Auth()->user()->role == 'admin') {
                return redirect('/admin/pemesanan');
            }
            if (Auth()->user()->role == 'kasir') {
                return redirect('/kasir/pemesanan');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        if (Auth()->user()->role == 'admin') {
            return redirect('/admin/pemesanan');
        }
        if (Auth()->user()->role == 'kasir') {
            return redirect('/kasir/pemesanan');
        }
    }


    public function checkout(Request $request)
    {
        $config = ('outlet' . Auth::user()->id_outlet . '-');
        $inv = IdGenerator::generate(['table' => 'transaksi_15453', 'field' => 'kode_invoice', 'length' => 13, 'prefix' => $config, 'reset_on_prefix_change' => true]);
        $validate = [
            'id_member' => 'required',
            'batas_waktu' => 'required',
            'dibayar' => 'required',
            'id_paket' => 'required',
            'qty' => 'required',
        ];
        $fails = Validator::make($request->all(), $validate);
        if ($fails->fails()) {
            alert()->error('Pemesanan Gagal!');
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/pemesanan')->withInput();
            }
            if (Auth::user()->role == 'kasir') {
                return redirect('/kasir/pemesanan')->withInput();
            }
        } else {
            transaksi::create([
                'id_user' => Auth::user()->id,
                'id_member' => $request->id_member,
                'id_outlet' => Auth::user()->id_outlet,
                'kode_invoice' => $inv,
                'batas_waktu' => $request->batas_waktu,
                'dibayar' => $request->dibayar,
                'tgl' => date('Y-m-d'),
                'tgl_bayar' => $request->tgl_bayar,
                'status' => "baru",
                'diskon' => $request->diskon,
                'biaya_tambahan' => $request->biaya_tambahan,
                'pajak' => $request->pajak


            ]);
            $transaksi = transaksi::where('kode_invoice', $inv)->first();
            detail_transaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_paket' => $request->id_paket,
                'qty' => $request->qty,
            ]);
        }
        if (Auth::user()->role == 'admin') {
            alert()->success('Pemesanan Berhasil!');
            return redirect('/admin/pemesanan');
        }
        if (Auth::user()->role == 'kasir') {
            alert()->success('Pemesanan Berhasil!');
            return redirect('/kasir/pemesanan');
        }
    }
}
