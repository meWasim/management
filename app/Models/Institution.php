<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant;

class Institution extends Tenant
{
    protected $fillable = [
        'id',
        'name',
        'domain',
    ];
}
