<?php

namespace MediaManager\Providers;

use ctf0\MediaManager\MediaManagerServiceProvider as ctf0ServiceProvider;

class PackageServiceProvider extends ctf0ServiceProvider
{
    public function boot()
    {
        $this->file = $this->app['files'];

        // $this->packagePublish();
        $this->socketRoute();
        $this->viewComp();
        $this->command();
    }
}
