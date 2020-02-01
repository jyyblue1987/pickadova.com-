<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "custom_field";
	protected $guarded = ['id', 'created_at'];

}
