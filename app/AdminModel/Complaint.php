<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "complaints";
	protected $guarded = ['id', 'created_at'];

}
