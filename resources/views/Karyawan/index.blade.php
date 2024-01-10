@extends('layout')

@section('title', 'Karyawan')

@section('content')
    <div class="container">
        <header class="mb-4">
            <h1 class="text-center">Daftar Karyawan</h1>
        </header>

        <main>
            <a href="/karyawan/create" type="button" class="btn btn-primary mb-4">
                <i class="bi bi-person-plus"></i> Tambah Data Karyawan</a>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Gaji</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->NIP }}</td>
                            <td>{{ $k->Nama }}</td>
                            <td>{{ $k->Jabatan }}</td>
                            <td>{{ $k->Gaji }}</td>
                            <td>
                                <a href="/karyawan/edit/{{ $k->NIP }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="/karyawan/delete/{{ $k->NIP }}" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <a href="/departemen" class="btn btn-info">
                    <i class="bi bi-building"></i> Departemen
                </a>
                <a href="/departemen/kaeyawan" class="btn btn-info">
                </a>
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
