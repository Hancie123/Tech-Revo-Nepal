<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Expenses extends Model
{
    use HasFactory;
    protected $table='room_expenses';
    protected $primaryKey='Expenses_ID';
}