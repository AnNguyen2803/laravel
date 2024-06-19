<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->content = $request->input('content');
        $review->rating = $request->input('rating');
        $review->save();

        return redirect()->back()->with('success', 'Đã gửi đánh giá thành công!');
    }
}
