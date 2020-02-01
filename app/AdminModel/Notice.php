<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "notice";
	protected $guarded = ['id', 'created_at'];

}
