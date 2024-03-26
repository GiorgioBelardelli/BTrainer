<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function messages(){
        return $this -> hasMany(Message::class);
    }

    public function specializations(){
        return $this -> belongsToMany(Specialization::class);
    }

    public function reviews(){
        return $this -> hasMany(Review::class);
    }

    public function sponsorships(){
        return $this -> belongsToMany(Sponsorship::class)
                     -> withPivot('expire_date', 'created_at');
    }

    public function votes(){
        return $this -> belongsToMany(Vote::class);
    }
}
