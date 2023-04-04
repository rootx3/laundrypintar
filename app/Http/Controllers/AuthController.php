<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\outlet;
use Illuminate\Http\Request;
use Alert;

use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::all();
        $outlet = outlet::all();
        return view('/admin/content/user/index')->with([
            "outlet" => $outlet,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = outlet::all();
        return view('/admin/content/user/add')->with([
            "outlet" => $outlet
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:100',
            'password' => 'required|min:8',
            'role' => 'required',
            'id_outlet' => 'required'
        ]);
        user::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'id_outlet' => $request->id_outlet
        ]);
        alert()->success('Add Successfully');
        return redirect('/admin/user');
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
        $data = user::find($id);
        $outlet = outlet::all();
        return view('/admin/content/user/edit')->with([
            'outlet' => $outlet,
            'data' => $data
        ]);
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
       
        $rules = [
            'name' => 'required|max:100',
            'username' => 'required|max:100',
            'role' => 'required',
            'id_outlet' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            alert()->error('Update Gagal');
            return redirect()->back()->withInput();
        }
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'id_outlet' => $request->id_outlet,
        ];
        if ($request->password != null) {
            $data['password'] = bcrypt($request->password);
        } else {
            user::where('password');
        }
        user::where('id', $id)->update($data);
        alert()->success('Update Berhasil');
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::where('id', $id)->delete();
        alert()->success('Delete Succesfully');
        return redirect('/admin/user');
    }
}
