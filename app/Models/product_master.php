<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_master extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='tbl_product_master';
}
