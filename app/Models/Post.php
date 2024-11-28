<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the filterable column name for where
    private $filterable = [
        ['column' => 'title', 'queryType' => 'whereLike'],
        ['column' => 'content', 'queryType' => 'whereLike'],
        ['column' => 'status', 'queryType' => 'where'],
    ];

    // Define the user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A common scope for where filter
    public function scopeFilter($query, array $requestAll)
    {
        foreach ($this->filterable as $filter) {
            $column = $filter['column'];
            $queryType = $filter['queryType'];

            // Check if the filter is present in the request and not empty
            if (isset($requestAll[$column]) && !empty($requestAll[$column])) {

                // Apply the appropriate query based on query type
                switch ($queryType) {
                    case 'where':
                        $query->where($column, $requestAll[$column]);
                        break;
                    case 'whereLike':
                        $query->where($column, 'like', '%' . $requestAll[$column] . '%');
                        break;
                    // We can add more cases here if needed for additional query types
                }
            }
        }
    }


}
