<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use App\Http\Requests\NotificationRequest;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        // Retrieve a list of all notifications
        $notifications = $this->notificationService->listNotifications();

        return response()->json(['notifications' => $notifications]);
    }

    public function store(NotificationRequest $request)
    {
        // Create a new notification
        $notification = $this->notificationService->createNotification($request->all());

        return response()->json(['notification' => $notification], 201);
    }

    public function show($id)
    {
        // Retrieve a notification by ID
        $notification = $this->notificationService->getNotification($id);

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        return response()->json(['notification' => $notification]);
    }

    public function update(NotificationRequest $request, $id)
    {
        // Update notification details
        $notification = $this->notificationService->updateNotification($id, $request->all());

        if (!$notification) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        return response()->json(['notification' => $notification]);
    }

    public function destroy($id)
    {
        // Delete a notification by ID
        $result = $this->notificationService->deleteNotification($id);

        if (!$result) {
            return response()->json(['message' => 'Notification not found'], 404);
        }

        return response()->json(['message' => 'Notification deleted']);
    }
}