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

    /** override */
    protected function viewComp()
    {
        $data = [];

        // base url
        $config = $this->app['config']->get('mediaManager');
        $url    = $this->app['filesystem']
                    ->disk($config['storage_disk'])
                    ->url('/');

        $data['base_url'] = preg_replace('/\/+$/', '/', $url);
        $data['asset_path'] = 'MediaManager';

        // upload panel bg patterns
        $pattern_path = public_path('MediaManager/patterns');

        if ($this->file->exists($pattern_path)) {
            $patterns = collect(
                $this->file->allFiles($pattern_path)
            )->map(function ($item) {
                $name = str_replace('\\', '/', $item->getPathName());

                return preg_replace('/.*\/patterns/', '/MediaManager/patterns', $name);
            });

            $data['patterns'] = json_encode($patterns);
        }

        // share
        view()->composer('MediaManager::_manager', function ($view) use ($data) {
            $view->with($data);
        });
    }
}
