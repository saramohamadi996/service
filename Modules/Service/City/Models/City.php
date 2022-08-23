<?php

namespace Service\City\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Region\Models\Region;
use Service\State\Models\State;

class City extends Model
{
    use HasFactory;
    /**
     * define City table.
     *
     * @var string
     */
    protected $table = 'cities';

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
    protected $fillable = ['id', 'name', 'state_id', 'created_at', 'updated_at'];

    /**
     * define Items casts.
     *
     * @var string[]
     */
    protected $casts = [
        'name'=>'string',
        'state_id'=>'integer',
        'created_at'=>'timestamp',
        'updated_at'=>'timestamp',
    ] ;

    /**
     * Get the City that owns the State.
     *
     * @return BelongsTo
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * Get all of the Attribute for the City.
     *
     * @return HasMany
     */
    public function region(): HasMany
    {
        return $this->hasMany(Region::class);
    }
}
