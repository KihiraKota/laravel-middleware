<?php

namespace Tests\Unit\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\TestCase;
use Proya\Laravel\Middleware\SetLocale;

class SetLocaleTest extends TestCase
{
    public function testSmoke()
    {
        $result = '';
        App::shouldReceive('setLocale')->andReturnUsing(function ($locale) use (&$result) {
            $result = $locale;
        });

        $request = new Request();
        $request->headers->set('Accept-Language', 'ja-jp');

        $middleware = new class extends SetLocale {
            protected function supportedLanguages(): array
            {
                return ['en', 'ja'];
            }
        };
        $middleware->handle($request, fn() => 'OK');

        $this->assertEquals('ja', $result);
    }
}