@extends('layout')

@section('content')

    <div class="container mt-5">
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Data Karyawan</h5>
                <hr class="my-4">
                <form action="{{ url('/karyawan/update', ['id' => $karyawan->NIP]) }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="NIP" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="NIP" name="NIP"
                                value="{{ $karyawan->NIP }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama" name="Nama"
                                value="{{ $karyawan->Nama }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Jabatan" name="Jabatan"
                                value="{{ $karyawan->Jabatan }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Gaji" class="col-sm-3 col-form-label">Gaji</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Gaji" name="Gaji"
                                value="{{ $karyawan->Gaji }}" required>
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
                    <button type="submit" class="btn btn-primary btn-block mt-4">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
