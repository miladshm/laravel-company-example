<?php

namespace App\Helpers\SeoHelper\src\Http\Middlewares;

use App\Helpers\SeoHelper\Models\Seo;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $path = $request->path();
        $slug = Str::afterLast($path,"/");
        if (!$slug)
            return $response;
        $slug = rawurldecode($slug);
        try {
            $no_indexes = Seo::query()->where('indexing',false)
                ->whereHasMorph('seo','*', function (Builder $q) use ($slug){
                    $q->where('slug', $slug);
                })->count();
            if ($no_indexes)
                $response->header("X-Robots-Tag", "noindex");
        } catch (\Exception $exception){
            echo $exception->getMessage();
        }
        return $response;
    }
}
