<?php

namespace Libraries;

class AppLoader
{
    public static function load(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $loader = new self;
        $loader->loadAutoLoad();
        $loader->loadDatabaseDriver(env('DATABASE_DRIVER'));
        $loader->loadRequest();
        $loader->loadModels();
        $loader->loadHttp();
        $loader->loadRedirectResponse();
        $loader->loadClient();
    }

    private function loadClient(): void
    {
        require_once asset('Libraries/Client/Client.php');
    }

    private function loadRedirectResponse(): void
    {
        $this->loadFiles('Libraries/Response/HttpResponse');
        require_once asset('Libraries/Response/Response.php');
        require_once asset('Libraries/Redirect/Route.php');
    }

    private function loadHttp(): void
    {
        require_once asset('App/Http/Controllers/Controller.php');
    }

    private function loadModels(): void
    {
        require_once asset('Libraries/database_drivers/Model.php');
        $this->loadFiles('App/Models');
    }

    private function loadRequest(): void
    {
        $this->loadFiles('Libraries/Request');
        require_once asset('Libraries/Request/Form/FormRequest.php');
    }

    private function loadDatabaseDriver($driver): void
    {
        require_once asset('Libraries/database_drivers/'.$driver.'/Builder.php');
        require_once asset('Libraries/database_drivers/BaseBuilder.php');
        require_once asset('Libraries/database_drivers/'.$driver.'/Query.php');
        require_once asset('Libraries/database_drivers/'.$driver.'/DB.php');
    }

    private function loadAutoLoad(): void
    {
        $path = asset('vendor/autoload.php');
        if (file_exists($path)) {
            require_once $path;
        }
    }

    private function loadFiles($folder): void
    {
        $path = asset($folder);
        if (is_dir($path)) {
            $files = scandir($path);
            foreach ($files as $file) {
                $file_path = asset($folder.'/'.$file);
                if (is_file($file_path)) {
                    require_once $file_path;
                }
            }
        }
    }
}