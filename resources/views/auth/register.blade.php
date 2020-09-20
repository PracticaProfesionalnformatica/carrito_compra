@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/fondo.jpeg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8 col-sm-12 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form-horizontal"method="POST" action="{{ route('register') }}"> {{ csrf_field() }}
                        <div class="header header-primary text-center">
                            <h4>REGISTRO</h4>
                           
                            <!-- <div class="social-line">
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> -->
                        </div>
                        <p class="text-divider">Completar Datos</p>
                        <div class="content">
                            <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">face</i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>

                                    </div>

                    

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" type="email" placeholder="Correo Electrónico" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input  placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required> 
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input  placeholder="Confirmar Contraseña" id="password" type="password" class="form-control" name="password_confirmation" required> 
                            </div>


                            <!-- If you want to add a checkbox to this form, uncomment this code-->
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Confirmar Registro</a>
                            <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
