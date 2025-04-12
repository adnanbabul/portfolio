<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressBar extends Model
{
    use HasFactory;

    protected $table = "progress_bar";
    protected $guarded = [];
}
