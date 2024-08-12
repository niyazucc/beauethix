<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // Specify the table name
    protected $table = 'products';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'productid';

    protected $fillable = [
        'productid',
        'name',
        'description',
        'image1',
        'image2',
        'image3',
        'stock',
        'price',

    ];
}