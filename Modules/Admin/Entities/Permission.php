<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table  ="permissions" ;
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\PermissionFactory::new();
    }
}
