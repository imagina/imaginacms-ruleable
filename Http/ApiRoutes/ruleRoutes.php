<?php

use Illuminate\Routing\Router;

$router->group(['prefix' => '/rules'/*,'middleware' => ['auth:api']*/], function (Router $router) {
    $locale = \LaravelLocalization::setLocale() ?: \App::getLocale();

    $router->get('/fromConfig', [
        'as' => $locale . 'api.ruleable.rule.fromConfig',
        'uses' => 'RuleApiController@fromConfig',
    ]);

    $router->post('/', [
        'as' => $locale . 'api.ruleable.rule.create',
        'uses' => 'RuleApiController@create',
    ]);
    $router->get('/', [
        'as' => $locale . 'api.ruleable.rule.index',
        'uses' => 'RuleApiController@index',
    ]);
    $router->put('/{criteria}', [
        'as' => $locale . 'api.ruleable.rule.update',
        'uses' => 'RuleApiController@update',
    ]);
    $router->delete('/{criteria}', [
        'as' => $locale . 'api.ruleable.rule.delete',
        'uses' => 'RuleApiController@delete',
    ]);
    $router->get('/{criteria}', [
        'as' => $locale . 'api.ruleable.rule.show',
        'uses' => 'RuleApiController@show',
    ]);

});
