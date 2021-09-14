<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(config('restaurant.paginate.user'));

        return view('manager.user.index', compact('users'));
    }

    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = config('restaurant.status_user.block');
        $user->save();

        return redirect()->route('users.index')->with('notification', __('messages.no_block_user'));
    }

    public function unBlockUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = config('restaurant.status_user.unblock');
        $user->save();

        return redirect()->route('users.index')->with('notification', __('messages.no_unblock_user'));
    }
}
