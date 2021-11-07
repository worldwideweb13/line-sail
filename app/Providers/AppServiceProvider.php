<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LINE\LINEBot;
use App\Models\LineChannel;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $channelLists = LineChannel::orderBy('created_at', 'asc')->get();
        view()->share('channelLists', $channelLists);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // LINE API first logic
        $this->app->bind('line-bot', function ($app, array $parameters) {
            // $parametersを見て、SECRETとかTOKENをDBとかNoSQLから取ってくることが多い
            return new LINEBot(
                new LINEBot\HTTPClient\CurlHTTPClient($parameters['line_access_token']),
                ['channelSecret' => $parameters['line_channel_secret']]
            );
        });

        // LinePushMessageAPIロジック

    }
}
