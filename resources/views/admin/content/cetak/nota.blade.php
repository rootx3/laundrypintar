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
                        <table border="2" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col"> <b>Nama Member</b></th>
                                    <th scope="col"><b>Tanggal</b></th>
                                    <th scope="col"><b>Outlet </b></th>
                                    <th scope="col"> <b>Batas Waktu</b></th>
                                    <th scope="col"><b>Tambahan</b></th>
                                    <th scope="col"><b>Diskon</b> </th>
                                    <th scope="col"><b>Pajak</b> </th>
                                    <th scope="col"><b>Status</b> </th>
                                    <th scope="col"><b>Bayar</b> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as  $b)
                                    <tr>
                                        <td>{{ App\Models\member::getnama($b->id_member) }} </td>
                                        <td> {{ date('d-m-Y', strtotime($b->tgl)) }} </td>
                                        <td> {{ App\Models\outlet::getnama($b->id_outlet) }} </td>
                                        <td>{{ $b->batas_waktu }}</td>
                                        <td>{{ $b->biaya_tambahan }}</td>
                                        <td>{{ $b->diskon }}</td>
                                        <td>{{ $b->pajak }}</td>
                                        <td>{{$b->status}}</td>
                                        <td>{{$b->dibayar}}</td>
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
