<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class pucukidea extends Model
{
    use HasFactory;
    
    static function buatuid($val){
      return Uuid::uuid5(Uuid::NAMESPACE_DNS, $val)->toString();
    }
}
