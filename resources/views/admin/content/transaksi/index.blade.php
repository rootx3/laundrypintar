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
                                <th> Outlet</th>
                                <th>Invoice</th>
                                <th>Member</th>
                                <th>Tanggal</th>
                                <th>Batas Waktu</th>
                                <th> Bayar</th>
                                <th> Tambahan</th>
                                <th>Diskon</th>
                                <th>Pajak</th>
                                <th>Status</th>
                                <th>Dibayar</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ App\Models\outlet::getnama($d->id_outlet) }}</td>
                                    <td>{{ $d->kode_invoice }}</td>
                                    <td>{{ App\Models\member::getnama($d->id_member) }} </td>
                                    <td>{{ date('d-m-Y', strtotime($d->tgl)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($d->batas_waktu)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($d->tgl_bayar)) }}</td>
                                    <td>{{ $d->biaya_tambahan }}</td>
                                    <td>{{ $d->diskon }}</td>
                                    <td>{{ $d->pajak }}</td>
                                    <td>{{ $d->status }}</td>
                                    <td>{{ $d->dibayar }}</td>
                                    <td>{{ App\Models\user::getnama($d->id_user) }}</td>
                                    <td>
                                        @if (Auth()->user()->role == 'admin')
                                            <a href="/admin/transaksi/edit/{{ $d['id'] }}"
                                                class="btn btn-warning  btn-sm">
                                                <span>edit</span>
                                            </a>
                                        @elseif(Auth()->user()->role == 'kasir')
                                            <a href="/kasir/transaksi/edit/{{ $d['id'] }}"
                                                class="btn btn-warning  btn-sm">
                                                <span>edit</span>
                                            </a>
                                        @endif
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
