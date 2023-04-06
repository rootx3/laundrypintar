@extends('/admin/layout/index')
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit pelanggan!</h1>
                        </div>
                        <form class="user" method="post" 
                      
                        action="">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " value="{{$data->nama}}" name="nama" placeholder="Nama">
                                </div>
                                <div class="col-sm-6">
                                    <select name="jenis_kelamin" class="form-control  form-select " aria-label=".form-select-sm example">
                                        <option value="{{$data->jenis_kelamin}}" selected>{{$data->jenis_kelamin}}</option>
                                        <option value="Laki-laki">Laki-laki
                                        </option>
                                        <option value="Perempuan">Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control " value="{{$data->tlp}}" name="tlp" placeholder="Telepon">
                            </div>
                            <div class="form-group mb-5">
                                <input type="text" class="form-control " value="{{$data->alamat}}" name="alamat" placeholder="Alamat">
                            </div>
                            <button class="btn btn-primary btn-user btn-block">
                                <b>Simpan</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection