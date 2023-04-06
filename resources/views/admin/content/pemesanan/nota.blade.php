@php
    $total = 0;
@endphp
<form action="/admin/pemesanan/cek" method="post">
    @csrf
    @if (!empty($data))
        @foreach ($data as $key => $value)
            @php
                $total = $total + $value['harga'];
            @endphp
            <div class="row">
                <input type="number" name="harga" id="" hidden value="{{ $value['harga'] }}">
                <div class="col-3">
                    <div class="m-2">
                        <label for="">Nama</label>
                        <input type="text" name="id_paket" value="{{ $value['id'] }}" hidden>
                        <input type="text" name="" value="{{ $value['nama_paket'] }}" style="width: 100%;">
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
                        <label for="">Jumlah <span style="color:red;">*</span></label>
                        <input type="text" id="qty" name="qty" min="1"
                            style="width:100%;"onkeyup="sum();" >
                    </div>
                </div>
                <div class="col-2">
                    <div class="m-2">
                        <label for="">Action</label>
                        @if (Auth()->user()->role == 'admin')
                            <a href="/admin/pemesanan/delete/{{ $key }}" class="btn btn-danger">delete</a>
                        @elseif (Auth()->user()->role == 'kasir')
                            <a href="/kasir/pemesanan/delete/{{ $key }}" class="btn btn-danger">delete</a>
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
        <label for="">Pelanggan<span style="color:red;">*</span></label>
        <select name="id_member" id="" style="width: 100%;">
            <option value="" selected>-- Pelanggan --</option>
            @foreach ($member as $m)
                <option value="{{ $m->id }}">{{ $m->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="m-2">
        <label for="">Tanggal Bayar</label>
        <input type="date" name="tgl_bayar" style="width: 100%;">
    </div>
    <div class="m-2">
        <label for="">Batas Waktu<span style="color:red;">*</span></label>
        <input type="date" name="batas_waktu" style="width: 100%;">
    </div>
    <div class="m-2">
        <label for="">Biaya Tambahan</label>
        <input type="text" name="biaya_tambahan" id="biayatambahan" style="width: 100%;"onkeyup="sum();"value="0">
    </div>
    <div class="m-2">
        <label for="">Diskon</label>
        <input type="text" name="diskon" id="diskon" style="width: 100%;"onkeyup="sum();"value="0">
    </div>
    <div class="m-2">
        <label for="">Pajak</label>
        <input type="text" name="pajak" id="pajak" style="width: 100%;"onkeyup="sum();"value="0">
    </div>
    <div class="m-2">
        <label for="">Dibayar<span style="color:red;">*</span></label>
        <select name="dibayar" id="" style="width:100%">
            <option value="" selected>-- Pilih --</option>
            <option value="belum_dibayar" >belum dibayar</option>
            <option value="dibayar">dibayar</option>
        </select>
    </div>
    <input type="text" hidden id="hargabarang" value="{{ $total }}" onkeyup="sum();" />
    <div class="d-flex justify-content-end">
        <table>
            <thead>
                <tr class="text-right">
                    <th><b>Total Pembayaran</b></th>
                    <th colspan="2"><input type="text" id="total"></th>
                </tr>

            </thead>
        </table>
    </div>
    {{-- <div class="d-grid gap d-md-flex justify-content-md-end">
        <label for=""><b>Total</b></label>
        <input type="text"  value="{{ $print }}">
    </div> --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
        <button type="submit" class="btn btn-outline-primary" type="button">PESAN</button>
    </div>
</form>
<script>
    function sum() {
        var biayatambahan = document.getElementById('biayatambahan').value;
        var pajak = document.getElementById('pajak').value;
        var hargabarang = document.getElementById('hargabarang').value;
        var diskon = document.getElementById('diskon').value;
        var qty = document.getElementById('qty').value;
        var result = parseFloat(hargabarang) * parseFloat(qty) + parseFloat(biayatambahan) + parseFloat(
            pajak) - parseFloat(diskon);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>
