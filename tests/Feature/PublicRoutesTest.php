<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);test('home page returns a successful response', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('advocates index page returns a successful response', function () {
    $response = $this->get('/advocates');
    $response->assertStatus(200);
});

test('news index page returns a successful response', function () {
    $response = $this->get('/news');
    $response->assertStatus(200);
});

test('contact page returns a successful response', function () {
    $response = $this->get('/contact');
    $response->assertStatus(200);
});
