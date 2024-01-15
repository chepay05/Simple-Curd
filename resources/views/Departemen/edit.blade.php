@extends('layout')
<title>Edit Departemen</title>
@section('content')
    <div class="container mt-5">
        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <h5 class="card-title text-center">Edit Data Karyawan</h5>
                <hr class="my-4">
                <form action="{{ url('/update', ['id' => $departemen->Id_Departemen]) }}" method="POST">
                    @csrf
                    {{-- <div class="mb-3 row">
                        <label for="Id_Departemen" class="col-sm-3 col-form-label">ID Departemen</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Id_Departemen" name="Id_Departemen"
                                value="{{ $departemen->Id_Departemen }}" readonly>
                        </div>
                    </div> --}}
                    <div class="mb-3 row">
                        <label for="Nama_departemen" class="col-sm-3 col-form-label">Nama Departemen</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama_departemen" name="Nama_departemen"
                                value="{{ $departemen->Nama_departemen }}" required>
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
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                    <a href="/departemen" class="btn btn-secondary btn-block mt-4">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
