@extends('layouts.app', ['pageSlug' => 'user'])

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Create User</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-danger">Back</a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Role</label>
                                    <select class="form-control" name="role" id="">
                                        <option value="CUSTOMER">CUSTOMER</option>
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="DIREKTUR">DIREKTUR</option>
                                        <option value="DIREKTUR">KEUANGAN</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Kirim</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
