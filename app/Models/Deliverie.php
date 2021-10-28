<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverie extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'total_amount', 'total_qty', 'total_vat','net_amount'];
}
