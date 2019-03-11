<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceUploads extends Model
{
    protected $table = 'services_uploads';
    protected $primaryKey = 'upload_id';
    protected $fillable = ['upload_path', 'service_id'];

    public function service()
    {
        return $this->hasOne(Service::class, 'service_id');
    }
}
