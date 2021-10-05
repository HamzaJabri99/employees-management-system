<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'middle_name', 'address', 'country_id', 'state_id', 'departement_id', 'city_id', 'zip_code', 'birthdate', 'date_hired',];
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
