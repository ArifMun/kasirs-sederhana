@extends('layout.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Keranjang Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/barang">Home</a></li>
                        <li class="breadcrumb-item active">Keranjang Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success " role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form method="POST" enctype="multipart/form-data" action="/keranjang/proses-transaksi">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Nama
                                            Barang</b></label>
                                    <div class="col-sm-8 mb-2">
                                        <select class="form-control form-control-sm" name="id_barang" id="id_barang"
                                            onchange="barang()" required>
                                            <option>-- Pilih Barang --</option>
                                            @foreach ($barang as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_barang }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Harga
                                            Barang</b></label>
                                    <div class="col-sm-8 mb-2">
                                        <input type="text" class="form-control form-control-sm" name="harga_barang"
                                            id="harga_barang" readonly>
                                        <input type="hidden" name="nama_barang" id="nama_barang">
                                        <input type="hidden" name="qty" id="qty">
                                        <input type="hidden" name="out" id="out" readonly>
                                    </div>
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Jumlah
                                        </b></label>
                                    <div class="col-sm-8 mb-2">
                                        <input type="text" class="form-control form-control-sm" name="quantity"
                                            onchange="totalharga()" id="quantity">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Sub-Total</label>
                                        <input type="text" class="form-control" name="subtotal">
                                    </div> --}}
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Total</b></label>
                                    <div class="col-sm-8 mb-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" id="subtotal"
                                                name="subtotal" onchange="total()" name="sub_total" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-purple btn-sm" name="save" value="simpan"
                                                    type="submit" onclick="tambah()">
                                                    <i class="fa fa-plus mr-2"></i>Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="POST" enctype="multipart/form-data" action="keranjang/proses-pembayaran/">
                            @csrf
                            <div class="card-footer ">

                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Bayar
                                        </b></label>
                                    <div class="col-sm-8 mb-2">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <input type="text" class="form-control form-control-sm" name="bayar" id="bayar"
                                            onchange="pembayaran()">
                                    </div>
                                    <label class="col-sm-4 col-form-label col-form-label-sm"><b>Kembalian
                                        </b></label>
                                    <div class="col-sm-8 mb-2">
                                        <input type="text" class="form-control form-control-sm" name="kembalian"
                                            readonly id="kembalian">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Bayar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-6">
                    <form method="POST" enctype="multipart/form-data" action="/pembayaran/proses-transaksi">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center"><b>TOKO KASIR </b> <input type="hidden" name="id_user"
                                        value="{{ Auth::user()->id }}"> </div>
                            </div>
                            <div class="card-header">
                                <table style="width: 100%">
                                    <tr>
                                        <th>Nota</th>
                                        <th>:</th>
                                        @foreach ($trs as $item)
                                        <td><input type="hidden" value="{{ $item->no_transaksi }}"
                                                name="no_transaksi">{{
                                            $item->no_transaksi }}</td>
                                        @endforeach
                                        <th>Kasir </th>
                                        <th>:</th>
                                        <td>{{ Auth::user()->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>:</th>
                                        {{-- @foreach ($tgl as $item) --}}
                                        <td><input type="hidden" value="{{ $tgl }}" name="dibuat">{{ $tgl }}</td>
                                        {{-- @endforeach --}}
                                    </tr>
                                </table>
                            </div>
                            <div class="card-body">
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Sub Total</th>
                                            {{-- <th></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjang as $keranjang)
                                        <tr>
                                            <td><input type="hidden" name="id_keranjang" value="{{ $keranjang->id }}">
                                                <input type="hidden" name="nama_barang"
                                                    value="{{ $keranjang->nama_barang }}">{{ $keranjang->nama_barang }}
                                            </td>
                                            <td><input type="hidden" name="quantity"
                                                    value="{{ $keranjang->quantity }}">{{
                                                $keranjang->quantity }}</td>
                                            {{-- value untuk id_barang --}}
                                            <td><input type="hidden" name="id_barang"
                                                    value="{{ $keranjang->id_barang }}">
                                                <input type="hidden" name="harga_barang"
                                                    value="{{ $keranjang->harga_barang}}">{{ $keranjang->harga_barang }}
                                            </td>
                                            <td><input type="hidden" name="subtotal"
                                                    value="{{ $keranjang->subtotal }}">{{
                                                $keranjang->subtotal }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th><input type="hidden" id="hargatotal" value="{{ $qty }}">
                                                {{ $qty }}</th>
                                        </tr>
                                        <tr>
                                            <th>Bayar</th>
                                            <th></th>
                                            <th></th>
                                            @if ($bayar == null)
                                            <th></th>
                                            @elseif($bayar !=null)
                                            @foreach ($bayar as $keranjangs)
                                            <th><input type="hidden" name="bayar" value="{{ $keranjang->bayar }}">{{
                                                $keranjangs->bayar }}</th>
                                            @endforeach
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Kembalian</th>
                                            <th></th>
                                            <th></th>
                                            @if ($kembalian == null)
                                            <th></th>
                                            @else
                                            @foreach ($kembalian as $keranjangs)
                                            <th><input type="hidden" name="kembalian"
                                                    value="{{ $keranjang->kembalian }}">{{ $keranjangs->kembalian }}
                                            </th>
                                            @endforeach
                                            @endif
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Selesai</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

<script>
    function barang() {
        let barang = $("#id_barang").val();
        $("#harga_barang").children().remove();
        if (barang != '' && barang != null) {
            $.ajax({
                url: "{{ url('') }}/barang/harga_barang/" + barang,
                success: function (res) {
                    $("#harga_barang").val(res.harga_barang);
                    $("#nama_barang").val(res.nama_barang);
                    $("#qty").val(res.qty);
                }
            });
        }
    }

    function stokOut(){
        var harga = parseInt(document.getElementById('qty').value);
        var jumlah_beli = parseInt(document.getElementById('quantity').value);
        var jumlah_harga = harga - jumlah_beli;
        document.getElementById('out').value = jumlah_harga;
    }

    function totalharga() {
        var harga = parseInt(document.getElementById('harga_barang').value);
        var jumlah_beli = parseInt(document.getElementById('quantity').value);
        var jumlah_harga = harga * jumlah_beli;
        document.getElementById('subtotal').value = jumlah_harga;

        var harga = parseInt(document.getElementById('qty').value);
        var jumlah_beli = parseInt(document.getElementById('quantity').value);
        var jumlah_harga = harga - jumlah_beli;
        document.getElementById('out').value = jumlah_harga;
    }

    function pembayaran() {
        var pembayaran = parseInt(document.getElementById('bayar').value);
        var totalHarga = parseInt(document.getElementById('hargatotal').value);
        var kembali = pembayaran - totalHarga;
        document.getElementById('kembalian').value = kembali;
    }

    function tambah(){
        var harga = parseInt(document.getElementById('qty').value);
        var jumlah_beli = parseInt(document.getElementById('quantity').value);
        if(harga<jumlah_beli){
            alert('Stok Kurang');
        }
    }
</script>
@endsection