<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
 
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "notification";
	protected $guarded = ['id', 'created_at'];

}
