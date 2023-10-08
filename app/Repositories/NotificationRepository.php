<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository implements NotificationInterface
{
    public function listNotifications()
    {
        // Retrieve a list of all notifications
        return Notification::all();
    }

    public function createNotification(array $data)
    {
        // Create a new notification in the database
        return Notification::create($data);
    }

    public function getNotification($id)
    {
        // Retrieve a notification by ID
        return Notification::find($id);
    }

    public function updateNotification($id, array $data)
    {
        // Update notification details
        $notification = Notification::findOrFail($id);
        $notification->update($data);

        return $notification;
    }

    public function deleteNotification($id)
    {
        // Delete a notification by ID
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return true;
    }

    // Implement other methods for notification-related operations
}