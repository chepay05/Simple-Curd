@extends('layout')

@section('title', 'Karyawan')

@section('content')
    <div class="container">
        <header class="mb-4">
            <h1 class="text-center">Daftar Karyawan</h1>
        </header>

        <main>
            <a href="/karyawan/create" type="button" class="btn btn-primary mb-4">Tambah Data Karyawan</a>
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
                                <a href="/karyawan/edit/{{ $k->NIP }}" class="btn btn-warning">Edit</a>
                                <a href="/karyawan/delete/{{ $k->NIP }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <a href="/departemen" class="btn btn-info">Departemen</a>
                <a href="/logout" class="btn btn-secondary">Logout</a>
            </div>
        </main>

        <footer class="mt-4">
            <p class="text-center">Copyright &copy; 2024</p>
        </footer>
    </div>
@endsection
