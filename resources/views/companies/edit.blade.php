@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>@lang('edit_company')</h1>
        <form method="POST" action="{{ route('companies.update', ['company' => $company->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id">@lang('id')</label>
                <input type="text" class="form-control" name="id" id="id" value="{{ $company->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="tin">@lang('vat')</label>
                <input type="text" class="form-control @error('tin') is-invalid @enderror" name="tin" id="tin"
                    value="{{ old('tin',$company->tin) }}">
                @error('tin')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">@lang('company_name')</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    value="{{ old('name',$company->name) }}">
                @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">@lang('address')</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                    value="{{ old('address',$company->address) }}">
                @error('address')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="city">@lang('city')</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city"
                    value="{{ old('city',$company->city) }}">
                @error('city')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">@lang('phone_number')</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number"
                    value="{{ old('phone_number',$company->phone_number) }}">
                @error('phone_number')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="bank_account">@lang('bank_account')</label>
                <input type="text" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" id="bank_account"
                    value="{{ old('bank_account',$company->bank_account) }}">
                @error('bank_account')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">@lang('email')</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                    value="{{ old('email',$company->email) }}">
                @error('email')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary float-right">@lang('update')</button>
        </form>
    </div>
@endsection
