<?php

namespace App\Repositories;

interface PaymentInterface
{
    public function listPayments();

    public function createPayment(array $data);

    public function getPayment($id);

    public function updatePayment($id, array $data);

    public function deletePayment($id);

    // Define other methods for payment-related operations
}