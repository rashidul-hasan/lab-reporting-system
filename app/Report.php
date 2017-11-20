<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Sample;

class Report extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reports';

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
    protected $fillable = ['sample_id', 'remarks', 'results'];

    public function sample(){
        return $this->belongsTo('App\Sample');
    }

    
}
