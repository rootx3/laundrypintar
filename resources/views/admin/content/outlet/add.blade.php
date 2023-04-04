@extends('/admin/layout/index')
@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert-container">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Outlet!</h1>
                        </div>
                        <form class="user" method="post" action="/admin/outlet/add">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control " name="nama" placeholder="Nama">
                                </div>
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control " name="tlp" placeholder="Telepon">
                                </div>
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