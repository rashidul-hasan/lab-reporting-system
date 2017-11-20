<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Appointment;

class Invoice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'invoices';

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
    protected $fillable = ['appointment_id', 'status', 'amount', 'due_date'];

    public function appointment(){
        return $this->belongsTo('App\Appointment');
    }

    
}
