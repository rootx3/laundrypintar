<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Http\Requests\StoreoutletRequest;
use App\Http\Requests\UpdateoutletRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $data = outlet::all();
        return view('/admin/content/outlet/index')->with('data', $data,);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/content/outlet/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreoutletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreoutletRequest $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'tlp' => 'required|numeric',
            'alamat' => 'required'
        ]);
        outlet::create([
            'nama' => $request->nama,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
        ]);
        alert()->success('Add Berhasil');
        return redirect('/admin/outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(outlet $outlet, $id)
    {
        $data = outlet::find($id);
        return view('/admin/content/outlet/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateoutletRequest  $request
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response    
     */
    public function update(UpdateoutletRequest $request, outlet $outlet, $id)
    {
        $rules = ([
            'nama' => 'required|max:100',
            'tlp' => 'required|numeric',
            'alamat' => 'required'
        ]);
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            alert()->error('Update Gagal!');
            return redirect('/admin/outlet/edit/' . $id);
        } else {
            outlet::find($id)->update($request->all());
            alert()->success('Update Berhasil');
        }
        return redirect('/admin/outlet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(outlet $outlet, $id)
    {
        outlet::where('id', $id)->delete();
        alert()->success('Delete Berhasil');
        return redirect('/admin/outlet');
    }
}
