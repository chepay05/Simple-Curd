@extends('layout')

<title>Karyawan</title>

@section('content')
    <div class="container">
        <header class="mb-4">
            <h1 class="text-center">Daftar Karyawan Dan Departemen</h1>
        </header>

        <main>
            <a href="/karyawan/departemen/create" type="button" class="btn btn-primary mb-4">Tambah Data Karyawan dan
                Departemen</a>
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
                                <a href="/karyawan/departemen/edit/{{ $kd->Kode }}" class="btn btn-success">Edit</a>
                                <a href="/karyawan/departemen/delete/{{ $kd->Kode }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <td>
                <a href="/departemen" class="btn btn-warning">Departemen</a>
            </td>
        </main>

        <footer class="mt-4">
            <p class="text-center">Copyright &copy; 2024</p>
        </footer>
    </div>
@endsection
