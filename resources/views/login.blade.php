@extends('layout')
<title>Halaman Login</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light rounded-lg p-4 custom-dark-shadow">
                <div class="card-header text-center bg-light text-primary">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Nama Pengguna:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Masukkan email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan kata sandi">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-pill btn-block">
                            Masuk
                        </button>
                        @if (session('helo'))
                            <div class="alert alert-success mt-3">
                                {{ session('helo') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
