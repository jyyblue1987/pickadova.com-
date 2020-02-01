<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "services";
	protected $guarded = ['id', 'created_at'];

}
