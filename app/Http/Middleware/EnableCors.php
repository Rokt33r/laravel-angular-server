<?php namespace App\Http\Middleware;

use Closure;

class EnableCors {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: *");
		header('Access-Control-Allow-Headers : X-Requested-With, Content-Type, Authorization');

		return $next($request);
	}

}
