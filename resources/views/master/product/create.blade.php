@extends('dashboard.layout.main')

@section('container')
    <div class="container mt-5 mb-5">
        <h2>Tambah Produk</h2>
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card border-1 rounded">
                    <div class="card-body">

                        <form action="/master/product" method="POST" entype="multipart" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama') }}" required>

                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                    value="{{ old('harga') }}" required>
                                <!-- error message untuk harga -->
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" @error('gambar') is-invalid @enderror id="gambar"
                                    name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <input id="x" type="hidden" name="content">
                                <trix-editor input="x"></trix-editor>
                                <!-- error message untuk deskripsi -->
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                <a href="/master/product" class="btn btn-md btn-secondary">Kembali</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
@endsection
