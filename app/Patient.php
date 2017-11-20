<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Appointment;

use DB;

class Patient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patients';

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

    public $timestamps = true;
    
    protected $fillable = ['first_name', 'last_name', 'email', 'age', 'gender', 'phone_number', 'notes', 'address', 'user_id'];

    public function appointment(){
        return $this->hasMany('App\Appointment');
    }

    public static function getPossibleEnumValues($name){

        $instance = new static; // create an instance of the model to be able to get the table name
        $type = DB::select( DB::raw('SHOW COLUMNS FROM '.$instance->getTable().' WHERE Field = "'.$name.'"') )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = [];
        foreach(explode(',', $matches[1]) as $value){
            $v = trim( $value, "'" );
            //$enum[] = $v;
            array_push($enum, $v);
        }
        return array_combine($enum, $enum);
    }

    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }

    
}
