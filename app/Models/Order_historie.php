<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_historie extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id', 'price', 'qty','total_vat','total_amount'];
}
