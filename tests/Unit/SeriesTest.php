<?php
use App\Models\Series;

uses(Tests\TestCase::class);

test('does not create a series without all data', function () {
    $response = $this->postJson('/api/series', []);
    $response->assertStatus(422);
});

test('can create a series (factory)', function () {
    $attributes = Series::factory()->raw();
    $response = $this->postJson('/api/series', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('series', $attributes);
});

test('create a serie (insert)', function() {
    $response = $this->postJson('/api/series', [
        'series_code' => 597,
        'series_name' => 'Test Serie',
        'series_seasons' => 40,
        'series_episodes' => 20
    ]);
    $response->assertStatus(201);
});

test('create a serie with a existing series_code (insert)', function() {
    $response = $this->postJson('/api/series', [
        'series_code' => 987,
        'series_name' => 'Test Serie 02',
        'series_seasons' => 40,
        'series_episodes' => 20
    ]);
    $response->assertStatus(404);
});

test('does not create a series with a invalid type series_code', function () {
    $response = $this->postJson('/api/series', [
        'series_code' => 'test',
        'series_name' => 'Test Series',
        'series_seasons' => 40,
        'series_episodes' => 20
    ]);
    $response->assertStatus(422);
});

test('does not create a series with a invalid type series_name', function () {
    $response = $this->postJson('/api/series', [
        'series_code' => 598,
        'series_name' => 12313123,
        'series_seasons' => 40,
        'series_episodes' => 20
    ]);
    $response->assertStatus(422);
});

test('does not create a series with a invalid type series_episodes', function () {
    $response = $this->postJson('/api/series', [
        'series_code' => 598,
        'series_name' => 'Test Serie',
        'series_seasons' => 40,
        'series_episodes' => 'vinte'
    ]);
    $response->assertStatus(422);
});

test('does not create a series with a invalid type series_seasons', function () {
    $response = $this->postJson('/api/series', [
        'series_code' => 598,
        'series_name' => 'Test Serie',
        'series_seasons' => 'quarenta',
        'series_episodes' => 20
    ]);
    $response->assertStatus(422);
});
