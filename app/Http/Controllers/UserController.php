<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        if (auth()->user()->roles[0]->name == 'super_admin') {

            $users = User::with('roles:name')
                ->join('companies', 'users.company_id', '=', 'companies.id')
                ->select('users.*', 'companies.name AS c_name')
                ->orderBy('id', 'desc')
                ->where('users.deleted_at', '=', null)
                ->latest()
                ->paginate(10);

        } else {
            $auth = auth()->user()->company_id;
            $users = User::with('roles:name')
                ->join('companies', 'users.company_id', '=', 'companies.id')
                ->select('users.*', 'companies.name AS c_name')
                ->orderBy('id', 'desc')
                ->where([
                    ['users.deleted_at', '=', null],
                    ['users.company_id', '=', "$auth"]
                ])->latest()
                ->paginate(10);
        }
        return view('users.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $users
     * @return Response
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->back()
            ->withSuccess('The User with id ' . $user->id . ' has been deleted.');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $users
     * @return Response
     */
    public function assingAdmin(User $user)
    {
        $user->assignRole('admin');
        $user->removeRole('guest');
        $user->removeRole('editor');
        return redirect()->back()
            ->withSuccess('The User with id ' . $user->id . ' is assigned the role admin');
    }

    public function approveUser(User $user)
    {
        $user->update([
            'is_approved' => 1
        ]);
        return redirect()
            ->back()
            ->withSuccess('The user with id ' . $user->id . ' was approved.');
    }

    public function assingEditor(User $user)
    {

        $user->assignRole('editor');
        $user->removeRole('guest');
        return redirect()->back()
            ->withSuccess('The User with id ' . $user->id . ' is assigned the role editor');
    }
}
