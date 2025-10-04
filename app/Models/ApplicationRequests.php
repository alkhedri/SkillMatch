<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicationRequests extends Model
{
    use HasFactory;


     protected $fillable = [
        'user_id', 'job_id'
    ];

    // Relationship To User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Relationship With Listing
    public function job() {
        return $this->belongsTo(Listing::class, 'job_id');
    }

}
