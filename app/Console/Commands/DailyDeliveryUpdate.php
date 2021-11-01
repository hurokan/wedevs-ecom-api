<?php

namespace App\Console\Commands;

use App\Models\Deliverie;
use App\Models\Order;
use App\Repository\DeliveryRepositoryInterface;
use Illuminate\Console\Command;

class DailyDeliveryUpdate extends Command
{

    private $deliverRepository;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deliveryUpdate:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Every Mid night at 12:00 all delivery order moved to deliveries table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DeliveryRepositoryInterface  $deliverRepository)
    {
        parent::__construct();
        $this->deliverRepository=$deliverRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $deliveries=Deliverie::pluck('order_id')->all();
        $orders=Order::where('status','Delivered')
            ->whereNotIn('id',$deliveries)
               ->get();

        $this->deliverRepository->moveToDelivery($orders);

        $this->info('Successfully moved order to delivery table.');
    }
}
