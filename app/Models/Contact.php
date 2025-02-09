<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Contact extends Model
{
    use HasFactory;

    // ✅ Update the fillable attributes
    protected $fillable = ['user_id', 'subject', 'message'];

    // ✅ Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
