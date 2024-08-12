<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     // Specify the table name
     protected $table = 'order';

     // Specify the primary key if it's not 'id'
     protected $primaryKey = 'orderid';
 
     protected $fillable = [
         'orderid',
         'userid',
         'purchaseid',
         'order_date',
         'status',
     ];
}