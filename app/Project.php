<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'start',
        'end',
        'deliveryDate',
        'dateFinished',
        'state',
        'created_by',
        'totalPrice',
        'totalAgreed',
        'user_id',
    ];

}
