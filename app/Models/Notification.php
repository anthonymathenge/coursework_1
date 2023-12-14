<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Notification extends Model
{
    protected $fillable = ['user_id', 'type', 'notifiable_id', 'notifiable_type', 'read_at'];

    public function notifiable()
    {
        return $this->morphTo();
    }
}