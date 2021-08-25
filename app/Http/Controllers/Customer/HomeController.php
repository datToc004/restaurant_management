<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $dishes = Dish::offset(config('restaurant.dishes.offset'))->limit(config('restaurant.dishes.limit'))->get();

        return view('frontend.index', compact('dishes'));
    }

    public function dish()
    {
        $dishes = Dish::paginate(config('restaurant.paginate.dish'));

        return view('frontend.home.restaurant', compact('dishes'));
    }

    public function profile()
    {
        return view('frontend.profile.profile');
    }

    public function postProfile(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();

        return redirect()->route('home');
    }

    public function detailDish($id)
    {
        $dish = Dish::with('comments')->findOrFail($id);

        return view('frontend.home.detail_dish', compact('dish'));
    }

    public function postComment(CommentRequest $request)
    {
        Comment::create($request->all());

        return redirect()->back();
    }
}
