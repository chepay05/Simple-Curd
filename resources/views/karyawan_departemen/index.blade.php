@extends('layout')

@section('content')
    <div class="container">
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
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">NIP</th>
                        <th scope="col">ID Departemen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawanDepartemen as $kd)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kd->Kode }}</td>
                            <td>{{ $kd->NIP }}</td>
                            <td>{{ $kd->Id_Departemen }}</td>
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

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="mr-auto">
                    <!-- Tautan lainnya yang ingin diposisikan di sebelah kiri -->
                </div>
                <a href="/logout" class="btn btn-secondary">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </main>

        <footer class="mt-4">
            <p class="text-center">Copyright &copy; 2024</p>
        </footer>
    </div>
@endsection
