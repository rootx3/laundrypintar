<form action="/admin/pemesanan/cek" method="post">
    @csrf
    @if(!empty($data))
    @foreach ($data as $key => $value)

    <div class="row">
        <input type="number" name="harga" id="" hidden value="{{$value['harga']}}">
        <div class="col-3">
            <div class="m-2">
                <label for="">Nama</label>
                <input type="text" name="id_paket" value="{{$value['id']}}" hidden>
                <input type="text" name="" value="{{$value['nama_paket']}}" style="width: 100%;">
            </div>
        </div>
        <div class="col-4">
            <div class="m-2">
                <label for="">Keterangan</label>
                <input type="text" name="keterengan" style="width: 100%;">
            </div>
        </div>
        <div class="col-2">
            <div class="m-2">
                <label for="">Qty</label>
                <input type="number" id="qty" name="qty" min="1" style="width:100%;" value="1">
            </div>
        </div>
        <div class="col-2">
            <div class="m-2">
                <label for="">Action</label> 
                @if (Auth()->user()->role == 'admin')
                <a href="/admin/pemesanan/delete/{{$key}}" class="btn btn-danger">delete</a>
                @elseif (Auth()->user()->role == 'kasir')
                <a href="/kasir/pemesanan/delete/{{$key}}" class="btn btn-danger">delete</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    <hr>

    @else
    <div>
        <b>
            Tambahkan Product!!
        </b>
    </div>
    <hr>
    @endif
    <div class="m-2">
        <label for="">member</label>
        <select name="id_member" id="" style="width: 100%;">
            @foreach($member as $m)
            <option value="{{$m->id}}">{{$m->nama}}</option>
            @endforeach
        </select>
    </div>
    <div class="m-2">
        <label for="">tanggal bayar</label>
        <input type="date" name="tgl_bayar" style="width: 100%;">
    </div>
    <div class="m-2">
        <label for="">batas waktu</label>
        <input type="date" name="batas_waktu" style="width: 100%;">
    </div>
    <div class="m-2">
        <label for="">biaya tambahan</label>
        <input type="text" name="biaya_tambahan" style="width: 100%;">
    </div>
    <div class="m-2">
        <label for="">diskon</label>
        <input type="text" name="diskon" style="width: 100%;">
    </div>
    <div class="m-2">
        <label for="">pajak</label>
        <input type="text" name="pajak" style="width: 100%;">
    </div>
    <div class="m-2">
        <label for="">dibayar</label>
        <select name="dibayar" id="" style="width:100%">
            <option value="belum_dibayar" selected>belum dibayar</option>
            <option value="dibayar">dibayar</option>
        </select>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
        <button type="submit" class="btn btn-outline-primary" type="button">Checkout</button>
    </div>
</form>