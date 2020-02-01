<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class PhotoUnlock extends Model
{
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */

    protected $table = "photo_unlock";
	protected $guarded = ['id', 'created_at'];


}
