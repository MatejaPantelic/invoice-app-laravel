@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success d-print-none" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="text-center">{{ $client->name }} {{ $client->surname }}</h5>
            <form action="{{route('client.update', [$client->id])}}" method="post">
                @csrf
                @if($errors)
                @endif
                <div class="form-group">
                    <label for="tin_jmbg">Tin/jmbg </label>
                    <textarea
                        name="tin_jmbg"
                        type="text"
                        id="tin_jmbg"
                        class="form-control"
                        placeholder="{{old('tin_jmbg') ?: $client->tin_jmbg}}"
                        required
                    >{{old('tin_jmbg') ?: $client->tin_jmbg}}</textarea>
                    @if($errors->has('tin_jmbg'))
                        <div class="error text-danger" class="error">{{ $errors->first('tin_jmbg') }}</div>

                    @endif
                    <label for="activity_code">Activity Code</label>
                    <textarea
                        name="activity_code"
                        type="text"
                        id="activity_code"
                        class="form-control"
                        placeholder="{{old('activity_code') ?: $client->activity_code}}"
                    >{{old('activity_code') ?: $client->activity_code}}</textarea>
                    @if($errors->has('activity_code'))
                        <div class="error text-danger">{{ $errors->first('activity_code') }}</div>
                    @endif
                    <label for="company_name">Company name </label>
                    <textarea
                        name="company_name"
                        type="text"
                        id="company_name"
                        class="form-control"
                        placeholder="{{old('company_name') ?: $client->company_name}}"
                    >{{old('company_name') ?: $client->company_name}}</textarea>
                    @if($errors->has('company_name'))
                        <div class="error text-danger">{{ $errors->first('company_name') }}</div>
                    @endif
                    <label for="bank_account">Bank Account </label>
                    <textarea
                        name="bank_account"
                        type="text"
                        id="bank_account"
                        class="form-control"
                        placeholder="{{old('bank_account') ?: $client->bank_account}}"
                        required
                    >{{old('bank_account') ?: $client->bank_account}}</textarea>
                    @if($errors->has('bank_account'))
                        <div class="error text-danger">{{ $errors->first('bank_account') }}</div>
                    @endif
                    <label for="phone_number">Phone Number </label>
                    <textarea
                        name="phone_number"
                        type="text"
                        id="phone_number"
                        class="form-control"
                        placeholder="{{old('phone_number') ?: $client->phone_number}}"
                        required
                    >{{old('phone_number') ?: $client->phone_number}}</textarea>
                    @if($errors->has('phone_number'))
                        <div class="error text-danger">{{ $errors->first('phone_number') }}</div>
                    @endif
                    <label for="name">Name </label>
                    <textarea
                        name="name"
                        type="text"
                        id="name"
                        class="form-control"
                        placeholder="{{old('name') ?: $client->name}}"
                        required
                    >{{old('name') ?: $client->name}}</textarea>
                    @if($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                    @endif
                    <label for="surname">Surname </label>
                    <textarea
                        name="surname"
                        type="text"
                        id="surname"
                        class="form-control"
                        placeholder="{{old('surname') ?: $client->surname}}"
                        required
                    >{{old('surname') ?: $client->surname}}</textarea>
                    @if($errors->has('surname'))
                        <div class="error text-danger">{{ $errors->first('surname') }}</div>
                    @endif
                    <label for="address">Address </label>
                    <textarea
                        name="address"
                        type="text"
                        id="address"
                        class="form-control"
                        placeholder="{{old('address') ?: $client->address}}"
                        required
                    >{{old('address') ?: $client->address}}</textarea>
                    @if($errors->has('address'))
                        <div class="error text-danger">{{ $errors->first('address') }}</div>
                    @endif
                    <label for="city">City </label>
                    <textarea
                        name="city"
                        type="text"
                        id="city"
                        class="form-control"
                        placeholder="{{old('city') ?: $client->city}}"
                        required
                    >{{old('city') ?: $client->city}}</textarea>
                    @if($errors->has('city'))
                        <div class="error text-danger">{{ $errors->first('city') }}</div>
                    @endif
                    <label for="email">Email </label>
                    <textarea
                        name="email"
                        type="text"
                        id="email"
                        class="form-control"
                        placeholder="{{old('email') ?: $client->email}}"
                        required
                    >{{old('email') ?: $client->email}}</textarea>
                    @if($errors->has('email'))
                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <button class="btn btn-success">
                    Confirm
                </button>
                <a href="{{ route("clients.index",["client"=>$client->id]) }}" class="btn btn-default">Back</a>
            </form>

        </div>
    </div>
@endsection
