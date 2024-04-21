<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'tags',
        'banner_path',
        'description',
    ];

    public function listable()
    {
        return $this->morphTo();
    }

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
        return $this->belongsTo(User::class, 'listable_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'listable_id', 'id');
    }
}
