<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService
{
    protected $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function listPayments()
    {
        // Retrieve a list of all payments
        return $this->paymentRepository->listPayments();
    }

    public function createPayment(array $data)
    {
        // Create a new payment
        return $this->paymentRepository->createPayment($data);
    }

    public function getPayment($id)
    {
        // Retrieve a payment by ID
        return $this->paymentRepository->getPayment($id);
    }

    public function updatePayment($id, array $data)
    {
        // Update payment details
        return $this->paymentRepository->updatePayment($id, $data);
    }

    public function deletePayment($id)
    {
        // Delete a payment by ID
        return $this->paymentRepository->deletePayment($id);
    }

    // Add more service methods for payment-related operations
}