<?php

use App\Models\Product;
use App\Models\Category;
use Tests\TestCase;

uses(TestCase::class);

test('it can create a product', function () {
    $productData = [
        'sku' => 'ABC123',
        'name' => 'Car',
        'price' => 100,
        'stock' => 50,
    ];

    $product = Product::create($productData);

    expect($product->sku)->toBe($productData['sku']);
    expect($product->name)->toBe($productData['name']);
    expect($product->price)->toBe($productData['price']);
    expect($product->stock)->toBe($productData['stock']);
});

test('it has a category relationship', function () {
    $product = Product::factory()->create();
    
    expect($product->category)->toBeInstanceOf(Category::class);
});
