<?php


namespace app;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeEntry extends Model
{
    use SoftDeletes;

    protected $table = 'time_entry';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'start_time', 'end_time', 'comment'];

    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}