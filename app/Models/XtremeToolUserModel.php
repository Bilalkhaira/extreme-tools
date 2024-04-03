<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XtremeToolUserModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'uid';

    protected $table = 'user';

    public $timestamps = false;
}
