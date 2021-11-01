<?php


namespace App\Repository;
use Illuminate\Support\Collection;

interface UserNotificationRepositoryInterface
{
    public function createNotification($data=[],$type=null);
}
