<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
	protected $table 	= 'scores';

    protected $fillable = ['score_actual', 'score_from', 'score_to', 'created_at'];

    public $timestamps = false;
}

