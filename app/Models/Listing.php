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
        'tags'
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
}
