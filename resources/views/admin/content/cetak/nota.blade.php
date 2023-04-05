<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LAUNDRY PINTAR</title>
</head>

<body id="page-top">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-body">
                        <center>
                            <h3>Laundry Pintar</h3>
                        </center>
                        <table class="table " width="100%" border="1" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Outlet</th>
                                    <th>Invoice</th>
                                    <th>Member</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Dibayar</th>
                                    <th>Paket</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach ($all as $d)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ App\Models\outlet::getnama($d->id_outlet) }}</td>
                                        <td>{{ $d->kode_invoice }}</td>
                                        <td>{{ App\Models\member::getnama($d->id_member) }}</td>
                                        <td> {{ date('d-m-Y', strtotime($d->tgl)) }}</td>
                                        <td>{{ $d->status }}</td>
                                        <td>{{ $d->dibayar }}</td>
                                        <td>{{App\Models\paket::getnama($d->id_paket)}}</td>
                                        <td>{{$d->qty}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
