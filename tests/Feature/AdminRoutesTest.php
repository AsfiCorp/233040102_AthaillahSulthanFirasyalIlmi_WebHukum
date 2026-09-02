<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guest cannot access admin dashboard', function () {
    $response = $this->get('/admin/dashboard');
    $response->assertRedirect('/login');
});

test('authenticated user can access admin dashboard', function () {
    $user = User::factory()->create();
    
    $response = $this->actingAs($user)->get('/admin/dashboard');
    
    $response->assertStatus(200);
});

test('guest cannot access advocates list', function () {
    $response = $this->get('/admin/advocates');
    $response->assertRedirect('/login');
});

test('guest cannot access news list', function () {
    $response = $this->get('/admin/news');
    $response->assertRedirect('/login');
});
