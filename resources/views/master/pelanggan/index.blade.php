@extends('dashboard.layout.main')

@section('container')
    <div class="mt-4">

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/master/pelanggan/create" class="btn btn-md btn-success mb-3 float-right">Tambah Pelanggan</a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td>{{ $d->telp }}</td>
                            <td class="text-left">
                                <a href="/master/supplier/{{ $d->id }}/edit" class="btn btn-sm btn-primary">EDIT</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="/master/supplier/{{ $d->id }}" method="POST" class="d-inline">
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
