<?php

namespace App\Helpers;

class SortableHelper
{
    protected $opposite = [
        'asc'  => 'desc',
        'desc' => 'asc'
    ];

    protected $sortIcon = [
        'asc'  => 'fa-sort-down',
        'desc' => 'fa-sort-up'
    ];

    public function generate($column)
    {
        $params   = request()->all();

        $params['sort']  = $this->getSortBy($column)? : 'asc';
        $params['order'] = $column;
        $params['page'] = 1;

        return request()->fullUrlWithQuery($params);
    }


    public function getSortIcon($column)
    {
        if (is_null($this->getSortBy($column))) {
            return 'fa-sort';
        }

        return $this->sortIcon[$this->getSortBy($column)];
    }

    public function getSortBy($column)
    {
        $result = null;
        $sortBy = request()->get('order');
        $order  = request()->get('sort', 'asc');

        if ($sortBy == $column) {
            $result = $this->opposite[$order];
        }

        return $result;
    }
}