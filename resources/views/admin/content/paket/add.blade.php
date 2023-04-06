@extends('/admin/layout/index')
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Paket!</h1>
                        </div>
                        <form class="user" method="post" action="/admin/paket/add">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " name="nama_paket" placeholder="Nama Paket">
                                </div>
                                <div class="col-sm-6">
                                    <select name="id_outlet" class="form-control  form-select " aria-label=".form-select-sm example">
                                        <option value="" selected>-- Outlet --</option>
                                        @foreach($data as $o)
                                        <option value="{{$o->id}}">{{$o->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="jenis" class="form-control  form-select " aria-label=".form-select-sm example">
                                    <option value="" selected>-- Jenis Paket --</option>
                                    <option value="selimut">selimut</option>
                                    <option value="kiloan">kiloan</option>
                                    <option value="bed_cover">bed_cover</option>
                                    <option value="kaos">kaos</option>
                                    <option value="lain">lain</option>
                                </select>
                            </div>
                            <div class="input-group mb-5 flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">RP.</span>
                                <input type="text" class="form-control " name="harga" placeholder="Harga">
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