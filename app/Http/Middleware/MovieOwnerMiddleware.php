<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $movie = $request->route('movie');

        if($movie->user_id != auth()->user()->id){
            return redirect('/movies/my-movies')->with('Error','Not the owner of the movie');
        }

        return $next($request);
    }
}
