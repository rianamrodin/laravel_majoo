@extends('dashboard.layout.main')

@section('container')
    <div class="mt-4">

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/master/product/create" class="btn btn-md btn-success mb-3 float-right">Tambah Produk</a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->id_category }}</td>
                            <td>{{ $d->harga }}</td>
                            <td>{{ $d->gambar }}</td>
                            <td>{{ $d->deskripsi }}</td>
                            <td class="text-left">
                                <a href="/master/product/{{ $d->id }}/edit" class="btn btn-sm btn-primary">EDIT</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="/master/product/{{ $d->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
