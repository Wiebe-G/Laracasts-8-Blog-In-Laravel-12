<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedbackReply extends Model
{
    protected $table = 'feedback_reply';
	protected $fillable = ['feedback_id', 'user_id', 'message'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
