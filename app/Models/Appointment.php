<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table='appointments';
    protected $fillable=['full_name','date','phone_number','message','doctor_id','specialisation'];
    
    public function doctors() {
        return $this->hasMany(Doctor::class);
    }
}
