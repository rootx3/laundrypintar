<?php

namespace App\Http\Controllers;

use App\Models\detail_transaksi;
use App\Http\Requests\Storedetail_transaksiRequest;
use App\Http\Requests\Updatedetail_transaksiRequest;
use App\Models\transaksi;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $all = detail_transaksi::join('transaksi_15453','transaksi_15453.id','=','detail_transaksi_15453.id_transaksi')->get();
        // $data =  transaksi::all();
        return view('/admin/content/laporan/index')->with('all',$all);
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
     * @param  \App\Http\Requests\Storedetail_transaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storedetail_transaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_transaksi $detail_transaksi,$id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatedetail_transaksiRequest  $request
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Updatedetail_transaksiRequest $request, detail_transaksi $detail_transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_transaksi $detail_transaksi)
    {
        //
    }
}