@extends('layout')
<title>Halaman Karyawan Departemen</title>
@section('content')
    <div class="container">
        @if (session('helo'))
            <div class="alert alert-success">
                {{ session('helo') }}
            </div>
        @endif
        <header class="mb-4">
            <h1 class="text-center">Daftar Karyawan dan Departemen</h1>
        </header>

        <main>
            <a href="/karyawan/departemen/create" class="btn btn-primary mb-4">
                <i class="bi bi-person-plus"></i> Tambah Data Karyawan dan Departemen
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Nama Departemen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawanDepartemen as $kd)
                        <tr>
                            <td>{{ $kd->Kode }}</td>
                            <td>{{ $kd->karyawan->Nama }}</td>
                            <td>{{ $kd->departemen->Nama_departemen }}</td>
                            <td>
                                <a href="/karyawan/departemen/edit/{{ $kd->Kode }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="/karyawan/departemen/delete/{{ $kd->Kode }}" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex mb-3">
                @if (Auth::user()->role == 'admin')
                    <div class="p-2"> <a href="/karyawan" class="btn btn-info">
                            <i class="bi bi-building"></i> Departemen</a>
                    </div>
                @endif
                @if (Auth::user()->role == 'staff')
                    <div class="ms-auto p-2"> <a href="/logout" class="btn btn-secondary">
                            <i class="bi bi-box-arrow-right"></i> Logout</a>
                    </div>
                @endif
            </div>
        </main>
        <footer class="mt-4">
            <p class="text-center">Copyright &copy; 2024</p>
        </footer>
    </div>
@endsection
