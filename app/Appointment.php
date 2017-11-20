<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Patient;
use App\Test;
use App\Slot;

class Appointment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'appointments';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['patient_id', 'test_id', 'date', 'slot_id', 'status'];

    public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function test(){
        return $this->belongsTo('App\Test');
    }

    public function slot(){
        return $this->hasOne('App\Slot');
    }

    
}
