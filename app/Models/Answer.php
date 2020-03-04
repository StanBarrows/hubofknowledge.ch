<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Answer extends Model
{
    use LogsActivity;
    use SoftDeletes;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','question_id','public','body'
    ];
    protected static $logAttributes = ['user_id','question_id','public','body','created_at','updated_at','deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($answer) {
            $answer->uuid = (string)Str::uuid();
            $answer->public = false;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
