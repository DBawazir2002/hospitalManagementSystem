<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Appointment extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['name', 'phone', 'email', 'message', 'status', 'user_id', 'doctor', 'date'];
}
