@extends('/admin/layout/index')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header  bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Outlet</th>
                            <th>Kode Invoice</th>
                            <th>Id Member</th>
                            <th>Tanggal</th>
                            <th>Batas Waktu</th>
                            <th>Tanggal Bayar</th>
                            <th>Biaya Tambahan</th>
                            <th>Diskon</th>
                            <th>Pajak</th>
                            <th>Status</th>
                            <th>Dibayar</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->id_outlet}}</td>
                            <td>{{$d->kode_invoice}}</td>
                            <td>{{$d->id_member}}</td>
                            <td>{{$d->tgl}}</td>
                            <td>{{$d->batas_waktu}}</td>
                            <td>{{$d->tgl_bayar}}</td>
                            <td>{{$d->biaya_tambahan}}</td>
                            <td>{{$d->diskon}}</td>
                            <td>{{$d->pajak}}</td>
                            <td>{{$d->status}}</td>
                            <td>{{$d->dibayar}}</td>
                            <td>{{$d->id_user}}</td>
                            <td>
                                <a href="#" class="btn btn-warning  btn-sm">
                                    <span>edit</span>
                                </a>
                                <a class="btn btn-danger  btn-sm">
                                    hapus
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

@endsection