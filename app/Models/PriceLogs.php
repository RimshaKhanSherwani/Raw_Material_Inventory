<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceLogs extends Model
{
    use HasFactory;
    protected $table = "pricelogs";
    protected $primarykey = "pricelog_id";
}
