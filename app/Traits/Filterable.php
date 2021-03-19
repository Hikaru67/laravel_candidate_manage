<?php


namespace App\Traits;


trait Filterable
{
    public function scopeFilter($query, $request)
    {
        $param = $request->all();
        foreach ($param as $field => $value) {
            $method = 'filter' . Str::studly($field);

            if (method_exists($this, $method)) {
                $this->{$method}($query, $value);
            }
        }

        return $query;

    }
}
