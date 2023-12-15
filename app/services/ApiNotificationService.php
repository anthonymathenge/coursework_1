<?php

// Example API Service Class
// app/Services/ApiNotificationService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiNotificationService
{
    private $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = config('api.notification_base_url');
    }

    public function getNotifications($userId)
    {
        $url = $this->buildApiUrl("notifications/user/{$userId}");
        $response = Http::get($url);

        return $response->json();
    }

    public function markNotificationAsRead($notificationId)
    {
        $url = $this->buildApiUrl("notifications/mark-as-read/{$notificationId}");
        $response = Http::put($url);

        return $response->json();
    }

    private function buildApiUrl($endpoint)
    {
        return $this->apiBaseUrl . '/' . $endpoint;
    }
}

