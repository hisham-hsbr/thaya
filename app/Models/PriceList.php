<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PriceList extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable = [
    'code',
    'name',
    'group',
    'packing',
    'uom',
    'packet_price',
    'half_packet_price',
    'cash_price',
    'credit_price',
    'description',
    'status',
    'created_by',
    'updated_by',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['code','name','group','packing','uom','packet_price','half_packet_price','cash_price','credit_price','description','status','created_by','updated_by',])
        // Chain fluent methods for configuration options

        ->setDescriptionForEvent(fn(string $eventName) => "This Price List has been {$eventName}")
        ->useLogName('Price List')
        // ->dontLogIfAttributesChangedOnly(['email']) //By default the updated_at attribute is not ignored and will trigger an activity being logged
        ->logOnlyDirty();
        // ->dontSubmitEmptyLogs(); //Prevent save logs items that have no changed attribute
    }

    public function getCreatedAtAttribute()
    {
        $time_zone = Auth::user()->timeZone->time_zone;
        return Carbon::parse($this->attributes['created_at'])->setTimezone($time_zone);
    }

    public function getUpdatedAtAttribute()
    {
        $time_zone = Auth::user()->timeZone->time_zone;
        return Carbon::parse($this->attributes['updated_at'])->setTimezone($time_zone);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class,'time_zone_id','id');
    }
}
