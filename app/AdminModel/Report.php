<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "report";
	protected $guarded = ['id', 'created_at'];

}
