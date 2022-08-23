<?php

namespace Service\Service\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Attribute\Models\Attribute;
use Service\Category\Models\Category;
use Service\Order\Models\Order;

class Service extends Model
{
    use HasFactory;
    /**
     * define Service table.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * soft Delete Service.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * confirmation status Service
     */
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';
    const STATUS_WAITING = 'waiting';
    static $statuses =
        [self::STATUS_ACCEPTED,
            self::STATUS_WAITING,
            self::STATUS_REJECTED
        ];

    /**define Service fallible fields.
     *
     * @var string[]
     */

    protected $fillable = ['id', 'title', 'slug',
        'description', 'meta_description', 'priority',
        'image', 'base_price', 'approved_price', 'commission',
        'category_id', 'status','created_at','updated_at'
    ];

    /**
     * define Services casts.
     *
     * @var string[]
     */
    protected $casts = [
        'title'=>'string',
        'slug'=>'string',
        'image'=>'string',
        'description'=>'string',
        'meta_description'=>'string',
        'priority'=>'float',
        'commission'=>'integer',
        'category_id'=>'integer',
        'base_price'=>'integer',
        'approved_price'=>'integer',
        'created_at'=>'timestamp',
        'updated_at'=>'timestamp',
    ] ;

    /**
     * Get the Service that owns the Category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
      return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get all of the Services for the Attribute.
     *
     * @return HasMany
     */
    public function attribute(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    /**
     * Get all of the Services for the Order.
     *
     * @return HasMany
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function status($id, string $status)
    {
        return Service::where('id', $id)->update(['status' => $status]);
    }
}
