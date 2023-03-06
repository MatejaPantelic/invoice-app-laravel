@extends('layouts.auth')
@section('content')
    <section class="vh-100" style="background-color: #eee;">
{{--        poruka--}}
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="justify-content-center align-content-center">
                        <div class="alert alert-success d-flex justify-content-center align-content-center">
                            <h3>@lang('register_message')</h3>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p> @lang('goto_login') <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
