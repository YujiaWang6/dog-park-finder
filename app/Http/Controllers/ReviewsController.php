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
}
