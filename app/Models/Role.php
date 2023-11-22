<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;

    public const IS_ADMIN = 1;
    public const IS_MODERATOR = 2;
    public const IS_TRADER = 3;
}
