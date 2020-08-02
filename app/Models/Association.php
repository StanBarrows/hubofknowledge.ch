<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\ModelStatus\HasStatuses;

class Association extends Model
{
    use HasStatuses;

    const STATUS_ASSOCIATED = 'associated';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_DECLINED = 'declined';

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
        'user_id','question_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($answer) {
            $answer->uuid = (string)Str::uuid();
        });

        static::created(function ($question) {
            $question->setStatus(self::STATUS_ASSOCIATED);
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
