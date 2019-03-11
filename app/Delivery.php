<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    protected $table = 'deliveries';
    protected $fillable = [
        'delivery_id',
        'customer_id',
        'reference_no',
        'delivery_date',
        'date_delivered',
        'delivery_location',
        'delivery_status',
        'delivery_notified',
        'delivered_notified',
    ];
    protected $primaryKey = 'delivery_id';
	protected $dates = ['deleted_at'];

	public function service()
    {
        return $this->hasOne(Service::class, 'delivery_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
