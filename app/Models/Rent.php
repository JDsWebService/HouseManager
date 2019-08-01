<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    // Define the MySQL Table
    protected $table = 'rent';

    // Define the Occupant Relationship
    public function occupant() {
    	return $this->belongsTo('App\Models\Occupant');
    }

    // Define User Relationship
    public function user() {
    	return $this->belongsTo('App\Models\User');
    }
}
