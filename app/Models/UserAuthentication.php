<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UserAuthentication extends Model
{
    Use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];

    protected static $logAttributes = ['user_id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
