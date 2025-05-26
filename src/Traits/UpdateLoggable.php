<?php

namespace Sardorbek\ModelLog\Traits;

use Sardorbek\ModelLog\Services\ModelLogService;

trait UpdateLoggable
{
    public static function bootUpdateLoggable(): void
    {
        static::updating(function ($model) {
            $dirty = $model->getDirty();
            $original = $model->getOriginal();
            new ModelLogService($model, $original, $dirty);
        });
    }
}