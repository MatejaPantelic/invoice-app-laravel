@extends('layouts.admin')
@section('content')
    @empty($companies)
        <div class="alert alert-warning">
            @lang('empty_list')
        </div>
    @else
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mt-2 justify-content-left ml-2">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$companies->count()}}</h3>
                            <p>@lang('companies_on_page')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="{{ route('companies.create') }}" class="small-box-footer">@lang('new_company')<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <!-- ./col -->
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">@lang('company_list')</h1>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <th>@lang('id')</th>
                    <th>@lang('vat')</th>
                    <th>@lang('company_name')</th>
                    <th>@lang('address')</th>
                    <th>@lang('city')</th>
                    <th>@lang('phone_number')</th>
                    <th>@lang('bank_account')</th>
                    <th>@lang('email')</th>
                    <th>@lang('action')</th>
                    </thead>
                    <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->tin }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->city }}</td>
                            <td>{{ $company->phone_number }}</td>
                            <td>{{ $company->bank_account }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                <form class="d-inline" method="GET"
                                        action="{{route('companies.edit', ['company' => $company->id])}}">
                                    <button type="submit" class="btn btn-success w-100">@lang('edit')</button>
                                </form> <br/> <br/>
                                <form class="d-inline" method="POST"
                                        action="{{ route('companies.destroy', ['company' => $company->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want delete this company?')">@lang('delete')</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    @endif


@endsection

