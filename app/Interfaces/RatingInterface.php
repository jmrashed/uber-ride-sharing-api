<?php

namespace App\Repositories;

interface RatingInterface
{
    public function listRatings();

    public function createRating(array $data);

    public function getRating($id);

    public function updateRating($id, array $data);

    public function deleteRating($id);

    // Define other methods for rating-related operations
}
