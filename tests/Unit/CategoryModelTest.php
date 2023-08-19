<?php

use App\Models\Category;

it('has complete field', function () {
    $category = new Category([
        'name' => 'Car'
    ]);

    expect($category->name)->toBe('Car');
});