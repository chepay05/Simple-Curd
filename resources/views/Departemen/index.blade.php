@extends('layout')

<title>Departemen</title>

@section('content')

<div class="container">
    <header class="mb-4">
        <h1 class="text-center">Daftar Departemen</h1>
    </header>

    <main>
        <a href="/create" type="button" class="btn btn-primary mb-4">Tambah Data Departemen</a>

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id Departemen</th>
                    <th scope="col">Nama Departemen</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departemen as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->Id_Departemen }}</td>
                    <td>{{ $d->Nama_departemen }}</td>
                    <td>
                        <a href="/edit/{{ $d->Id_Departemen }}" class="btn btn-success">Edit</a>
                        <a href="/delete/{{ $d->Id_Departemen }}" class="btn btn-danger" onclick="return confirmDelete('{{ $d->Id_Departemen }}')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <td>
            <a href="/" class="btn btn-warning">karyawan</a>
        </td>
        <td>
            <a href="/karyawan/departemen" class="btn btn-warning">Data Karyawan dan Departemen</a>
        </td>
    </main>

    <footer class="mt-4">
        <p class="text-center">Copyright &copy; 2024</p>
    </footer>
</div>

@endsection
