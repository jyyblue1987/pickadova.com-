<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Transation extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "transation";
	protected $guarded = ['id', 'created_at'];

}
