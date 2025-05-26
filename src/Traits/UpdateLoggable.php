<?php

namespace Dostontiu\ModelLog\Traits;

use Dostontiu\ModelLog\Services\ModelLogService;

trait UpdateLoggable
{
    public static function bootModelUpdateLoggable(): void
    {
        static::updating(function ($model) {
            $dirty = $model->getDirty();
            $original = $model->getOriginal();
            new ModelLogService($model, $original, $dirty);
        });
    }
}