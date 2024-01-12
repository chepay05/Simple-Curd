@extends('layout')
<title>Tambah Karyawan</title>
@section('content')
    <div class="container mt-5">
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <h5 class="card-title text-center">Tambah Data Karyawan</h5>
                <hr class="my-4">
                <form action="/karyawan/store" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="NIP" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="NIP" name="NIP"
                                value="{{ sprintf($karyawan->NIP) }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama" name="Nama" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Jabatan" name="Jabatan" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Gaji" class="col-sm-3 col-form-label">Gaji</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Gaji" name="Gaji" required>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block mt-4">
                        <i class="bi bi-person-plus"></i> Tambah Karyawan
                    </button>
                    <a href="/karyawan" class="btn btn-secondary btn-block mt-4">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
