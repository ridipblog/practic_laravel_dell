<?php

namespace App\Models\CronTest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronTempModel extends Model
{
    use HasFactory;
    protected $table='crons_temp';
    protected $fillable=[
        'name'
    ];
}

