<?php

declare(strict_types=1);

namespace Muleta\Traits\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Muleta\Utils\Extratores\ClasserExtractor;
use Muleta\Utils\Extratores\FileExtractor;
use Route;

trait ConsoleTools
{
    protected function getNamePackage($name)
    {
        $returnName = '';
        $names = explode('-', $name);
        foreach ($names as $newName) {
            $returnName .= ucfirst($newName);
        }
        return $returnName;
    }
    
    protected function loadRoutesForRiCa($path)
    {
        if (!config('siravel.packagesRoutes', true)) {
            return ;
        }
        Route::group(['middleware' => ['web']], function () use ($path) {
            Route::group(
                [
                    'namespace' => '\\'.$this->getNamePackage($this->packageName).'\Http\Controllers',
                    'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.main', ''),
                ],
                function ($router) use ($path) {
                    if (file_exists($path.'/web.php')) {
                        include $path.'/web.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/web');
                    }
                }
            );
            
            Route::group(
                [
                    'namespace' => '\\'.$this->getNamePackage($this->packageName).'\Http\Controllers\User',
                    'middleware' => 'user',
                    'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.user', 'profile'),
                    'as' => 'profile.'.$this->packageName.'.',
                ],
                function ($router) use ($path) {
                    if (file_exists($path.'/user.php')) {
                        include $path.'/user.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/user');
                    }
                    if (file_exists($path.'/profile.php')) {
                        include $path.'/profile.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/profile');
                    }
                }
            );
            
            Route::group(
                [
                    'namespace' => '\\'.$this->getNamePackage($this->packageName).'\Http\Controllers\Client',
                    'middleware' => 'client',
                    'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.client', 'client'),
                    'as' => 'client.'.$this->packageName.'.',
                ],
                function ($router) use ($path) {
                    if (file_exists($path.'/client.php')) {
                        include $path.'/client.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/client');
                    }
                }
            );
            
            Route::group(
                [
                    'namespace' => '\\'.$this->getNamePackage($this->packageName).'\Http\Controllers\Painel',
                    'middleware' => 'painel',
                    'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.painel', 'painel'),
                    'as' => 'painel.'.$this->packageName.'.',
                ],
                function ($router) use ($path) {
                    if (file_exists($path.'/painel.php')) {
                        include $path.'/painel.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/painel');
                    }
                }
            );

            Route::group(
                [
                    'namespace' => '\\'.$this->getNamePackage($this->packageName).'\Http\Controllers\Master',
                    'middleware' => 'master',
                    'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.master', 'master'),
                    'as' => 'master.'.$this->packageName.'.',
                ],
                function ($router) use ($path) {
                    if (file_exists($path.'/master.php')) {
                        include $path.'/master.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/master');
                    }
                }
            );

            Route::group(
                [
                    'namespace' => '\\'.$this->getNamePackage($this->packageName).'\Http\Controllers\Admin',
                    'middleware' => 'admin',
                    'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.admin', 'admin'),
                    'as' => 'admin.'.$this->packageName.'.',
                ],
                function ($router) use ($path) {
                    if (file_exists($path.'/admin.php')) {
                        include $path.'/admin.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/admin');
                    }
                }
            );
            
            Route::group(
                [
                    'namespace' => '\\'.$this->getNamePackage($this->packageName).'\Http\Controllers\RiCa',
                    'middleware' => 'rica',
                    'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.rica', 'rica'),
                    'as' => 'rica.'.$this->packageName.'.',
                ],
                function ($router) use ($path) {
                    if (file_exists($path.'/rica.php')) {
                        include $path.'/rica.php';
                    } else {
                        $this->loadRoutesFromPath($path.'/rica');
                    }
                }
            );
        });
    }

    /**
     * @param  string $path
     * @return $this
     */
    private function loadRoutesFromPath($path)
    {
        if (!file_exists($path = $path.'/')) {
            return $this;
        }
        
        collect(scandir($path))
            ->each(
                function ($item) use ($path) {
                    if (in_array($item, ['.', '..'])) {
                        return;
                    }
                
                    if (is_dir($path . $item)) {
                        $commands = array_merge(
                            $commands,
                            $this->loadRoutesFromPath($path . $item)
                        );
                    }

                    if (is_file($path . $item)) {
                        include $path . $item;
                    }
                }
            );
        return $this;
    }

    /**
     * Publish package migrations.
     *
     * @return void
     */
    protected function publishesMigrations(string $package, bool $isModule = false): void
    {
        $namespace = str_replace('laravel-', '', $package);
        $namespace = str_replace(['/', '\\', '.', '_'], '-', $namespace);
        $basePath = $isModule ? $this->app->path($package)
            : $this->app->basePath('vendor/'.$package);

        if (file_exists($path = $basePath.'/database/migrations')) {
            $stubs = $this->app['files']->glob($path.'/*.php.stub');
            $existing = $this->app['files']->glob($this->app->databasePath('migrations/'.$package.'/*.php'));

            $migrations = collect($stubs)->flatMap(
                function ($migration) use ($existing, $package) {
                    $sequence = mb_substr(basename($migration), 0, 2);
                    $match = collect($existing)->first(
                        function ($item, $key) use ($migration, $sequence) {
                            return mb_strpos($item, str_replace(['.stub', $sequence], '', basename($migration))) !== false;
                        }
                    );

                    return [$migration => $this->app->databasePath('migrations/'.$package.'/'.($match ? basename($match) : date('Y_m_d_His', time() + $sequence).str_replace(['.stub', $sequence], '', basename($migration))))];
                }
            )->toArray();

            $this->publishes($migrations, $namespace.'-migrations');
        }
    }

    /**
     * Publish package config.
     *
     * @return void
     */
    protected function publishesConfig(string $package, bool $isModule = false): void
    {
        $namespace = str_replace('laravel-', '', $package);
        $namespace = str_replace(['/', '\\', '.', '_'], '-', $namespace);
        $basePath = $isModule ? $this->app->path($package)
            : $this->app->basePath('vendor/'.$package);

        if (file_exists($path = $basePath.'/config/config.php')) {
            $this->publishes([$path => $this->app->configPath(str_replace('-', '.', $namespace).'.php')], $namespace.'-config');
        }
    }

    /**
     * Publish package views.
     *
     * @return void
     */
    protected function publishesViews(string $package, bool $isModule = false): void
    {
        $namespace = str_replace('laravel-', '', $package);
        $namespace = str_replace(['/', '\\', '.', '_'], '-', $namespace);
        $basePath = $isModule ? $this->app->path($package)
            : $this->app->basePath('vendor/'.$package);

        if (file_exists($path = $basePath.'/resources/views')) {
            $this->publishes([$path => $this->app->resourcePath('views/vendor/'.$package)], $namespace.'-views');
        }
    }

    /**
     * Publish package lang.
     *
     * @return void
     */
    protected function publishesLang(string $package, bool $isModule = false): void
    {
        $namespace = str_replace('laravel-', '', $package);
        $namespace = str_replace(['/', '\\', '.', '_'], '-', $namespace);
        $basePath = $isModule ? $this->app->path($package)
            : $this->app->basePath('vendor/'.$package);

        if (file_exists($path = $basePath.'/resources/lang')) {
            $this->publishes([$path => $this->app->resourcePath('lang/vendor/'.$package)], $namespace.'-lang');
        }
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        // Register artisan commands
        foreach ($this->commands as $key => $value) {
            $this->app->singleton($value, $key);
        }

        $this->commands(array_values($this->commands));
    }

    /**
     * Register console commands.
     *
     * @return void
     */
    protected function registerCommandFolders($folders): void
    {
        // if (!$folders) {
        //     $folders = $this->commandFolders;
        // }
        // if (is_string($folders)) {
        //     $folders = [$folders];
        // }

        $commands = [];

        if (empty($folders)) {
            return ;
        }

        // Register artisan commands
        foreach ($folders as $key => $value) {
            if (file_exists($key) && is_dir($key)) {
                $commands = array_merge(
                    $commands,
                    $this->loadCommandsFromPath($key, $value)
                );
            }
        }
        $this->commands(array_values($commands));
    }

    /**
     * @param  string $path
     * @return $this
     */
    private function loadCommandsFromPath($path, $namespace)
    {
        $path = $path.'/';
        $commands = [];
        
        if (!file_exists($path) && !is_dir($path)) {
            return false;
        }

        collect(scandir($path))
            ->each(
                function ($item) use ($path, $namespace, &$commands) {
                    if (in_array($item, ['.', '..'])) {
                        return;
                    }
                
                    if (is_dir($path . $item)) {
                        $commands = array_merge(
                            $commands,
                            $this->loadCommandsFromPath($path . $item, $namespace.'\\'.ucfirst($item))
                        );
                    }

                    if (is_file($path . $item)) {
                        $item = str_replace('.php', '', $item);
                        $classNamespace = $namespace.'\\'.ucfirst($item);
                        if (class_exists($classNamespace)) {
                            $commands[] = $classNamespace;
                        }
                    }
                }
            );
        return $commands;
    }

    private function loadCommandsFromAppPath($path)
    {
        $realPath = app_path($path);
        $commands = [];
        
        collect(scandir($realPath))
            ->each(
                function ($item) use ($path, $realPath) {
                    if (in_array($item, ['.', '..'])) {
                        return;
                    }

                    if (is_dir($realPath . $item)) {
                        $this->loadCommandsFromAppPath($path . $item . '/');
                    }

                    if (is_file($realPath . $item)) {
                        $item = str_replace('.php', '', $item);
                        $class = str_replace('/', '\\', "Facilitador\\{$path}$item");

                        if (class_exists($class)) {
                            $commands[] = $class;
                        }
                    }
                }
            );
    }



    /**
     * Configs Paths
     */
    protected function getResourcesPath($folder)
    {
        return $this->getPackageFolder().'/../resources/'.$folder;
    }

    protected function getPublishesPath($folder)
    {
        return $this->getPackageFolder().'/../publishes/'.$folder;
    }

    protected function getDistPath($folder)
    {
        return $this->getPackageFolder().'/../dist/'.$folder;
    }

    private function getPackageFolder()
    {
        return FileExtractor::getFolderPathFromFile(ClasserExtractor::getFileFromClass($this));
    }


    /**
     * Load Alias and Providers
     */
    private function setProviders()
    {
        $this->setDependencesAlias();
        (new Collection(static::$providers))->map(
            function ($provider) {
                if (class_exists($provider)) {
                    $this->app->register($provider);
                }
            }
        );
    }
    private function setDependencesAlias()
    {
        $loader = AliasLoader::getInstance();
        (new Collection(static::$aliasProviders))->map(
            function ($class, $alias) use ($loader) {
                $loader->alias($alias, $class);
            }
        );
    }
}
