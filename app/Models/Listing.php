<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company_name',
        'location',
        'website',
        'contact_email',
        'description',
        'tags',
        'logo_path'
    ];

    public function scopeFilter($query, array $filters)
    {
        if (array_key_exists('tag', $filters)) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

        if (array_key_exists('search', $filters)) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                ->orWhere('company_name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');      
    }
}
