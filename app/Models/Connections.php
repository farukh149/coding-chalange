<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Connections extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function reciever()
    {
        return $this->belongsTo(User::class,'reciever_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }
}
