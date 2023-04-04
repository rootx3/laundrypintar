<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Http\Requests\StorememberRequest;
use App\Http\Requests\UpdatememberRequest;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = member::all();
        return view('/admin/content/pelanggan/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/content/pelanggan/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorememberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorememberRequest $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'tlp' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|max:10'
        ]);
        member::create([
            'nama' => $request->nama,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        alert()->success('Add Successfully');
        if(Auth()->user()->role == 'admin'){
            return redirect('/admin/customer');
        }if(Auth()->user()->role == 'kasir'){
            return redirect('/kasir/customer');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member, $id)
    {
        $data = member::find($id);
        return view('/admin/content/pelanggan/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatememberRequest  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatememberRequest $request, member $member, $id)
    {
        $rules = ([
            'nama' => 'required|max:100',
            'tlp' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|max:10'
        ]);
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            alert()->error('Update Gagal!');
            return redirect('/admin/customer/edit/' . $id);
        } else {
            member::find($id)->update($request->all());
            alert()->success('Update Berhasil');
        }
        return redirect('/admin/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $member, $id)
    {
        member::where('id', $id)->delete();
        alert()->success('Delete Successfully');
        return redirect('/admin/customer');
    }
}
