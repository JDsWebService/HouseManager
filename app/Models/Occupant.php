<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occupant extends Model
{
    protected $table = 'occupants';

    // Define User Relationship
    public function user() {
    	return $this->belongsTo('App\Models\User');
    }

    // Define House Relationship
    public function house() {
    	return $this->belongsTo('App\Models\House');
    }

    // Define the Rent Relationship
    public function rent() {
        return $this->hasMany('App\Models\Rent');
    }

    // Get Full Name Attribute
    public function getFullNameAttribute() {
    	return $this->first_name . ' ' . $this->last_name;
    }
}
