<?php

namespace App\Models;

use App\Models\SubcriptionPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public $incrementing = false;
    
    protected $keyType = 'string';

    public function plans()
    {
        return $this->belongsToMany(SubcriptionPlan::class, 'tool_quota', 'tool_id', 'plan');
    }
    
}
