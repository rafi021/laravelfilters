<?php

namespace App\Filters;

use App\Filters\AbstractFilter;

class ProductFilter extends AbstractFilter{

    protected $filters = [
        'type' => TypeFilter::class
    ];
}



/* Explation of Filters

I will give you a brief explanation of what I have done to achieve the filtered result.

First, our Filtered page’s URL looks like this: http://127.0.0.1:8000/products?type=Gift

So, the query string is type=Gift. So the type is the key, and Gift is value. That is why we have created a filter called TypeFilter.php.

We are mapping that type to TypeFilter.php class inside the ProductFilter.php file.

So from the ProductController’s index function, we call the model’s filter function and pass the request as an argument.

Now, inside the Product model, we call the ProductFilter’s filter method and pass the Eloquent query builder as an argument.

Next, ProductFilter does not have a direct filter method, but it extends the AbstractFilter class, which has the filter method. So we can use that filter method.

But, ProductFilter has an array of Filters. In our case, it is just TypeFilter, but there are more filters in real-time web applications.

The next step is inside the AbstractFilter.php file; we call the filter function.

So first, we are iterating the filters and mapping the query string key to that filter. Then, if both are matched, we directly instantiate that matched class,
call that class’s method, and pass that query string’s key as an argument.

// AbstractFilter.php

public function filter(Builder $builder)
    {
        foreach($this->getFilters() as $filter => $value)
        {
            $this->resolveFilter($filter)->filter($builder, $value);
        }
        return $builder;
    }

    protected function getFilters()
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
So, the type is associated with TypeFilter.

That is why the TypeFilter.php file’s filter method is called, and it gets a $builder and query string’s value as an argument.
In our case, value is Gift.

So, it returns only the rows that contain type = Gift.

We create the Filter class based on the query string parameter and then call that class’s filter method to filter the result.

It is a bit complicated and easy for you, but once you realize how the flow w you. For this example,
you need to have strong Object Oriented knowledge. Otherwise, it is hard to understand.

Laravel Filters example

So this is our API endpoint that you can consume at the frontend.


*/
