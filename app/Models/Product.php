<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mostafijartisan\WhereFilter\Traits\Filter;

class Product extends Model
{

    use HasFactory, Filter;

    protected $fillable = [
        'name',
        'price',
        'qty',
        'size',
        'color',
        'status',
    ];

    // Define the filters array for where clause
    protected $whereFilters = [
        [
            'request' => 'name',
            'relation' => '',
            'column' => 'name',
            'query' => 'whereLike'
        ],
        [
            'request' => 'price',
            'relation' => '',
            'column' => 'price',
            'query' => 'where'
        ],
        [
            'request' => 'size',
            'relation' => '',
            'column' => 'size',
            'query' => 'where'
        ],
        [
            'request' => 'color',
            'relation' => '',
            'column' => 'color',
            'query' => 'where'
        ],
        [
            'request' => 'status',
            'relation' => '',
            'column' => 'status',
            'query' => 'where'
        ],
        [
            'request' => 'ids',
            'relation' => '',
            'column' => 'id',
            'query' => 'whereIn'
        ],
    ];

}
