<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pembayaran</title>
  <link
      rel="shortcut icon"
      href="{{asset('img/favicon.png')}}"
      type="image/x-icon"
    />
  <script src="https://unpkg.com/scrollreveal"></script>

  @vite(['resources/css/styles.css', 'resources/js/main.js'])
</head>

<body>

    <h1 class="payment__title">Form Pembayaran</h1>
 
    <div class="payment__logo">
    <img src="{{ asset('img/sitarinas logo.png') }}" alt="Sitarina's Logo">
    </div>

        <form id="orderForm" class="payment__form">
            <label for="produk">Produk</label>
            <input type="text" id="produk" placeholder="Nama Produk" value="{{ $product->name }}" readonly>

            <label for="harga">Harga</label>
            <input type="text" id="harga" value="Rp. {{ number_format($product->price) }}" readonly>
                    
            <label for="nama">Nama Pembeli</label>
            <input type="text" id="nama" placeholder="Nama Lengkap Anda" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                       
            <label for="nomor">Nomor WhatsApp</label>
            <input type="text" id="nomor" placeholder="Contoh: 08123456789" value="{{ Auth::check() ? Auth::user()->phone : '' }}" required>

            <label for="alamat">Alamat Pengiriman</label>
            <textarea id="alamat" rows="3" placeholder="Alamat lengkap pengiriman" required>{{ Auth::check() ? Auth::user()->address : '' }}</textarea>

            <button type="submit" class="btn btn-success w-100"> Kirim Pesanan ke WhatsApp </button>
            <a href="{{ url('/') }}" class="button-kembali">Kembali ke Halaman Utama</a>
        </form>
</body>
</html>