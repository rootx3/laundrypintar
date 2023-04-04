@extends('/admin/layout/index')
@section('content')
    <div class="container-fluid">
        <div class="d-grid gap-2 d-md-block">
            <a href="/cetak" class="btn btn-success" type="button">CETAK LAPORAN</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header  bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white">Laporan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Outlet</th>
                                <th>Invoice</th>
                                <th>Member</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Dibayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ App\Models\outlet::getnama($d->id_outlet) }}</td>
                                    <td>{{ $d->kode_invoice }}</td>
                                    <td>{{ App\Models\member::getnama($d->id_member) }}</td>
                                    <td>{{ $d->tgl }}</td>
                                    <td>{{ $d->status }}</td>
                                    <td>{{ $d->dibayar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
