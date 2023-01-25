<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class password extends Model
{
    use HasFactory;
    protected $table='password';
    protected $primaryKey='password_id';

}