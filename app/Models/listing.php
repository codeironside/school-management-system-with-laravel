<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
      use HasFactory;
      protected $fillable = ['title', 'logo', 'company', 'location', 'website', 'email', 'description', 'tags', 'user_id'];
      public function scopeFilter($query, $filters)
      {
            if ($filters['tag'] ?? false) {
                  $query->where('tags', 'like', '%' . request('tag') . '%');
            }
            ;
            if ($filters['search'] ?? false) {
                  $query->where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%')->orWhere('tags', 'like', '%' . request('search') . '%');
            }
            ;
      }

      //Relationship to user

      public function user()
      {
            return $this->belongsTo(User::class, 'user_id');
      }
}
