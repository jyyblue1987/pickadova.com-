<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "packages";
	protected $guarded = ['id', 'created_at'];

}
