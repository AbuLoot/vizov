<?php

namespace Codehappy\Captcha;

use Illuminate\Support\ServiceProvider;

class CaptchaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->addValidators();
        $this->registerBladeExtensions();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // выполним слияние конфигов проекта и нашего конфига
        $this->mergeConfigFrom(
            __DIR__.'/../config/captcha.php', 'captcha'
        );

        /**
         * добавим наш класс в сервис-контейнер в формате
         * синглтона, потому что единовременно у нас
         * не должно быть больше одного экземляра каптчи в проекте
         */
        $this->app->singleton('captcha', function ($app) {
            return new Captcha($app);
        });
    }

    /**
     * Регистрируем роут
     */
    protected function registerRoutes()
    {
        \Route::get('/captcha', '\Codehappy\Captcha\CaptchaController@getIndex');
    }

    /**
     * Добавляем правило валидации
     * для того, чтобы его можно было использовать 
     * валидатором фремворка
     */
    protected function addValidators()
    {
        \Validator::extendImplicit('captcha', function($attribute, $value, $parameters)
        {
            $captcha = app('captcha');
            return $captcha->check($value);
        }, 'Неверный код с картинки');
    }

    /**
     * Регистрируем расширение для блейда
     * для того, чтобы можно было в шаблоне
     * вызвать каптчу строкой {!!captcha!!}
     */
    protected function registerBladeExtensions()
    {
        \Blade::extend(function ($view) {
            return str_replace('{!! captcha !!}',  '<img src="/captcha/" class="captcha">', $view);
        });
    }
}