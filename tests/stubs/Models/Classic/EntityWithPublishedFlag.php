<?php

/*
 * This file is part of Laravel Eloquent Flag.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cog\Flag\Tests\Stubs\Models\Classic;

use Cog\Flag\Traits\Classic\HasPublishedFlag;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EntityWithPublishedFlag.
 *
 * @package Cog\Flag\Tests\Stubs\Models\Classic
 */
class EntityWithPublishedFlag extends Model
{
    use HasPublishedFlag;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entity_with_published_flag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'bool',
    ];
}
