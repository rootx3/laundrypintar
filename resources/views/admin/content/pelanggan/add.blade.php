@extends('/admin/layout/index')
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Pelanggan!</h1>
                        </div>
                        <form class="user" method="post" 
                        @if(Auth()->user()->role=='admin')
                        action="/admin/customer/add"
                        @elseif(Auth()->user()->role=='admin')
                        action="/kasir/customer/add"
                        @endif
                        >
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " name="nama" placeholder="Nama">
                                </div>

                                <div class="col-sm-6">
                                    <input type="tel" class="form-control " name="tlp" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="jenis_kelamin" class="form-control  form-select " aria-label=".form-select-sm example">
                                    <option value="" selected>-- Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki
                                    </option>
                                    <option value="Perempuan">Perempuan
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mb-5">
                                <input type="text" class="form-control " name="alamat" placeholder="Alamat">
                            </div>
                            <button class="btn btn-primary btn-user btn-block">
                                <b>Create</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection