<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_type', 'notification_to_user_id', 'notification_body', 'status'];
}
