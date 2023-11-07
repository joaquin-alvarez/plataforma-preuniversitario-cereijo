<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Model;

class Gradable extends Model
{
    const FIRST_QUARTER = 1;
    const SECOND_QUARTER = 2;
    const THIRD_QUARTER = 3;
    const FIRST_EXTRA = 4;
    const SECOND_EXTRA = 5;
    const FINAL = 6;
}
