<?php

namespace App\Services;

use App\Repositories\NotificationRepository;

class NotificationService
{
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function listNotifications()
    {
        // Retrieve a list of all notifications
        return $this->notificationRepository->listNotifications();
    }

    public function createNotification(array $data)
    {
        // Create a new notification
        return $this->notificationRepository->createNotification($data);
    }

    public function getNotification($id)
    {
        // Retrieve a notification by ID
        return $this->notificationRepository->getNotification($id);
    }

    public function updateNotification($id, array $data)
    {
        // Update notification details
        return $this->notificationRepository->updateNotification($id, $data);
    }

    public function deleteNotification($id)
    {
        // Delete a notification by ID
        return $this->notificationRepository->deleteNotification($id);
    }

    // Add more service methods for notification-related operations
}