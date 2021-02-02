<?php

namespace Redbastie\Tailwire\Traits;

use Illuminate\Support\Facades\Hash;

trait HashesPasswords
{
    protected static function bootHashesPasswords()
    {
        static::saving(function ($model) {
            if ($model->password && strlen($model->password) < 60 && strpos($model->password, '$2y$') !== 0) {
                $model->password = Hash::make($model->password);
            }
        });
    }
}
