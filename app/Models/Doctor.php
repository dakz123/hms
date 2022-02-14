<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $table='doctors';
    protected $fillable=['doctor_name','specialisation'];


    public function appointments()
{
   return $this->belongsTo(Appointment::class);
   
}

}

