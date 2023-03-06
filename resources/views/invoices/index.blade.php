@extends('layouts.admin')
@section('content')
    @empty($invoices)
        <div class="alert alert-warning">
            @lang('empty_list');
        </div>
    @else
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-2 justify-content-left ml-2">
            @can('create-invoices')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $invoices->count() }}</h3>
                            <p>@lang('invoices_on_page')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-compose"></i>
                        </div>
                        <a href="{{ route('invoices.create') }}" class="small-box-footer">@lang('new_invoice')<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan
            <!-- ./col -->
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">@lang('invoice_list')</h1>
                <form method="get" action="{{ route('invoices.find') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="date_from">@lang('created_at')</label>
                            <input type="date" class="form-control " name="date_from"
                                   value="{{ now()->addYear(-1)->format('Y-m-d') }}"
                            >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="date_to">@lang('created_to')</label>
                            <input type="date" class="form-control " name="date_to"
                                   value="{{ now()->format('Y-m-d') }}"
                            >
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cb_paid" value="paid"
                                   name="status[]" >
                            <label class="form-check-label" for="cb_paid">@lang('paid')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cb_not_paid" value="not paid"
                                   name="status[]">
                            <label class="form-check-label" for="cb_not_paid">@lang('not_paid')</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cb_in_progress" value="in progress"
                                   name="status[]">
                            <label class="form-check-label" for="cb_in_progress">@lang('in_progress')</label>
                            <input type='hidden' value='0' name='status[]'>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="search">Search by name</label>
                            <input class="form-control" type="text" name="search" placeholder="Search by Name">
                        </div>
                        <button type="submit" class="btn btn-secondary h-50 mt-4">@lang('find')</button>
                    </div>
                </form>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <th>@lang('invoice_number')</th>
                    <th>@lang('from')</th>
                    <th>@lang('client_name')</th>
                    <th>@lang('payment_term')</th>
                    <th>@lang('status')</th>
                    @can(['edit-invoices', 'delete-invoices'])
                        <th>@lang('action')</th>
                    @endcan
                    </thead>
                    <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->u_name . ' ' . $invoice->u_surname }}</td>
                            <td>{{ $invoice->c_name . ' ' . $invoice->c_surname }}</td>
                            <td>{{ $invoice->payment_term }}</td>
                            <td>{{ $invoice->status }}</td>
                            @can(['edit-invoices', 'delete-invoices'])
                                <td>
                                    <a class="btn btn-info"
                                       href="{{ route('invoices.show', ['invoice' => $invoice->id]) }}">@lang('show_more')</a>
                                    <form class="d-inline" method="POST"
                                          action="{{ route('invoices.destroy', ['invoice' => $invoice->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want delete this item')">@lang('delete')</button>
                                    </form>
                                    </form>
                                    <form class="d-inline" method="GET"
                                          action="{{ route('invoices.edit', ['invoice' => $invoice->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">@lang('edit')</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
    @endif
@endsection
