<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'location', 'salary', 'description', 'experience', 'category'];
    public static array $experience = [
        'entry' => 'Entry', 
        'intermediate' => 'Intermediate',
        'senior' => 'Senior'
    ]; 
    public static array $category = [
        'IT' => 'IT',
        'Finance' => 'Finance',
        'Sales' => 'Sales',
        'Marketing' => 'Marketing'
    ];

    public function employer(): BelongsTo {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications(): HasMany {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied(Authenticatable|User|int $user): bool {
        return $this->where('id', $this->id)
            ->whereHas('jobApplications', function($query) use ($user){
                $query->where('user_id', '=', $user->id ?? $user);
            })->exists();
    }

}
