<?php

namespace App\Repositories;

interface NotificationInterface
{
    public function listNotifications();

    public function createNotification(array $data);

    public function getNotification($id);

    public function updateNotification($id, array $data);

    public function deleteNotification($id);

    // Define other methods for notification-related operations
}