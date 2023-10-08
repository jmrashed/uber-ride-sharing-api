<?php

namespace App\Services;

use App\Repositories\RatingRepository;

class RatingService
{
    protected $ratingRepository;

    public function __construct(RatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function listRatings()
    {
        // Retrieve a list of all ratings
        return $this->ratingRepository->listRatings();
    }

    public function createRating(array $data)
    {
        // Create a new rating
        return $this->ratingRepository->createRating($data);
    }

    public function getRating($id)
    {
        // Retrieve a rating by ID
        return $this->ratingRepository->getRating($id);
    }

    public function updateRating($id, array $data)
    {
        // Update rating details
        return $this->ratingRepository->updateRating($id, $data);
    }

    public function deleteRating($id)
    {
        // Delete a rating by ID
        return $this->ratingRepository->deleteRating($id);
    }

    // Add more service methods for rating-related operations
}
