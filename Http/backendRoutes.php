<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/faq'], function (Router $router) {
    $router->bind('faq', function ($id) {
        return app('Modules\Faq\Repositories\FaqRepository')->find($id);
    });
    $router->get('faqs', [
        'as' => 'admin.faq.faq.index',
        'uses' => 'FaqController@index',
        'middleware' => 'can:faq.faqs.index'
    ]);
    $router->get('faqs/create', [
        'as' => 'admin.faq.faq.create',
        'uses' => 'FaqController@create',
        'middleware' => 'can:faq.faqs.create'
    ]);
    $router->post('faqs', [
        'as' => 'admin.faq.faq.store',
        'uses' => 'FaqController@store',
        'middleware' => 'can:faq.faqs.create'
    ]);
    $router->get('faqs/{faq}/edit', [
        'as' => 'admin.faq.faq.edit',
        'uses' => 'FaqController@edit',
        'middleware' => 'can:faq.faqs.edit'
    ]);
    $router->put('faqs/{faq}', [
        'as' => 'admin.faq.faq.update',
        'uses' => 'FaqController@update',
        'middleware' => 'can:faq.faqs.edit'
    ]);
    $router->delete('faqs/{faq}', [
        'as' => 'admin.faq.faq.destroy',
        'uses' => 'FaqController@destroy',
        'middleware' => 'can:faq.faqs.destroy'
    ]);
// append

});
