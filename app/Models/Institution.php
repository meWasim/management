<?php

namespace App\Models;

use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Models\Tenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;

class Institution extends Tenant implements TenantWithDatabase
{
    use HasDomains;
    use HasDatabase;

    protected $fillable = [
        'id',
        'name',
        'domain',
    ];
}
