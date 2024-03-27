<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolQuota extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'tool_quota';

    public $timestamps = false;

    // protected $primaryKey = 'tool_id';
}
