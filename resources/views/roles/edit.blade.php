@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="alert alert-success d-print-none" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="text-center">@lang('edit') {{ $role->name }}</h5>
            <form action="{{ route('roles.update', [$role->id]) }}" method="POST">
                @csrf
                @method('PUT')
                @foreach ($allPermissions as $allPermission)
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" id="{{ $allPermission->name }}" value="{{ $allPermission->name }}"
                               name="permissions[]" @if($rolePermissionsId->contains('permission_id','=',$allPermission->id)) checked @endif>
                        <label class="form-check-label" for="{{ $allPermission->name }}">{{ $allPermission->name }}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary float-left">@lang('update')</button>
            </form>

        </div>
    </div>
@endsection
