<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Park;

class ReviewsController extends Controller
{
    public function list()
    {
        return view('reviews.list', [
            'reviews' => Review::all()
        ]);
    }

    public function deleteConfirm(Review $review)
    {
        return view('reviews.delete', [
            'review' => $review
        ]);
    }

    public function deleted(Review $review)
    {
        $review->delete();
        return redirect('/console/reviews/list')
            ->with('message', 'review for ' . $review->park->park_name . ' has been deleted');

    }

    public function addForm()
    {
        return view('reviews.add',[
            'users' => User::all(),
            'parks' => Park::all(),
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'user_id' => 'required',
            'park_id' => 'required',
            'mark' => 'required',
            'description' => 'nullable',
        ]);

        $review = new Review();
        $review->user_id = $attributes['user_id'];
        $review->park_id = $attributes['park_id'];
        $review->mark = $attributes['mark'];
        $review->description = $attributes['description'];
        $review->save();

        return redirect('/console/reviews/list')
            ->with('message', 'review for ' . $review->park->park_name . ' has been created');
    }
}
