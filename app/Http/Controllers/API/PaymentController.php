<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        // Retrieve a list of all payments
        $payments = $this->paymentService->listPayments();

        return response()->json(['payments' => $payments]);
    }

    public function store(PaymentRequest $request)
    {
        // Create a new payment
        $payment = $this->paymentService->createPayment($request->all());

        return response()->json(['payment' => $payment], 201);
    }

    public function show($id)
    {
        // Retrieve a payment by ID
        $payment = $this->paymentService->getPayment($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json(['payment' => $payment]);
    }

    public function update(PaymentRequest $request, $id)
    {
        // Update payment details
        $payment = $this->paymentService->updatePayment($id, $request->all());

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json(['payment' => $payment]);
    }

    public function destroy($id)
    {
        // Delete a payment by ID
        $result = $this->paymentService->deletePayment($id);

        if (!$result) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json(['message' => 'Payment deleted']);
    }
}