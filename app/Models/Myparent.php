<?php

namespace App\Models;

use App\Models\Blood;
use App\Models\ParentAttachment;
use App\Models\Nationalte;
use App\Models\Relegion;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Myparent extends Authenticatable
{

    use HasTranslations;
    protected $table='myparents';
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];

    protected $guarded=[];

    public function blood(){
        return $this->belongsTo(Blood::class);
    }

    public function relegion(){
        return $this->belongsTo(Relegion::class);
    }

    public function nationalte(){
        return $this->belongsTo(Nationalte::class);
    }
    public function parentAttachments(){
        return $this->hasMany(ParentAttachment::class);
    }

}
