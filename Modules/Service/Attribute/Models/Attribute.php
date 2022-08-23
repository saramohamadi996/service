<?php

namespace Service\Attribute\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Item\Models\Item;
use Service\Order\Models\Order;
use Service\Order\Models\OrderItem;
use Service\Service\Models\Service;

class Attribute extends Model
{
    use HasFactory;
    /**
     * define Attribute table.
     *
     * @var string
     */
    protected $table = 'attributes';

    /**
     * soft Delete Attribute.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * confirmation status Attribute
     */
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';
    const STATUS_WAITING = 'waiting';
    static $statuses =
        [self::STATUS_ACCEPTED,
            self::STATUS_WAITING,
            self::STATUS_REJECTED
        ];

    /**
     * confirmation status Order.
     *
     */
    const TYPE_SELECT = 'select';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_INTEGER = 'integer';
    static $types =
        [self::TYPE_SELECT,
            self::TYPE_BOOLEAN,
            self::TYPE_INTEGER
        ];

    /**define Order fallible fields.
     *
     * @var string[]
     */

    protected $fillable = ['id', 'title', 'type', 'service_id', 'created_at', 'updated_at'];

    /**
     * define Attributes casts.
     *
     * @var string[]
     */
    protected $casts = [
        'title'=>'string',
        'type'=>'string',
        'service_id'=>'integer',
        'created_at'=>'timestamp',
        'updated_at'=>'timestamp',
    ] ;

    /**
     * Get the Attribute that owns the Order.
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Get all of the Attribute for the Item.
     *
     * @return HasMany
     */
    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
