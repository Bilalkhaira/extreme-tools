<?php

namespace App\Models;

use App\Models\Tool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public $incrementing = false;
    
    protected $keyType = 'string';

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'tool_quota', 'plan');
    }
}
