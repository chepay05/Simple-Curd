@extends('layout')
<title>Halaman Departemen</title>
@section('content')
    <div class="container">
        <header class="mb-4">
            <h1 class="text-center">Daftar Departemen</h1>
        </header>
        <main>
            <a href="/create" type="button" class="btn btn-primary mb-4">
                <i class="bi bi-plus"></i> Tambah Data Departemen
            </a>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        {{-- <th scope="col">id Departemen</th> --}}
                        <th scope="col">Nama Departemen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departemen as $d)
                        <tr>
                            {{-- <td>{{ $d->Id_Departemen }}</td> --}}
                            <td>{{ $d->Nama_departemen }}</td>
                            <td>
                                <a href="/edit/{{ $d->Id_Departemen }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="/delete/{{ $d->Id_Departemen }}" class="btn btn-danger"
                                    onclick="return confirmDelete('{{ $d->Id_Departemen }}')">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <td>
                <a href="/karyawan" class="btn btn-info">
                    <i class="bi bi-person"></i> Karyawan
                </a>
            </td>
        </main>

        <footer class="mt-4">
            <p class="text-center">Copyright &copy; 2024</p>
        </footer>
    </div>
@endsection
