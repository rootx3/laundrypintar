@extends('/admin/layout/index')
@section('content')

<div class="container-fluid">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/admin/outlet/add" class="btn btn-success btn-sm" type="button">
            <Tambah><i class="fa fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header  bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Outlet</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->nama}}</td>
                            <td>{{$d->alamat}}</td>
                            <td>{{$d->tlp}}</td>
                            <td>
                                <a href="/admin/outlet/edit/{{{$d['id']}}}" class="btn btn-warning  btn-sm">
                                    Edit
                                </a>
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
                {!! Form::open(['route' => ['delete.destroy',$d->id], 'method' => 'delete']) !!}
                {!! Form::hidden('id',null,['id'=>'id-destroy']) !!}
                <button type="submit" class="btn btn-danger">Ya</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    $(document).on('click', '.delete', function() {
        let id = $(this).attr('data-id');
        $('#id-destroy').val(id);
    });
</script>
@endsection