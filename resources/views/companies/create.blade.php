@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1 class="text-center">@lang('create_company')</h1>
        <form method="POST" action="{{ route('companies.store') }}">
            @csrf
            <div class="form-group">
                <label for="tin">@lang('vat')</label>
                <input type="text" class="form-control  @error('vat') is-invalid @enderror" id="tin"
                    name="tin" value="{{ old('tin') }}">
                @error('tin')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">@lang('company_name')</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">@lang('address')</label>
                <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address"
                    name="address" value="{{ old('address') }}">
                @error('address')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="city">@lang('city')</label>
                <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city"
                    name="city" value="{{ old('city') }}">
                @error('city')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">@lang('phone_number')</label>
                <input type="text" class="form-control  @error('phone_number') is-invalid @enderror" id="phone_number"
                    name="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="bank_account">@lang('bank_account')</label>
                <input type="text" class="form-control  @error('bank_account') is-invalid @enderror" id="bank_account"
                    name="bank_account" value="{{ old('bank_account') }}">
                @error('bank_account')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">@lang('email')</label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">@lang('create_company')</button>

        </form>
    </div>
@endsection
