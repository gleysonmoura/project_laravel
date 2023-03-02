@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav-home', ['title' => 'Perfil'])
@include('layouts.navbars.auth.sidenav-home')
<div class="container-fluid my-5 py-2">
    <div class="d-flex justify-content-center mb-5">
        <div class="col-lg-12 mt-lg-0 mt-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Dados</h5>
                </div>
                <div class="card-body pt-0">
                    <form method="POST" method="POST" action={{ route('profile.update') }}
                        enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Nome</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="username"
                                        value="{{ old('username', auth()->user()->firstname) }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Sobrenome</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="firstname"
                                        value="{{ old('firstname', auth()->user()->firstname) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Eu sou</label>
                                <div class="input-group">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Masculino</option>
                                        <option>Feminino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Data Nascimento</label>
                                <div class="input-group">
                                    <input class="form-control" type="date" id="example-date-input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">Email</label>
                                <div class="input-group">
                                    <input id="email" name="email" class="form-control" type="email" disabled=""
                                        value="{{ old('email', auth()->user()->email) }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Confirmation Email</label>
                                <div class="input-group">
                                    <input id="confirmation" name="confirmation" class="form-control" type="email"
                                        disabled="" value="{{ old('email', auth()->user()->email) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label mt-4">Sua Localização</label>
                                <div class="input-group">
                                    <input id="location" name="location" class="form-control" type="text" value=""
                                        placeholder="Palmas, To">
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label mt-4">Contato</label>
                                <div class="input-group">
                                    <input id="phone" name="phone" class="form-control" type="number" value="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-0">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection