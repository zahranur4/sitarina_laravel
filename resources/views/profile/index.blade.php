<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Profil Pengguna - {{ $user->name }}</title>
  <link
      rel="shortcut icon"
      href="{{asset('img/favicon.png')}}"
      type="image/x-icon"
    />
  @vite(['resources/css/profile.css'])
</head>
<body>

<div class="container">
  <div class="card">
    <a href="{{ url('/') }}" class="btn-back">&larr; Kembali ke Utama</a>

    {{-- Menampilkan pesan sukses jika ada --}}
    @if (session('success'))
      <div class="alert-success">
        {{ session('success') }}
      </div>
    @endif

    <div class="profile-header">
      <div class="user-info">
        <h2>{{ $user->name }}</h2>
      </div>
    </div>

    {{-- Form mengarah ke route 'profile.update' --}}
    <form class="form-section" method="POST" action="{{ route('profile.update') }}">
      @csrf
      
      <div class="form-group">
        <label for="name">Nama Lengkap</label>
        {{-- Ganti 'value' dengan data dari database --}}
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" />
        @error('name') <span class="error-text">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" />
        @error('email') <span class="error-text">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="phone">Nomor HP</label>
        <input type="phone" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" />
        @error('phone') <span class="error-text">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="address">Alamat</label>
        <textarea id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
        @error('address') <span class="error-text">{{ $message }}</span> @enderror
      </div>

      <div class="button-row">
        <button type="button" class="btn-outline">Reset Password</button>
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
      </div>
    </form>

    <div class="delete-section">
    <p><strong>Ingin keluar dari platform?</strong></p>
    
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        Hapus Akun Saya
    </button>
</div>

<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountModalLabel">Konfirmasi Hapus Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus akun Anda secara permanen? Tindakan ini tidak dapat diurungkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>