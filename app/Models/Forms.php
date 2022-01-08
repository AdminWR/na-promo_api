<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Forms extends Model
{
    protected $table = 'forms';
    protected $fillable = ['name', 'tel'];

    use Notifiable;


}
