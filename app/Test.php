<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Slot;

class Test extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';

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
    protected $fillable = ['name', 'code', 'description', 'cost', 'slot'];

    // public function slots(){
    //     return $this->belongsToMany('App\Slot');
    // }

    
}
