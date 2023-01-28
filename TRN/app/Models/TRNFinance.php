<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRNFinance extends Model
{
    use HasFactory;
    protected $table='trnfinance';
    protected $primaryKey='TRN_ID';
}