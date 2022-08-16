<?php

namespace ITHilbert\CookieDisclaimer;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class CookieDisclaimerServiceProvider extends ServiceProvider
{

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerViews();
        $this->publishAssets();
        $this->registerConfig();
        $this->registerTranslations();
        $this->registerRoutes();

        /*
        $this->registerCommands();
        $this->registerFactories();
        */
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__ .'/Resources/views', 'cookiedisclaimer');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ .'/Resources/lang', 'cookiedisclaimer');
    }



    /**
     * Register commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        /* $this->commands( \ITHilbert\Site\App\Console\Commands\Command::class ); */

    }

    /**
     * Middlewares
     *
     * @return void
     */
    public function registerMiddleware(){
        /* $this->app['router']->aliasMiddleware('MiddlewareName' , \ITHilbert\SITE\Http\Middleware\MiddlewareName::class); */
    }


    /**
     * Assets kopieren
     *
     * @return void
     */
    public function publishAssets()
    {
        /* $this->publishes([
            __DIR__ .'/Resources/js/cookiedisclaimer.js' => public_path('js/cookiedisclaimer.js'),
        ]); */

        /* $this->publishes([
            __DIR__ .'/Resources/js' => resource_path('js/cookiedisclaimer'),
        ]);

        $this->publishes([
            __DIR__ .'/Resources/views' => resource_path('views/vendor/cookiedisclaimer'),
        ]); */
    }


    /**
     * Register Routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        //$this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       /*  $this->app->register(RouteServiceProvider::class); */
       /* $this->registerBladeExtensions(); */
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ .'/Config/cookiedisclaimer.php' => config_path('cookiedisclaimer.php')
        ]);
    }





    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        /* if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
        } */
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }


    /**
     * Eigende Blade function (Directive)
     *
     * @return void
     */
    protected function registerBladeExtensions()
    {
        /* $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {

            $bladeCompiler->directive('hasRole', function ($arguments) {
                list($role, $guard) = explode(',', $arguments.',');

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
            });
            $bladeCompiler->directive('endhasRole', function () {
                return '<?php endif; ?>';
            });

        }); */
    }
}
