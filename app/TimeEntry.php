<?php namespace App;


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
}