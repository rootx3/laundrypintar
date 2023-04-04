@extends('/admin/layout/index')
@section('content')
<div class="container-fluid">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/admin/user/add" class="btn btn-success btn-sm" type="button">
            <Tambah><i class="fa fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header  bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Outlet</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->name}}</td>
                            <td>{{$d->username}}</td>
                            <td>{{App\Models\outlet::getnama($d->id_outlet)}}</td>
                            <td>{!!Str::limit($d['password'],10)!!}</td>
                            <td>{{$d->role}}</td>
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                <a href="/admin/user/edit/{{$d['id']}}" class="btn btn-warning  btn-sm">
                                    <span>edit</span>
                                </a>
                                @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'kasir')
                                <a href="/kasir/user/edit/{{$d['id']}}" class="btn btn-warning  btn-sm">
                                    <span>edit</span>
                                </a>
                                @endif
                                <a class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#modal-delete{{$d['id']}}" data-id="{{$d['id']}}">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach($data as $d)
<div class="modal fade" id="modal-delete{{$d['id']}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Outlet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Apakah anda yakin ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                {!! Form::open(['route' => ['delete3.destroy',$d->id], 'method' => 'delete']) !!}
                {!! Form::hidden('id',null,['id'=>'id-destroy']) !!}
                <button type="submit" class="btn btn-danger">Ya</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection