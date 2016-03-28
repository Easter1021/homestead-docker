<?php 

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

/**
 * Class ResponseMacroServiceProvider
 */
class ResponseMacroServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('taker', function ($value) use ($factory) {
            // 取得 API
            if(request()->route()->getPrefix() == '/api') {
                unset($value['view']);
                return response()->json((request()->format)? ['data'=>$value] : $value);
            }
            // view option
            if(array_key_exists('view', $value))
                return $factory->make(view($value['view'], $value));
            // redirect option
            if(array_key_exists('redirect', $value))
                return $factory->make(view($value['view'], $value));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}