@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success d-print-none" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">@lang('profile')</div>

        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">@lang('name')</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') ?? $user->name}}" autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="surname"
                           class="col-md-4 col-form-label text-md-end">@lang('surname')</label>

                    <div class="col-md-6">
                        <input id="surname" type="text"
                               class="form-control @error('surname') is-invalid @enderror" name="surname"
                               value="{{ old('surname') ?? $user->surname}}" autocomplete="surname" autofocus>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone_number"
                           class="col-md-4 col-form-label text-md-end">@lang('phone_number')</label>

                    <div class="col-md-6">
                        <input id="phone_number" type="text"
                               class="form-control @error('phone_number') is-invalid @enderror"
                               name="phone_number" value="{{ old('phone_number') ?? $user->phone_number}}"
                               autocomplete="phone_number" autofocus>

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email"
                           class="col-md-4 col-form-label text-md-end">@lang('email')</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email')?? $user->email }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password"
                           class="col-md-4 col-form-label text-md-end">@lang('password')</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               autocomplete="new-password" value="{$user->password}}" readonly>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary justify-content-center"
                                onclick="return confirm('Are you sure you want edit profile?')">
                            @lang('edit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
