<?php

namespace Proya\Laravel\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

/**
 * ロケールを設定するミドルウェア
 */
class SetLocale
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
        App::setLocale($request->getPreferredLanguage($this->supportedLanguages()));
        return $next($request);
    }

    /**
     * 対応する言語を返す
     *
     * @return string[]
     */
    protected function supportedLanguages(): array
    {
        return ['en'];
    }
}
