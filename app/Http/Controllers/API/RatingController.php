<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\RatingService;
use App\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    protected $ratingService;

    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    public function index()
    {
        // Retrieve a list of all ratings
        $ratings = $this->ratingService->listRatings();

        return response()->json(['ratings' => $ratings]);
    }

    public function store(RatingRequest $request)
    {
        // Create a new rating
        $rating = $this->ratingService->createRating($request->all());

        return response()->json(['rating' => $rating], 201);
    }

    public function show($id)
    {
        // Retrieve a rating by ID
        $rating = $this->ratingService->getRating($id);

        if (!$rating) {
            return response()->json(['message' => 'Rating not found'], 404);
        }

        return response()->json(['rating' => $rating]);
    }

    public function update(RatingRequest $request, $id)
    {
        // Update rating details
        $rating = $this->ratingService->updateRating($id, $request->all());

        if (!$rating) {
            return response()->json(['message' => 'Rating not found'], 404);
        }

        return response()->json(['rating' => $rating]);
    }

    public function destroy($id)
    {
        // Delete a rating by ID
        $result = $this->ratingService->deleteRating($id);

        if (!$result) {
            return response()->json(['message' => 'Rating not found'], 404);
        }

        return response()->json(['message' => 'Rating deleted']);
    }
}
