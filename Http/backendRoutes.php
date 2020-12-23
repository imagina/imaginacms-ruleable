<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/ruleable'], function (Router $router) {
    $router->bind('rule', function ($id) {
        return app('Modules\Ruleable\Repositories\RuleRepository')->find($id);
    });
    $router->get('rules', [
        'as' => 'admin.ruleable.rule.index',
        'uses' => 'RuleController@index',
        'middleware' => 'can:ruleable.rules.index'
    ]);
    $router->get('rules/create', [
        'as' => 'admin.ruleable.rule.create',
        'uses' => 'RuleController@create',
        'middleware' => 'can:ruleable.rules.create'
    ]);
    $router->post('rules', [
        'as' => 'admin.ruleable.rule.store',
        'uses' => 'RuleController@store',
        'middleware' => 'can:ruleable.rules.create'
    ]);
    $router->get('rules/{rule}/edit', [
        'as' => 'admin.ruleable.rule.edit',
        'uses' => 'RuleController@edit',
        'middleware' => 'can:ruleable.rules.edit'
    ]);
    $router->put('rules/{rule}', [
        'as' => 'admin.ruleable.rule.update',
        'uses' => 'RuleController@update',
        'middleware' => 'can:ruleable.rules.edit'
    ]);
    $router->delete('rules/{rule}', [
        'as' => 'admin.ruleable.rule.destroy',
        'uses' => 'RuleController@destroy',
        'middleware' => 'can:ruleable.rules.destroy'
    ]);
// append

});
