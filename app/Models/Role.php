<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    const ROLES = [
        self::ROLE_ADMINISTRATOR,
        self::ROLE_EXPERT,
    ];

    const ROLE_ADMINISTRATOR = 'administrator';
    const ROLE_EXPERT = 'expert';
}
