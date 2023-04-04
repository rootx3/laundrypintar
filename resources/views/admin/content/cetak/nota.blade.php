<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>LAUNDRY PINTAR</title>
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="container">
        <div class="row">
            <div class="col">
                <center>
                    <div class="card mt-5">
                        <div class="card-body">
                            <center>

                                <h3 class="mb-4">Laundry Pintar</h3>
                                @foreach($data as $d )
                                <div>
                                    <div class="row">
                                        <div class="col-1">
                                            <b>Tanggal :</b>
                                        </div>
                                        <div class="col-2">
                                            <p>{{date('d-m-Y', strtotime($d->tgl))}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-1">
                                            <b>Nama :</b>
                                        </div>
                                        <div class="col-2">
                                            <p>{{App\Models\member::getnama($d->id_member)}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="row">
                                        <div class="col-1">
                                            <b>Outlet :</b>
                                        </div>
                                        <div class="col-2">
                                            <p>{{App\Models\outlet::getnama($d->id_outlet)}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col"> nama paket</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col" >harga </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($detail as $de)
                                        <tr class="text-center">
                                            <td>{{App\Models\paket::getnama($de->id_paket)}}</td>
                                            <td>{{$de->qty}}</td>
                                            <td>{{App\Models\paket::getharga($de->id_paket)}}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <th colspan="2" style="text-align: right;">total pembayaran : </th>
                                            <td>{{App\Models\paket::getharga($de->id_paket)}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </center>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/js/sb-admin-2.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>


</body>

</html>