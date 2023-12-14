<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;



class NotificationController extends Controller
{
  public function index()
  {
      $user = auth()->user();
      $notifications = $user->unreadNotifications;

      return view('notifications', compact('notifications'));
  }
    
}

