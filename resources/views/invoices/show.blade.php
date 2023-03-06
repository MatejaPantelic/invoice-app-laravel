@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success d-print-none" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row fonts">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> {{$user->company_name}}
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                @lang('from')<br>
                <strong>{{$company[0]->name}}</strong>
                <address>
{{--
                    <strong>{{$user->name .' '. $user->surname}}</strong><br>
--}}
                    {{$company[0]->address}}<br>
                    {{$company[0]->city}}<br>
                    @lang('phone'): {{$company[0]->phone_number}}<br>
                    @lang('email'): {{$company[0]->email}}
                </address>
            </div>
            <!-- /.col -->
            <!-- /.col -->
            <div class="col-sm-4 invoice-col text-center">
                <h4><small>@lang('Created at'): {{$invoice->created_at->toDateString()}}</small><br><br></h4>
                <h3>@lang('invoice') {{$invoice->invoice_number}}</h3><br>
                <b>@lang('payment_deadline'):</b> {{$invoice->payment_term}}<br>

            </div>
            <!-- /.col -->
            <div class="col-sm-4 text-right">
                @lang('client')
                <address>
                    <strong>@if($client->company_name != null)
                            {{$client->company_name}}
                        @else
                            {{$client->name .' ' . $client->surname}}
                        @endif</strong><br>
                    {{$client->address}}<br>
                    {{$client->city}}<br>
                    @lang('phone'): {{$client->phone_number}}<br>
                    @lang('email'): {{$client->email}}<br>
                    <b>@lang('account'):</b> {{$client->bank_account}}
                </address>
            </div>
        </div>
        <!-- /.row -->

        @can('create-item')
            <div class="d-flex justify-content-end py-2 mt-3 d-print-none">
                <button class="btn btn-info toggle-form" value="Add Items to Invoice">@lang('add_items')</button>
            </div>
        @endcan

        <!-- Table row -->
        @can('create-item')
            <div class="row toggle-table d-print-none">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('quantity')</th>
                            <th>@lang('product')</th>
                            <th>@lang('price')</th>
                            <th>@lang('discount')</th>
                            <th>@lang('description')</th>
                            <th>@lang('unit')</th>
                            <th></th>
                            <th></th>
                            <th>@lang('action')</th>
                        </tr>
                        </thead>
                        <tbody>

                        <form method="post" action="{{ route('items.store') }}" name="form" id="add_form">
                            @csrf
                            <tr>
                                <td class="show-item">
                                    <input type="number" name="quantity" value="{{ old('quantity') }}"
                                           class="form-control @error('quantity') is-invalid @enderror"
                                           placeholder="Quantity" autocomplete="quantity" autofocus>
                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="show-item">
                                    <input type="string" name="title" value="{{ old('title') }}"
                                           class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                           autocomplete="title" autofocus>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="show-item">
                                    <input type="number" name="price" value="{{ old('price') }}"
                                           class="form-control @error('price') is-invalid @enderror" placeholder="Price"
                                           autocomplete="price" autofocus step=".01">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td class="show-item">
                                    <div>
                                        <input type="number" name="discount"
                                               value="{{ old('discount') ? old('discount') : 0 }}"
                                               class="form-control @error('discount') is-invalid @enderror"
                                               placeholder="Discount" autocomplete="discount" autofocus step=".01">
                                        @error('discount')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                                <td class="show-item">
                                    <div>
                                        <input type="text" name="description" value="{{ old('description') }}"
                                               class="form-control @error('description') is-invalid @enderror"
                                               placeholder="Description">
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                                <td class="show-item">
                                    <select name="unit_of_measure_id"
                                            class="form-control @error('unit_of_measure_id') is-invalid @enderror">
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}"
                                                    @if($unit->id == old('unit_of_measure_id')) selected="selected" @endif>{{ $unit->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('unit_of_measure_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="hidden" name="total_price" class="form-control" value="0"
                                           placeholder="Subtotal">
                                </td>
                                <td>
                                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                </td>
                                <td>
                                    <div>
                                        <button class="btn btn-success add_btn d-grid">Add</button>
                                    </div>
                                </td>
                            </tr>
                        </form>
                        </tbody>

                    </table>
                </div>
                <!-- /.col -->
            </div>
        @endcan
        <!-- /.row -->

        <!-- Table row -->
        @if(!$invoice_item->isEmpty())
            <div class="row col-sm-12">
                <h1 class="py-2">@lang('invoice_items')</h1>
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('item_number')</th>
                            <th>@lang('quantity')</th>
                            <th>@lang('unit')</th>
                            <th>@lang('product')</th>
                            <th>@lang('price')</th>
                            <th>@lang('discount')</th>
                            <th>@lang('subtotal')</th>
                            @can(['edit-item', 'delete-item'])
                                <th class="d-print-none" colspan="2">@lang('action')</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice_item as $key => $item)
                            <tr>
                                <form name="form" method="POST" action="{{ route('items.update', ['item'=>$item]) }}">
                                    @csrf
                                    @method("PUT")
                                    <td>
                                        <strong>#{{ $key + 1 }}</strong>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="quantity"
                                               value="{{$item->quantity}}" required>
                                    </td>
                                    <td>
                                        <select name="unit_of_measure_id" class="form-control">
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}"
                                                        @if($unit->id == $item->unitOfMeasure->id) selected="selected" @endif>{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="title" value="{{$item->title}}" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="price" value="{{$item->price}}"
                                               step=".01" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="discount"
                                               value="{{$item->discount}}" step=".01" required>
                                    </td>
                                    <td class="total">{{$item->total_price}}</td>
                                    @can('edit-item')
                                        <td>
                                            <button type="submit"
                                                    class="btn btn-warning d-grid d-print-none">@lang('save')</button>
                                        </td>
                                    @endcan
                                </form>
                                @can('delete-item')
                                    <td>
                                        <form class="d-inline" method="post"
                                              action="{{ route('items.destroy', ['item'=>$item->id]) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger d-print-none"
                                                    onclick="return confirm('Are you sure you want delete this item')">@lang('delete')</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6"><strong>@lang('total'):</strong></td>
                            <td><strong>{{ $invoice_item->pluck('total_price')->sum() }}</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    @can('edit-invoices')
                        <form method="POST"
                              action="{{ route('invoices.description.update',['invoice' => $invoice->id],'update') }}">
                            @csrf
                            @method('PUT')
                            <label for="description"
                                   class="@if($invoice->description == null) d-print-none @endif">@lang('description')
                                :</label>
                            <input class="form-control @if($invoice->description == null) d-print-none @endif" type="text"
                                   name="description" value="{{$invoice->description}}"
                                   onkeypress="this.style.width = ((this.value.length + 5) * 8) + 'px';">
                            <button type="submit"
                                    class="btn btn-primary float-left mt-2 d-print-none">@lang('update')</button>
                        </form>
                    @endcan
                </div>
                <!-- /.col -->
            </div>
        @endif
        <!-- /.col -->
    </div>
    <div class="row no-print">
        <div class="col-12">
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick="print()">
                <i class="fas fa-print"></i> @lang('print')
            </button>
            <a href="{{url('invoices/'.$invoice->id.'/mail')}}">
                <button type="button" class="btn btn-info float-right" style="margin-right: 5px;">
                    <i class="fas fa-envelope"></i> @lang('send_to_email')
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            if ($(".show-item").has("span").has("strong").val() != undefined) {
                $(".toggle-table").show();
            } else {
                $(".toggle-table").hide();
            }

            $(".toggle-form").click(function () {
                $(".toggle-table").toggle('slow');
            });
        });
    </script>

@endsection

