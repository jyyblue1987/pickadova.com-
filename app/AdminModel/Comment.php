<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "comments";
	protected $guarded = ['id', 'created_at'];

}
