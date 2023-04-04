@extends('/admin/layout/index')
@section('content')
<div class="container-fluid">

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
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{App\Models\outlet::getnama($d->id_outlet)}}</td>
                            <td>{{$d->kode_invoice}}</td>
                            <td>{{App\Models\member::getnama($d->id_member)}}</td>
                            <td>{{$d->tgl}}</td>
                            <td>{{$d->status}}</td>
                            <td>{{$d->dibayar}}</td>
                            <td>
                                <a href="/cetak/{{$d['id']}}" class="btn btn-primary  btn-sm">
                                    <span>cetak</span>
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