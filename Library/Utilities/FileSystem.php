<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\CoreBundle\Library\Utilities;

use Symfony\Component\Filesystem\Filesystem as Fs;

class FileSystem extends Fs
{
    public function rmdir($path, $recursive = false)
    {
        if (is_dir($path)) {
            if (!$recursive) {
                rmdir($path);
            } else {
                $this->recursiveRemoveDirectory($path);
            }
        }
    }

    //override not supported yet
    public function copyDir($path, $target, $originalPath = '', $originalTarget = '')
    {
        $iterator = new \DirectoryIterator($path);
        if ($originalPath === '') $originalPath = $path;
        if ($originalTarget === '') $originalTarget = $target;

        foreach ($iterator as $el) {
            if (!$el->isDot()) {
                $parts = explode($originalPath, $el->getRealPath());
                $basePath = $parts[1];
                $newPath = $originalTarget . $basePath;

                if ($el->isDir()) {
                    $this->mkdir($newPath);
                    $this->copyDir($el->getRealPath(), $newPath, $originalPath, $originalTarget);
                } else if ($el->isFile()){
                    $this->copy($el->getRealPath(), $newPath);
                }
            }
        }
    }

    private function recursiveRemoveDirectory($dir)
    {
        $it = new \RecursiveDirectoryIterator($dir, \RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);

        foreach ($files as $file) {
            if ($file->isFile()) {
                unlink($file->getRealPath());
            } else {
                rmdir($file->getRealPath());
            }
        }

        if (is_dir($dir)) {
            rmdir($dir);
        } else {
            unlink($dir);
        }
    }
}
