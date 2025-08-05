<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Storage;

/**
 * @property int $id
 * @property string|null $image
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property int $category_id
 * @property int $user_id
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'content',
        //'image',
        'category_id',
        'user_id',
        'published_at'
    ];

    public function registerMediaConversions(?Media $media = null): void 
    {
        $this
            ->addMediaConversion('preview')
            ->width(400);

            $this
            ->addMediaConversion('large')
            ->width(1000);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function readtime()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $readTime = ceil($wordCount / 200); // Assuming average reading speed of 200 words per minute
        return max(1, $readTime) . ' min read';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function claps()
    {
        return $this->hasMany(Clap::class);
    }

    public function imageUrl($conversionName = ''){
         $media = $this->getFirstMedia();
        
        if ($media && $media->hasGeneratedConversion('profile_image')) {
            return $media->getUrl('profile_image');
        }
        
        return $media?->getUrl();
    }
}
