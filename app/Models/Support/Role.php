<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;

    const TEACHER = 2;

    const STUDENT = 3;
}
