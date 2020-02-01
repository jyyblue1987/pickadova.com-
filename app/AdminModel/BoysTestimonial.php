<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class BoysTestimonial extends Model
{
 
    
     /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $table = "boys_testimonial";
	protected $guarded = ['id', 'created_at'];

}
