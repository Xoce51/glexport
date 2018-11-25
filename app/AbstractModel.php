<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    /**
     * Generic function to filter model
     * 
     * @param array $params The query params
     * @param QueryBuilder $q The query builder entity
     * 
     * @return void
     */
    public function scopeFilter($q, array $params) : void
    {
        $filters = $q->getModel()->getFilters() ?? [];
        foreach ($params as $column => $value) {
            if (in_array($column, $filters)) {
                $q->where($column, $value);
            }
        }
    }

    public function scopeSort($q, ?string $column = null, ?string $direction = 'asc') : void
    {
        if (!$column) {
            return;
        }
        $q->orderBy($column, $direction);
    }
}
