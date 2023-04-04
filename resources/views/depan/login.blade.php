<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>LOGIN</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <div class="card o-hidden border-2 shadow  m-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col">
                                            <div class="p-5">
                                                <div class="text-center mb-4">
                                                    <h3 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Laundry Pintar</h3>
                                                </div>
                                                <form class="user" method="post" action="/">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" class="form-control " name="username" placeholder="Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control " name="password" placeholder="Password">
                                                    </div>
                                                    <button  class=" btn btn-primary btn-block">
                                                        Login
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>