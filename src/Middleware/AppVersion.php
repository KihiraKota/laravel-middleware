<?php

namespace Proya\Laravel\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * アプリケーションのバージョンのミドルウェア
 */
class AppVersion
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // header() は ResponseTrait で定義されているので、 method_exists() で判定
        if (method_exists($response, 'header')) {
            $response->header('App-Version', $this->version());
        }

        return $response;
    }

    /**
     * バージョンを返す
     *
     * @return string
     */
    protected function version(): string
    {
        return '1.0.0';
    }
}
