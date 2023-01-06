<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ToLowerCase
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if ($request->isJson()) {
            $this->clean($request->json());
        } else {
            $this->clean($request);
        }

        return $next($request);
    }

    /**
    * Clean the request's data.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return void
    */
    private function clean(Request $request)
    {
        $request->replace($this->cleanData($request->all()));
    }

    /**
    * Check the parameters and clean the request
    *
    * @param  array<string, array<string, string>>  $data
    * @return array<string, array<string, string>>
    */
    private function cleanData(array $data): array
    {
        $data = json_encode($data);
        $data = strtolower((string) $data);
        $data = json_decode($data, true);

        return $data;
    }
}
