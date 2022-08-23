<?php

namespace Service\Region\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    /**
     * define Region table.
     *
     * @var string
     */
    protected $table = 'regions';

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

    protected $fillable = ['id', 'name','city_id', 'created_at', 'updated_at'];

    /**
     * define Cities casts.
     *
     * @var string[]
     */
    protected $casts = [
        'name'=>'string',
        'city_id'=>'integer',
        'created_at'=>'timestamp',
        'updated_at'=>'timestamp',
    ] ;

}
