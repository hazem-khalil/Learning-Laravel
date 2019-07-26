<?php

namespace App;

class Post extends Model
{
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	// this is additional method that can make refactorization for adding comment 
    // public function addComment($body)
    // {
    // 	$user_id = auth()->id();
    // 	$this->comments()->create(compact('body', 'user_id'));
    // }

	public function scopeFilter($query, $filters)
	{
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', $month);
        }
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
	}

	public static function archives()
	{
		return static::selectRaw('year(created_at) year, month(created_at) month, count(*) publish')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

}
