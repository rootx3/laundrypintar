@extends('/admin/layout/index')
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <input type="hidden" name="old_password" value="{{ $data->password }}">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit User!</h1>
                        </div>
                        <form class="user" method="post" action="">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " value="{{$data->name}}" name="name" placeholder="Nama">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control " value="{{$data->username}}" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="id_outlet" class="form-control  form-select " aria-label=".form-select-sm example">
                                        <option value="{{$data->id_outlet}}" selected>{{App\Models\outlet::getnama($data->id_outlet)}}</option>
                                        @foreach($outlet as $o)
                                        <option value="{{$o->id}}">{{$o->nama}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="role" class="form-control  form-select " aria-label=".form-select-sm example">
                                        <option value="{{$data->role}}" selected>{{$data->role}}</option>
                                        <option value="admin">Admin
                                        </option>
                                        <option value="owner">Owner
                                        </option>
                                        <option value="kasir">Kasir
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-5">
                                <input type="text" class="form-control " value="" name="password" placeholder="Password">
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