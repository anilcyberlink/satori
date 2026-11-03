<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class ExampleTest extends TestCase
{
    public function test_important_cms_routes_are_registered(): void
    {
        $routes = Route::getRoutes();

        $this->assertNotNull(
            $routes->getByName('dashboard'),
            'Admin dashboard route is missing.'
        );

        $this->assertNotNull(
            $routes->getByName('settings.index'),
            'Settings management route is missing.'
        );

        $this->assertNotNull(
            $routes->getByName('trip.index'),
            'Trip management route is missing.'
        );

        $this->assertNotNull(
            $routes->getByName('user.index'),
            'User management route is missing.'
        );
    }
}
