<?php

namespace Appzcoder\LaravelPackageDiscovery;

use Composer\Script\Event;

class ComposerScripts
{
    public static function postDump(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require_once $vendorDir . '/autoload.php';

        $installedPackages = [];

        if (file_exists($path = $vendorDir . '/composer/installed.json')) {
            $installedPackages = json_decode(file_get_contents($path), true);
        }

        $discoverPackages = [];

        foreach ($installedPackages as $package) {
            if (!empty($package['extra']['laravel'])) {
                $packageInfo = $package['extra']['laravel'];

                $discoverPackages[$package['name']] = [];

                if (!empty($packageInfo['providers'])) {
                    $discoverPackages[$package['name']]['providers'] = $packageInfo['providers'];
                }

                if (!empty($packageInfo['aliases'])) {
                    $discoverPackages[$package['name']]['aliases'] = $packageInfo['aliases'];
                }
            }
        }

        file_put_contents($vendorDir . '/../bootstrap/cache/packages.php', '<?php return ' . var_export($discoverPackages, true) . ';');
    }
}
