<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "states";
	protected $guarded = ['id', 'created_at'];

}
