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
            $data = array_diff_key($value, ['view'=>1, 'redirect'=>1]);
            // 取得 API
            if(request()->route()->getPrefix() == '/api') {
                return $factory->json((request()->format)? ['data'=>$data] : $data);
            }
            // view option
            else if(array_key_exists('view', $value)) {
                return $factory->view($value['view'], $data);
            }
            // redirect option
            else if(array_key_exists('redirect', $value)) {
                return $factory->redirectTo($value['redirect']);
            }
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