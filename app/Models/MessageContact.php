<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageContact extends Model
{
    protected $table='message_contacts';
    protected $fillable=['message','contact_id'];

}