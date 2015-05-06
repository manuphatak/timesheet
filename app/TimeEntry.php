<?php namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeEntry extends Model
{
    use SoftDeletes;

    protected $table = 'time_entry';

    protected $dates = ['deleted_at', 'start_time', 'end_time'];

    protected $fillable = ['user_id', 'start_time', 'end_time', 'comment'];

    protected $visible = ['id', 'start_time', 'end_time', 'comment', 'user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = Carbon::parse($value);
    }

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->toIso8601String();
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = Carbon::parse($value);
    }
    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->toIso8601String();
    }
}