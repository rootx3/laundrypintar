@extends('/admin/layout/index')
@section('content')
<script>
    $(document).on('click', '.delete', function() {
        let id = $(this).attr('data-id');
        $('#id-destroy').val(id);
    });
</script>
<div class="container-fluid">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/admin/customer/add" class="btn btn-success btn-sm" type="button">
            <Tambah><i class="fa fa-plus"></i> Tambah
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header  bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Pelanggan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Telepon</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->nama}}</td>
                            <td>{!!Str::limit($d['alamat'],40)!!}</td>
                            <td style="width: 15%;">{{$d->jenis_kelamin}}</td>
                            <td>0{{{$d->tlp}}}</td>
                            <td>
                            @if(Auth()->user()->role == 'admin')
                                <a href="/admin/customer/edit/{{$d['id']}}" class="btn btn-warning  btn-sm">
                                    <span>edit</span>
                                </a>
                                @elseif(Auth()->user()->role == 'kasir')
                                <a href="/kasir/customer/edit/{{$d['id']}}" class="btn btn-warning  btn-sm">
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
                {!! Form::open(['route' => ['delete2.destroy',$d->id], 'method' => 'delete']) !!}
                {!! Form::hidden('id',null,['id'=>'id-destroy']) !!}
                <button type="submit" class="btn btn-danger">Ya</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection