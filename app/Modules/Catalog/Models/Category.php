<?php

namespace App\Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


/**
 * @property string name
 * @property string slug
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public static function getBySlug(string $slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }

    public static function findBySlug(?string $slug): ?self
    {
        if ($slug === null) {
            return null;
        }
        return self::where('slug', $slug)->first();
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) && !empty($model->name)) {
                $slug = Str::slug($model->name, '-');
                $originalSlug = $slug;
                $count = 1;

                while (static::where('slug', $slug)->where('id', '<>', $model->id)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }

                $model->slug = $slug;
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
