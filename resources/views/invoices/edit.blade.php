@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>@lang('edit_invoice')</h1>
        <form method="POST" action="{{ route('invoices.update', ['invoice' => $invoice->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="id">@lang('id')</label>
                    <input type="text" class="form-control" name="id" id="id" value="{{ $invoice->id }}" readonly>
                </div>
                <div class="form-group col-md-2">
                    <label for="invoice_number">@lang('invoice_number')</label>
                    <input type="text" class="form-control @error('invoice_number') is-invalid @enderror" name="invoice_number" id="invoice_number" value="{{ $invoice->invoice_number }}">
                    @error('invoice_number')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    @if (session()->has('duplicate_invoice_number'))
                    <p class="text-danger">
                        {{ session()->get('duplicate_invoice_number') }}
                    </p>
                    @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="client">@lang('created_to')</label>
                    <select class="custom-select" name="client">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}"
                                    @if ((string) $client->id == $currentClientId) selected="selected" @endif>
                                {{ $client->name . ' ' . $client->surname }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="payment_term">@lang('payment_term')</label>
                    <input type="date" class="form-control @error('payment_term') is-invalid @enderror" name="payment_term" value={{ $currentDateOfPayment }}>
                    @error('payment_term')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="status">@lang('status')</label>
                    <select class="custom-select" name="status">
                        <option value="not paid" @if ($currentStatus == 'not paid') selected="selected" @endif>@lang('not_paid')
                        </option>
                        <option value="paid" @if ($currentStatus == 'paid') selected="selected" @endif>@lang('paid')</option>
                        <option value="in progress" @if ($currentStatus == 'in progress') selected="selected" @endif>@lang('in_progress')
                        </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-right">@lang('update')</button>
        </form>
    </div>
@endsection
