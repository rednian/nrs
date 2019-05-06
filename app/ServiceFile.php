<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceFile extends Model
{
    protected $table = 'service_files';
    protected $primaryKey = 'service_files_id';
    protected $fillable = ['service_id', 'file_path', 'filename', 'upload_type'];
}
