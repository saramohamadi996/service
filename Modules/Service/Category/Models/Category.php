<?php

namespace Service\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Service\Models\Order;

class Category extends Model
{
    /**
     * define Categories table.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * soft Delete Category.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**define Categories fallible fields.
     *
     * @var string[]
     */
    protected $fillable= ['id', 'title', 'slug', 'image', 'path', 'depth',
        'description', 'parent_id', 'created_at', 'updated_at'];

    /**
     * define Categories casts.
     *
     * @var string[]
     */
    protected $casts = [
        'title'=>'string',
        'slug'=>'string',
        'image'=>'string',
        'path'=>'string',
        'depth'=>'string',
        'description'=>'string',
        'parent_id'=>'integer',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ] ;

    /**
     * Show Categories Parent.
     *
     * @return string
     */
    public function showCategoriesParent(): string
    {
        $parentStr = '';
        if ($this->path)
        {
            $parents = explode('-', $this->path);
            $parents = array_reverse($parents);
            foreach ($parents as $key=>$parent)
                {
                $category = Category::find($parent);
                $parentStr.= $category->title ."/";
            }
        }
        $parentStr.= $this->title;
        return $parentStr;
    }

    /**
     * Get the parent Category that owns the Category.
     *
     * @return BelongsTo
     */
    public function parentCategory():BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the sub Category that for the Category.
     *
     * @return hasMany
     */
    public function subCategories():hasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Get all of the Services for the Category.
     * @return HasMany
     */
    public function services():hasMany
    {
        return $this->hasMany(Order::class);
    }
}
