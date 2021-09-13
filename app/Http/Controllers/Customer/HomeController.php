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
        $dish = Dish::findOrFail($id);
        $comments = Comment::where('dish_id', $id)->with('user')->paginate(config('restaurant.paginate.comment'));

        return view('frontend.home.detail_dish', compact('dish', 'comments'));
    }

    public function postComment(CommentRequest $request)
    {
        $comment = Comment::create($request->all());
        $time = date('Y-m-d H:i:s', strtotime($comment->created_at));
        $numberComment = Dish::findOrFail($request->dish_id)->comments->count();

        return response()->json([
            'bool' => true,
            'user_name' => Auth::user()->name,
            'created_at' => $time,
            'numberComment' => $numberComment,
        ]);
    }
}
