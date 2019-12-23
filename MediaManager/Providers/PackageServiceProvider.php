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

    protected function viewComp()
    {
        parent::viewComp();

        $data['patterns'] = $this->getPatterns();
        $data['asset_path'] = 'MediaManager';
        $data['route_prefix'] = 'media.';
        $data['lottie'] = [
            'loading' => $data['asset_path'] . '/lottie/world.json',
            'ajax_error' => $data['asset_path'] . '/lottie/avalanche.json',
            'no_files' => $data['asset_path'] . '/lottie/zero.json',
            'no_search' => $data['asset_path'] . '/lottie/ice_cream.json',
        ];

        // share
        view()->composer('MediaManager::_manager', function ($view) use ($data) {
            $view->with($data);
        });
    }

    protected function getPatterns()
    {
        $resourcePath = 'MediaManager/patterns';
        $pattern_path = public_path($resourcePath);

        if (!$this->file->exists($pattern_path)) {
            return json_encode([]);
        }

        $patterns = collect(
            $this->file->allFiles($pattern_path)
        )->map(function ($item) use ($resourcePath) {
            $name = str_replace('\\', '/', $item->getPathName());

            return preg_replace('/.*\/patterns/', '/' . $resourcePath, $name);
        });

        return json_encode($patterns);
    }
}
