<?php

namespace Proya\LaravelMiddlewareTests\Unit\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;
use Proya\Laravel\Middleware\AppVersion;

class AppVersionTest extends TestCase
{
    public function testSmoke()
    {
        $request = new Request();

        $middleware = new AppVersion();
        $response = $middleware->handle($request, fn() => new Response());

        $this->assertEquals('1.0.0', $response->headers->get('App-Version'));
    }
}
