<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;
use App\Services\ApiNotificationService;



class NotificationController extends Controller
{
  public function index()
  {
      $user = auth()->user();
      $notifications = $user->unreadNotifications;

      return view('notifications', compact('notifications'));
  }

  private $apiNotificationService;

    public function __construct(ApiNotificationService $apiNotificationService)
    {
        $this->apiNotificationService = $apiNotificationService;
    }

    public function showNotifications($userId)
    {
        $notifications = $this->apiNotificationService->getNotifications($userId);
        // Process and return the notifications
    }

    public function markAsRead($notificationId)
    {
        $response = $this->apiNotificationService->markNotificationAsRead($notificationId);
        // Process and return the response
    }
}

