<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Vendor</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="header">
        <h1>Vendor dan Supplier</h1>
        <p>Kelola data vendor, status legalitas, serta kontak PIC pemasok gudang.</p>
    </div>

    <div class="isi">
        @if ($vendors->isEmpty())
            <div class="kosong">
                <h2>Belum ada data vendor</h2>
                <p>Mulai daftarkan vendor pertama Anda untuk mengelola pengadaan gudang.</p>
                <a href="{{ route('vendors.create') }}" class="tombol tombol-utama">Tambah Data Vendor</a>
            </div>
        @else
            <a href="{{ route('vendors.create') }}" class="tombol tombol-utama">+ Tambah Data Vendor</a>

            <table>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Perusahaan & Kategori</th>
                    <th>Kota</th>
                    <th>PIC</th>
                    <th>Telepon PIC</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($vendors as $v)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>VND-{{ str_pad($v->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>
                        <b>{{ $v->nama_perusahaan }}</b><br>
                        {{ $v->kategori }}
                    </td>
                    <td>{{ $v->kota }}</td>
                    <td>{{ $v->nama_pic }}</td>
                    <td>{{ $v->telepon_pic }}</td>
                    <td>
                        @if ($v->status == 1)
                            <span class="aktif">Aktif</span>
                        @else
                            <span class="nonaktif">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('vendors.edit', $v->id) }}" class="tombol tombol-abu tombol-kecil">Edit</a>
                        <form action="{{ route('vendors.destroy', $v->id) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus vendor ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol tombol-merah tombol-kecil">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        @endif
    </div>
</body>
</html>