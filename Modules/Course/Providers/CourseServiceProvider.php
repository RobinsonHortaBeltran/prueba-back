<?php

namespace Modules\Course\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Course\Contracts\CourseEntityRepository;
use Modules\Course\Repositories\CourseEntityRepository as CourseEntityRepositoryMaster;

/**
 * En: Service provider of the module.
 * Es: Proveedor de servicios del módulo.
 *
 * @package CourseServiceProvider
 */
class CourseServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected string $moduleName = 'Course';

    /**
     * @var string $moduleNameLower
     */
    protected string $moduleNameLower = 'course';

    /**
     * En: All of the container bindings that should be registered.
     * Es: Todas las fijaciones de contenedores que deben registrarse.
     *
     * @var array
     */
    public array $bindings = [
        CourseEntityRepository::class => CourseEntityRepositoryMaster::class
    ];

    /**
     * En: Boot the application events.
     * Es: Arranque los eventos de la aplicación.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * En: Register the service provider.
     * Es: Registrar el proveedor de servicios.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * En: Register config.
     * Es: Registrar configuración.
     *
     * @return void
     */
    protected function registerConfig(): void
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }

    /**
     * En: Register translations.
     * Es: Registrar traducciones.
     *
     * @return void
     */
    public function registerTranslations(): void
    {
        /** @noinspection DuplicatedCode */
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);
        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * En: Get the services provided by the provider.
     * Es: Obtener los servicios proporcionados por el proveedor.
     *
     * @return array
     */
    public function provides(): array
    {
        return [];
    }
}
