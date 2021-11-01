<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount', 'total_qty', 'total_vat', 'net_amount','shipping_address','contact_no','shipping_method','created_by'];
}
