<?php

use App\Models\ApiKey;
use App\Models\Category;
use Faker\Factory as FakerFactory;

uses(Tests\TestCase::class);

it('can create a product', function () {
    $faker = FakerFactory::create();

    $productData = [
        'sku' => $faker->unique()->ean8,
        'name' => $faker->word,
        'price' => $faker->randomNumber(5),
        'stock' => $faker->randomNumber(2),
        'category_id' => Category::factory()->create()->id,
    ];

    $apiKey = ApiKey::first()->key;

    $this->withHeaders([
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'API-KEY' => $apiKey,
    ])->postJson('/api/products', $productData)
        ->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'sku',
                'name',
                'price',
                'stock',
                'category' => [
                    'id',
                    'name',
                ],
                'created_at',
            ],
        ]);

    $this->assertDatabaseHas('products', $productData);
});