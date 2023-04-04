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
                                    <th scope="col"> nama member</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Outlet </th>
                                    <th scope="col"> nama paket</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">harga </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $d)
                                        <tr>
                                            <td>{{ App\Models\member::getnama($d->id_member) }} </td>
                                            <td> {{ date('d-m-Y', strtotime($d->tgl)) }} </td>
                                            <td> {{ App\Models\outlet::getnama($d->id_outlet) }} </td>

                                            <td>{{ App\Models\paket::getnama($d->id_paket) }}</td>
                                            <td>{{ $de->qty }}</td>
                                            <td>{{ App\Models\paket::getharga($d->id_paket) }}</td>
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
