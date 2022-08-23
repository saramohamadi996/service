<?php

namespace Service\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Service\Attribute\Models\Attribute;
use Service\Item\Models\Item;

class OrderItem extends Model
{
    use HasFactory;
    /**
     *  Get the Attribute that owns the Order Item.
     *
     * @return BelongsTo
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     *  Get the Item that owns the Order Item.
     *
     * @return BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
