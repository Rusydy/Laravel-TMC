<?php

use App\Models\ApiKey;

uses(Tests\TestCase::class);

it('can create a category', function () {
    $categoryData = [
        'name' => 'Car',
    ];

    $apiKey = ApiKey::first()->key;

    $this->withHeaders([
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'API-KEY' => $apiKey,
    ])->postJson('/api/categories', $categoryData)
        ->assertStatus(201)
        ->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'created_at',
            ],
        ]);

    $this->assertDatabaseHas('categories', $categoryData);
});