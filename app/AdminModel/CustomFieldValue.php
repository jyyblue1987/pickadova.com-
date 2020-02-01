<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class CustomFieldValue extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "custom_field_value";
	protected $guarded = ['id', 'created_at'];

}
