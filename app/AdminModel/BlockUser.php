<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "block_user";
	protected $guarded = ['id', 'created_at'];

}
