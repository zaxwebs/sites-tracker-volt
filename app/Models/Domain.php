<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
	//
	protected $fillable = ['name', 'description'];

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
}
