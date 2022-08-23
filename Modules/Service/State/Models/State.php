<?php

namespace Service\State\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Service\City\Models\City;

class State extends Model
{
    use HasFactory;
    /**
     * define Region table.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * soft Delete Region.
     *
     * @var bool
     */
    protected $softDelete = true;

    /**
     * confirmation status Region
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

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    /**
     * define States casts.
     *
     * @var string[]
     */
    protected $casts = [
        'name'=>'string',
        'created_at'=>'timestamp',
        'updated_at'=>'timestamp',
    ] ;

    /**
     * Get all of the Attribute for the City.
     *
     * @return HasMany
     */
    public function city(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
