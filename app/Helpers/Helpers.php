<?php

if (!function_exists('getUniqueNumber')) {
    function getUniqueNumber(Illuminate\Database\Eloquent\Model $model, string $column): string
    {
        $timestamp = now()->timestamp;

        while (true) {
            $number = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            if (!$model->where($column, $number)->exists()) return $number;

            if (now()->timestamp - $timestamp > 5) throw App\Exceptions\RequestTimeoutException::message();
        }
    }
}
