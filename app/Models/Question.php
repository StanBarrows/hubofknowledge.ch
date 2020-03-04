<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\ModelStatus\HasStatuses;

class Question extends Model
{
    use HasStatuses;
    use LogsActivity;
    use SoftDeletes;

    const STATUS_NEW = 'new';
    const STATUS_OPEN = 'open';
    const STATUS_SOLVED = 'solved';
    const STATUS_CLOSED = 'closed';

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
        'user_id','public','body'
    ];


    protected static $logAttributes = ['user_id','public','body','created_at','updated_at','deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($question) {
            $question->uuid = (string)Str::uuid();
            $question->public = false;
        });

        static::created(function ($question) {
            $question->setStatus(self::STATUS_NEW);
        });

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->latest();
    }

    public function associations()
    {
        return $this->hasMany(Association::class);
    }

    public function getBackgroundColorForStatusBadge()
    {
        switch ($this->status) {
            case self::STATUS_NEW:
                return 'bg-blue-100';
                break;
            case self::STATUS_OPEN:
                return 'bg-green-100';
                break;
            case self::STATUS_SOLVED:
                return 'bg-orange-100';
                break;
            case self::STATUS_CLOSED:
                return 'bg-red-100';
                break;
            default:
                return 'bg-gray-100';
                break;
        }
    }

    public function getTextColorForStatusBadge()
    {
        switch ($this->status) {
            case self::STATUS_NEW:
                return 'text-blue-800';
                break;
            case self::STATUS_OPEN:
                return 'text-green-800';
                break;
            case self::STATUS_SOLVED:
                return 'text-orange-800';
                break;
            case self::STATUS_CLOSED:
                return 'text-red-800';
                break;
            default:
                return 'text-gray-800';
                break;
        }
    }
}
