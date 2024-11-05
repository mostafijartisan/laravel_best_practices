# Laravel Best Practices

Here I tried to show best coding structures which we used in day to day laravel development. I learned those things from varous platform and person also. Described below what I did in this project.

### Service class pattern

If you look on UserController and PostController then you will find, I implemented here simple Service class pattern.

-   Controller class : I kept just simple controller logic related code based on Single responsibility principle.
-   Model class : I defined relationship, queryScope etc methods here.
-   Service class: I defined business logic related activity here.
-   View : This project is an API based so I just sent back JSON as response from controller to clients.

### Shortcut where queries filter

In real life project we often run lots of where query in database table. I used a shortut way to do it. writen in below.

#### Here is code snippet from Post.php Modal

```bash
private $filterable = [
    ['column' => 'title', 'queryType' => 'whereLike'],
    ['column' => 'content', 'queryType' => 'whereLike'],
    ['column' => 'status', 'queryType' => 'where'],
];
```

This private array defines the columns that can be used for filtering posts when querying the database.

-   Each item in the array specifies a `column` name and its corresponding `queryType`
-   `whereLike` : Indicates that a "LIKE" query will be used (for partial matches).
-   `where` : Indicates a standard equality check.

```bash
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
```

This method allows for dynamic filtering of posts based on the provided request data.
Parameters

Parameters:

-   `$query` : The Eloquent query builder instance.
-   `$requestAll` : An associative array of request parameters used for filtering.

Functionality:

-   The method loops through the $filterable array to check for each column.
-   If a filter is present in the request and is not empty, the appropriate query type is applied:
    -   For where, it uses a standard equality condition.
    -   For whereLike, it uses a "LIKE" condition for partial matches.
-   This allows for flexible querying based on user inputs, making it easier to filter posts by title, content, and status.
