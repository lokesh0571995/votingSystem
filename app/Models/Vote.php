<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function nominie()
    {
        return $this->belongsTo(Nominie::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
