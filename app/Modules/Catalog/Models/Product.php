<?php

namespace App\Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


/**
 * @property string name
 * @property int category_id
 * @property string slug
 * @property string price
 * @property string picture_path
 * @property string description
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'price',
        'picture_path',
        'description',
    ];

    public static function getBySlug(string $slug)
    {
        return self::where('slug', $slug)->firstOrFail();
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
