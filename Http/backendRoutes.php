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
    $router->bind('faqheading', function ($id) {
        return app('Modules\Faq\Repositories\FaqHeadingRepository')->find($id);
    });
    $router->get('faqheadings', [
        'as' => 'admin.faq.faqheading.index',
        'uses' => 'FaqHeadingController@index',
        'middleware' => 'can:faq.faqs.index'
    ]);
    $router->get('faqheadings/create', [
        'as' => 'admin.faq.faqheading.create',
        'uses' => 'FaqHeadingController@create',
        'middleware' => 'can:faq.faqs.create'
    ]);
    $router->post('faqheadings', [
        'as' => 'admin.faq.faqheading.store',
        'uses' => 'FaqHeadingController@store',
        'middleware' => 'can:faq.faqs.create'
    ]);
    $router->get('faqheadings/{faqheading}/edit', [
        'as' => 'admin.faq.faqheading.edit',
        'uses' => 'FaqHeadingController@edit',
        'middleware' => 'can:faq.faqs.edit'
    ]);
    $router->put('faqheadings/{faqheading}', [
        'as' => 'admin.faq.faqheading.update',
        'uses' => 'FaqHeadingController@update',
        'middleware' => 'can:faq.faqs.edit'
    ]);
    $router->delete('faqheadings/{faqheading}', [
        'as' => 'admin.faq.faqheading.destroy',
        'uses' => 'FaqHeadingController@destroy',
        'middleware' => 'can:faq.faqs.destroy'
    ]);
    // append
});
