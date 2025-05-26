<?php

namespace Sardorbek\ModelLog\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ModelLogInterface
{
    public function __construct(Model $model, array $original, array $dirty);

    public function makeMessage();

    public function createLog();
}
