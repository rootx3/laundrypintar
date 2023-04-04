@extends('/admin/layout/index')
@section('content')
<div class="conteiner">
    <div class="row">
        <div class="col-6 ">
            <div class="overflow-y-scroll " style="height: 37rem; ">
                <div class="container">
                    <div class="row">
                        @foreach($paket as $p)
                        <div class="col m-1">
                            <div class="card shadow-sm" style="width: 10rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$p->nama_paket}}</h5>
                                    <p class="card-text">Rp{{ number_format($p->harga, 0, ',', '.') }}/Kg</p>
                                    @if (Auth()->user()->role == 'admin')
                                    <a href="/admin/pemesanan/cart/{{$p['id']}}" class="btn btn-primary">tambah</a>
                                    @elseif(Auth()->user()->role == 'kasir')
                                    <a href="/kasir/pemesanan/cart/{{$p['id']}}" class="btn btn-primary">tambah</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 ">
            <div >
                <div class="card">
                    <div class="card-body">
                        @include('/admin/content/pemesanan/nota')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection