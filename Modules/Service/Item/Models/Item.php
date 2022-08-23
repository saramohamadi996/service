<?php

namespace Service\Item\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Attribute\Models\Attribute;
use Service\Order\Models\Order;

class Item extends Model
{
    use HasFactory;
    /**
     * define City table.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * soft Delete City.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * confirmation status City
     */
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';
    const STATUS_WAITING = 'waiting';
    static $statuses =
        [self::STATUS_ACCEPTED,
            self::STATUS_WAITING,
            self::STATUS_REJECTED
        ];

    /**define Order fallible fields.
     *
     * @var string[]
     */
    protected $fillable = ['id', 'title', 'amount',
        'attribute_id', 'created_at', 'updated_at'];

    /**
     * define Items casts.
     *
     * @var string[]
     */
    protected $casts = [
        'title'=>'string',
        'amount'=>'integer',
        'attribute_id'=>'integer',
        'created_at'=>'timestamp',
        'updated_at'=>'timestamp',
    ] ;

    /**
     * Get the City that owns the Attribute.
     *
     * @return BelongsTo
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
