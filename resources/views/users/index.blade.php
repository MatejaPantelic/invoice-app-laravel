@extends('layouts.admin')
@section('content')
    @empty($users)
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
                        <h3>{{ $users->count() }}</h3>
                        <p>@lang('users_on_page')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">@lang('List of Users')</h1>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <th>@lang('name')</th>
                    <th>@lang('surname')</th>
                    <th>@lang('company_name')</th>
                    <th>@lang('phone_number')</th>
                    <th>@lang('email')</th>
                    <th>@lang('role')</th>
                    @can(['assign-editor', 'delete-user'])
                        <th>Action</th>
                    @endcan
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        @if (\Illuminate\Support\Facades\Auth::user()->hasRole('super_admin'))
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->surname }}</td>
                                <td>{{ $user->c_name }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name }} <br>
                                @endforeach
                                </td>
                                <td>
                                    @can('assign-admin')
                                        @if (!App\Models\User::findOrFail($user->id)->getRoleNames()->contains('admin'))
                                            @if ($user->is_approved == 1)
                                                <form class="d-inline" method="GET"
                                                      action="{{ route('users.assign.admin', ['user' => $user->id]) }}">

                                                    <button type="submit" class="btn btn-success w-100">Assign admin
                                                    </button>
                                                </form>
                                            @else
                                                <form class="d-inline" method="GET"
                                                      action="{{ route('users.approve', ['user' => $user->id]) }}">

                                                    <button type="submit" class="btn btn-warning w-100">Approve user
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    @endcan
                                    @can('delete-user')
                                        <form class="d-inline" method="POST"
                                              action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100  mt-1"
                                                    onclick="return confirm('Are you sure you want delete this User')">@lang('delete')
                                            </button>
                                        </form>
                                @endcan
                            </tr>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->hasRole(['admin', 'editor']))
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->surname }}</td>
                                <td>{{ $user->c_name }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name }} <br>
                                @endforeach
                                </td>
                                <td>
                                    @can('assign-editor')
                                        @if (!App\Models\User::findOrFail($user->id)->getRoleNames()->contains('admin') && !App\Models\User::findOrFail($user->id)->getRoleNames()->contains('editor') )
                                            @if ($user->is_approved == 1)
                                                <form class="d-inline" method="GET"
                                                      action="{{ route('users.assign.editor', ['user' => $user->id]) }}">

                                                    <button type="submit" class="btn btn-success w-100">Assign editor
                                                    </button>
                                                </form>
                                            @else
                                                <form class="d-inline" method="GET"
                                                      action="{{ route('users.approve', ['user' => $user->id]) }}">
                                                    <button type="submit" class="btn btn-warning w-100">Approve user
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    @endcan
                                    @can('delete-user')
                                        <form class="d-inline" method="POST"
                                              action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100  mt-1"
                                                    onclick="return confirm('Are you sure you want delete this User')">@lang('delete')
                                            </button>
                                        </form>
                                    @endcan
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    @endif

@endsection
