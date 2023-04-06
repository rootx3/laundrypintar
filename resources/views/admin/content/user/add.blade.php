@extends('/admin/layout/index')
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah User!</h1>
                        </div>
                        <form class="user" method="post" action="/admin/user/add">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " name="name" placeholder="Nama">
                                </div>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control " name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control " name="password" placeholder="Password">
                                </div>

                                <div class="col-sm-6">
                                    <select name="role" class="form-control  form-select " aria-label=".form-select-sm example">
                                        <option value="" selected>-- Role --</option>
                                        <option value="admin">admin</option>
                                        <option value="kasir">kasir</option>
                                        <option value="owner">owner</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="id_outlet" class="form-control  form-select " aria-label=".form-select-sm example">
                                    <option value="" selected>-- Tempat --</option>
                                    @foreach($outlet as $o)
                                    <option value="{{$o->id}}">{{$o->nama}}</option>
                                    @endforeach
                                </select>
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