<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::observe(PostObserver::class);
//        static::saving(function ($model) {
//            Log::info('Saving from outside of observer');
//        });
    }

    protected $fillable = [
        'title',
        'content',
    ];

//    protected $guarded = [
//        'id',
//        'user_id',
//        'created_at',
//        'updated_at'
//    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst(strtolower($value)),
            set: fn($value) => strtoupper($value),
        );
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'user_post_like')->withTimestamps();
    }
}
