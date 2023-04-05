@extends('/admin/layout/index')
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Status Pesananan!</h1>
                            </div>
                            <form class="user" method="post" action="">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm">
                                        <select name="status" class="form-control  form-select "
                                            aria-label=".form-select-sm example">
                                            <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                                            <option value="proses">proses
                                            </option>
                                            <option value="proses">proses
                                            </option>
                                            <option value="selesai">selesai
                                            </option>
                                            <option value="diambil">diambil
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <select name="dibayar" class="form-control  form-select "
                                            aria-label=".form-select-sm example">
                                            <option value="{{ $data->dibayar }}" selected>{{ $data->dibayar }}</option>
                                            <option value="dibayar">dibayar
                                            </option>
                                            <option value="belum_dibayar">belum dibayar
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Bayar</label>
                                    <input type="date" class="form-control"  placeholder="Tanggal Bayar">
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    <b>Simpan</b>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
