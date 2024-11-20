<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'num_person',
        'phone',
        'user_id',
        'time',
    ];
    
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
