<?php

namespace Service\Order\Models;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Service\Attribute\Models\Attribute;
use Service\Item\Models\Item;
use Service\Service\Models\Service;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    /**
     * define Order table.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * soft Delete Order.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * confirmation status Order
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

    protected $fillable = ['id', 'time', 'date', 'amount', 'digital_verification',
        'user_id', 'address_id', 'specialist_id','created_at','updated_at'];

    /**
     * define Orders casts.
     *
     * @var string[]
     */
    protected $casts = [
        'time'=>'string',
        'date'=>'string',
        'digital_verification'=>'string',
        'amount'=>'float',
        'user_id'=>'integer',
        'address_id'=>'integer',
        'specialist_id'=>'integer',
        'created_at'=>'timestamp',
        'updated_at'=>'timestamp',
    ] ;

    /**
     * Get the Order that owns the User.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the Order that owns the Service.
     *
     * @return BelongsTo
     */
    public function service(): BelongsTo
    {
      return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Get the Order that owns the Address.
     *
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
      return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * Get all of the orderItems for the Order.
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
