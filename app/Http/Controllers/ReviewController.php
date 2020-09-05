<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
    }
    
    public function create()
    {
        //
    }

    public function store(ReviewRequest $request, Product $product)
    {
        $review = new Review($request->all());
        $product->reviews()->save($review);

        return response([
            'data' => new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }

    public function show(Review $review)
    {
        //
    }

    public function edit(Review $review)
    {
        //
    }

    public function update(Request $request, Review $review)
    {
        //
    }

    public function destroy(Review $review)
    {
        //
    }
}
