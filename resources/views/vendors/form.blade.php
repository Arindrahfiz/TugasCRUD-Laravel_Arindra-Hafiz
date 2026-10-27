<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $vendor->exists ? 'Edit' : 'Tambah' }} Vendor</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="header">
        <h1>{{ $vendor->exists ? 'Edit Data Vendor' : 'Tambah Data Vendor' }}</h1>
        <p>Isi formulir dibawah untuk mengisi data</p>
    </div>

    <div class="isi">
        <form method="POST" class="form"
              action="{{ $vendor->exists ? route('vendors.update', $vendor->id) : route('vendors.store') }}">
            @csrf
            @if ($vendor->exists)
                @method('PUT')
            @endif

            @if ($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <h3>1. Profil Perusahaan</h3>
            <div class="baris">
                <div class="kolom">
                    <label>Kode Vendor</label>
                    <input type="text" value="Otomatis oleh sistem" disabled>
                </div>
                <div class="kolom">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan', $vendor->nama_perusahaan) }}" required>
                </div>
            </div>

            <div class="baris">
                <div class="kolom">
                    <label>Jenis Usaha</label>
                    <select name="kategori">
                        @foreach ($daftar_kategori as $kat)
                            <option value="{{ $kat }}" @selected(old('kategori', $vendor->kategori) == $kat)>{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="kolom">
                    <label>Status Kemitraan</label>
                    <label>
                        <input type="checkbox" name="status" @checked($vendor->status == 1)>
                        Aktif (dapat menerima PO)
                    </label>
                </div>
            </div>

            <div class="baris">
                <div class="kolom">
                    <label>Email Perusahaan</label>
                    <input type="text" name="email" value="{{ old('email', $vendor->email) }}" required>
                </div>
                <div class="kolom">
                    <label>Telepon Kantor</label>
                    <input type="text" name="telepon" value="{{ old('telepon', $vendor->telepon) }}" required>
                </div>
            </div>

            <h3>2. Alamat Kantor</h3>
            <div class="kolom">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" rows="3" required>{{ old('alamat', $vendor->alamat) }}</textarea>
            </div>
            <div class="kolom">
                <label>Kota</label>
                <input type="text" name="kota" value="{{ old('kota', $vendor->kota) }}" required>
            </div>

            <h3>3. Legalitas Perusahaan</h3>
            <div class="baris">
                <div class="kolom">
                    <label>NPWP</label>
                    <input type="text" name="npwp" value="{{ old('npwp', $vendor->npwp) }}">
                </div>
                <div class="kolom">
                    <label>NIB</label>
                    <input type="text" name="nib" value="{{ old('nib', $vendor->nib) }}">
                </div>
            </div>

            <h3>4. Kontak PIC</h3>
            <div class="baris">
                <div class="kolom">
                    <label>Nama PIC</label>
                    <input type="text" name="nama_pic" value="{{ old('nama_pic', $vendor->nama_pic) }}" required>
                </div>
                <div class="kolom">
                    <label>Telepon PIC</label>
                    <input type="text" name="telepon_pic" value="{{ old('telepon_pic', $vendor->telepon_pic) }}" required>
                </div>
            </div>

            <div class="tombol-area">
                <button type="submit" class="tombol tombol-utama">Simpan Rekaman Vendor</button>
                <a href="{{ route('vendors.index') }}" class="tombol tombol-abu">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>