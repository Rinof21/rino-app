@extends('layouts.login')

@section('title', 'Selamat datang di Template SB Admin')

@section('content')
<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    @if($errors->any())
                                    {!! implode('', $errors-all('<div style="color:red">:message</div>')) !!}
                                    @endif
                                    @if(Session::get('error') && Session::get('error') != null)
                                    <div style="color:red">{{ Session::get('error') }}</div>
                                    @php
                                    Session::put('error', null)
                                    @endphp
                                    @endif
                                    @if(Session::get('success') && Session::get('success') != null)
                                    <div style="color:green">{{ Session::get('success') }}</div>
                                    @php
                                    Session::put('Success', null)
                                    @endphp
                                    @endif
                                        <form method="post" action="{{ route('masuk') }}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button class="btn btn-primary" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('daftar') }}">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection