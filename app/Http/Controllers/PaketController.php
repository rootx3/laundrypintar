<?php

namespace App\Http\Controllers;

use App\Models\paket;
use App\Models\outlet;
use App\Http\Requests\StorepaketRequest;
use App\Http\Requests\UpdatepaketRequest;
use Illuminate\Support\Facades\Validator;
use Alert;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = paket::all();
        return view('/admin/content/paket/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = outlet::all();
        return view('/admin/content/paket/add')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepaketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepaketRequest $request)
    {
        $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required|max:100',
            'harga' => 'required|numeric'
        ]);
        paket::create([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga
        ]);
        alert()->success('Add Berhasil');
        return redirect('/admin/paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(paket $paket, $id)
    {
        $data = paket::find($id);
        $outlet = outlet::all();
        return view('/admin/content/paket/edit')->with([
            'data' => $data,
            'outlet' => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaketRequest  $request
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepaketRequest $request, paket $paket, $id)
    {
        $rules = ([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required|max:100',
            'harga' => 'required|numeric'
        ]);
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            alert()->error('Update Gagal!');
            return redirect('/admin/paket/edit' . $id);
        } else {
            paket::find($id)->update($request->all());
            alert()->success('Update Berhasil!');
        }
        
        return redirect('/admin/paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(paket $paket, $id)
    {
        paket::where('id', $id)->delete();
        alert()->success('Delete Berhasil!');
        return redirect('/admin/paket');
    }
}