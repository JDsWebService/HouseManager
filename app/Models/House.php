<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    // Define the Table
    protected $table = 'houses';

    // Define the User Relationship
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    // Define the Occupant Relationship
    public function occupants() {
        return $this->hasMany('App\Models\Occupant');
    }
    
    // Get Gender Attribute
    public function getGenderAttribute($value) {
    	switch($value) {
    		case "male":
    			return "Male";
    			break;
    		case "female":
    			return "Female";
    			break;
    		case "coed":
    			return "Co-Ed";
    			break;
    		default:
    			return "No Gender Defined";
    			break;
    	}
    }
}
