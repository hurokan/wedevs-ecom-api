<?php


namespace App\Repository;


use App\Models\User_notification;
use App\Repository\Eloquent\BaseRepository;

class UserNotificationRepository extends BaseRepository implements UserNotificationRepositoryInterface
{
    /**
     * OrderRepository constructor.
     *
     * @param User_notification $model
     */
    public function __construct(User_notification $model)
    {
        parent::__construct($model);
    }

    public function createNotification($data=[],$type=null)
    {
        //Request is valid, create new order

        return $notification= $this->model->create([
            'notification_type' => $type,
            'notification_to_user_id' => $data['notification_to_user_id'],
            'notification_body' => $data['notification_body'],
        ]);

    }

}
