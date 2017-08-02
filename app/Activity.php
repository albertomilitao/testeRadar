<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;

class Activity extends Model
{
	public $timestamps = false;
	protected $fillable = ['name', 'description', 'start_date', 'end_date', 'status', 'situation'];
}
