<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Test;
use DB;

class Slot extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slots';

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
    protected $fillable = ['time', 'notes'];

    public static function getSlotsArray(){
        $slots = DB::select('SELECT * FROM slots');

        $slot_data = [];

        foreach ($slots as $slot) {
            $slot_data[$slot->id] = $slot->time;
        }

        return $slot_data;
    }

    // public function tests(){
    //     return $this->belongsToMany('App\Test');
    // }

    
}
