<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //Specifying form fields so they can be filled at once after submitting form
    protected $fillable = ['title', 'company', 'location', 'website', 'email', 'tags', 'description', 'logo', 'user_id'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false)
        {
            //Performing a 'like query' on the 'tags' column in DB. '%' used to specify that anything can be before and after the tag in the url
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false)
        {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }

        if($filters['location'] ?? false)
        {
            $query->where('location', 'like', '%' . request('location') . '%');
        }
    }

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}