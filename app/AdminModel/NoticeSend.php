<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class NoticeSend extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "notice_send";
	protected $guarded = ['id', 'created_at'];

}
