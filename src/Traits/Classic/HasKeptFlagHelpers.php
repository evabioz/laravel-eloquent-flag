<?php

/*
 * This file is part of Laravel Eloquent Flag.
 *
 * (c) CyberCog <support@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cog\Flag\Traits\Classic;

use Carbon\Carbon;
use Cog\Flag\Scopes\Classic\KeptFlagScope;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class HasKeptFlagHelpers.
 *
 * @package Cog\Flag\Traits\Classic
 */
trait HasKeptFlagHelpers
{
    /**
     * Determine if the model instance has `is_kept` state.
     *
     * @return bool
     */
    public function isKept()
    {
        return (bool) $this->is_kept;
    }

    /**
     * Get unkept models that are older than the given number of hours.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param int $hours
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnlyUnkeptOlderThanHours(Builder $builder, $hours)
    {
        return $builder
            ->withoutGlobalScope(KeptFlagScope::class)
            ->where('is_kept', 0)
            ->where(static::getCreatedAtColumn(), '<=', Carbon::now()->subHours($hours)->toDateTimeString());
    }
}
