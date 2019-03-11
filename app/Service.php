<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'service_id';
    protected $table = 'services';
    protected $fillable = [
		'service_id',
        'customer_id',
        'brand',
        'model',
        'serial',
        'laptop_broken_lcd',
        'laptop_display_flickering',
        'laptop_casing_broken',
        'laptop_loose_hinges',
        'laptop_missing_keys',
        'laptop_broken_sockets',
        'laptop_hdd_defective',
        'laptop_optical_drive_damage',
        'printer_toner_spill',
        'printer_fuser_sleeve',
        'printer_ink_leakage',
        'printer_casing_broken',
        'lcd_scratches',
        'lcd_display_flickerting',
        'lcd_casing_broken',
        'accessories_power_cord',
        'accessories_battery',
        'accessories_pcmcia',
        'accessories_optical_drive',
        'accessories_toner_cartridge',
        'accessories_ink_cartridge',
        'accessories_data_cable',
        'recovery_hdd',
        'recovery_laptop',
        'recovery_scsi',
        'recovery_sata',
        'recovery_sas',
        'recovery_nas',
        'recovery_ssd',
        'recovery_flash',
        'recovery_mobile',
        'recovery_tablet',
        'problem_reported',
        'remarks',
        'service_date',
        'delivery',
        'delivery_date',
        'delivery_address',
        'receipt_no'
    ];

    protected $dates = ['deleted_at'];

    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'delivery_id');
    }

    public function images()
    {
        return $this->hasMany(ServiceUploads::class, 'service_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
