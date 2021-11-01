<?php


namespace App\Repository;


use App\Models\Deliverie;
use App\Repository\Eloquent\BaseRepository;

class DeliveryRepository extends BaseRepository implements DeliveryRepositoryInterface
{
    /**
     * DeliveryRepository constructor.
     *
     * @param Deliverie $model
     */
    public function __construct(Deliverie $model)
    {
        parent::__construct($model);
    }

    public function moveToDelivery($data=[])
    {

        $delivery='';

        foreach ($data as $key => $val) {
            $delivery = $this->model->create([
                'order_id' =>$val->id,
                'total_amount' => $val->total_amount,
                'total_qty' => $val->total_qty,
                'total_vat' => $val->total_vat,
                'net_amount' => $val->net_amount,
                'created_by' => $val->created_by
            ]);
        }

        return $delivery;

    }

}
