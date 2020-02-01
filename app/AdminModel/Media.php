<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "media";
	protected $guarded = ['id', 'created_at'];

}
