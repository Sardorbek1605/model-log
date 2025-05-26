<?php

namespace Sardorbek\ModelLog\Services;

use Sardorbek\ModelLog\Interfaces\ModelLogInterface;
use Sardorbek\ModelLog\Models\ModelLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ModelLogService implements ModelLogInterface
{
    public $model_name;
    public $model_id;
    public $before;
    public $after;

    public function __construct(Model $model, array $original, array $dirty)
    {
        $this->model_name = $model::class;
        $this->model_id = $model->id ?? null;
        $this->before = $original;
        $this->after = $dirty;

        return $this->createLog();
    }

    public function makeMessage()
    {
        $message = "Change ";
        $array_keys = array_keys($this->before);
        $change_item = 0;
        foreach ($array_keys as $key) {
            $comma = $change_item > 0 ? ', ' : '';
            $message .= $comma . $key . ' => from ' . $this->before[$key] . ' to ' . $this->after[$key];
            $change_item++;
        }
        return $message . " changed";
    }

    public function createLog()
    {
        return ModelLog::create([
            'model_name' => $this->model_name,
            'model_id' => $this->model_id,
            'user_id' => Auth::check() ? Auth::id() : null,
            'message' => $this->makeMessage(),
            'ip' => Request::ip() ?? null,
            'before' => $this->before,
            'after' => $this->after,
        ]);
    }
}
