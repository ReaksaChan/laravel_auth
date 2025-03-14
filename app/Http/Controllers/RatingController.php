<?php

namespace App\Http\Controllers;

use App\Http\Resources\RatingResource;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Book $book) {

        $rating = Rating::firstOrCreate(
            [
                'user_id' => $request->user()->user_id,
                'book_id' => $request->id,
            ],
            ['rating' => $request->rating,]
            );

        return new RatingResource($rating);
    }

    public function __construct(){
        $this->middleware('auth:api');
    }
}
