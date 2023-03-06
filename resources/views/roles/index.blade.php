@extends('layouts.admin')
@section('content')
    @empty($roles)
        <div class="alert alert-warning">
            @lang('empty_list')
        </div>
    @else
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">@lang('roles_list')</h1>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <th>@lang('id')</th>
                    <th>@lang('name')</th>
                    <th>@lang('action')</th>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form class="d-inline" method="GET"
                                      action="{{route('roles.edit', ['role' => $role->id])}}">
                                    <button type="submit" class="btn btn-success w-100">@lang('edit')</button>
                                </form>
                                <br/> <br/>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection

