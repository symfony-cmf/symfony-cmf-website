<?php

namespace AppBundle\Composer;

use Symfony\Component\ClassLoader\ClassCollectionLoader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

/**
 * Post install handler for the cmf website
 *
 * @author David Buchmann
 */
class ScriptHandler
{
    public static function compileSlides($event)
    {
        $extra = $event->getComposer()->getPackage()->getExtra();

        $event->getIO()->write("<info>Compiling slides</info>");

        if (!isset($extra['slippy-source-dir'])) {
            throw new \Exception('Do not run this script without defining slippy-source-dir pointing to the slides directory, relative to the project directory');
        }
        $sourceDir = getcwd() . '/' . $extra['slippy-source-dir'];
        if (!isset($extra['slippy-target-dir'])) {
            throw new \Exception('Do not run this script without defining slippy-target-dir, relative to the project directory');
        }
        $targetDir = getcwd() . '/' . $extra['slippy-target-dir'];

        if (!is_dir($sourceDir)) {
            throw new \Exception("$sourceDir not existing");
        }
        if (!is_dir($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                throw new \Exception("Failed to create $targetDir, please check permissions");
            }
        }
        $files = array();
        foreach (scandir($sourceDir) as $sub) {
            $sub = "$sourceDir/$sub";
            if (!substr_compare($sub, '.html', -5, 5)) {
                $files[] = $sub;
            } elseif (is_dir($sub) && strncmp($sub, '.', 1)) {
                foreach (scandir($sub) as $file) {
                    if ('.' != $file && !substr_compare($file, '.html', -5, 5)) {
                        $files[] = "$sub/$file";
                    }
                }
            }
        }
        if (empty($files)) {
            throw new \Exception("Found no slides in subfolders of $sourceDir");
        }

        $pwd = getcwd();
        chdir('vendor/seld/slippy/src');
        $fs = new Filesystem();

        foreach ($files as $file) {
            $event->getIO()->write("<info>Slide $file</info>");
            // copy all source files into src so that index.php can find them
            foreach (glob(dirname($file) . "/*.*") as $f) {
                $fs->copy($f, basename($f), true);
            }

            // make sure the target file does not exist
            $targetFile = $targetDir . '/' . basename($file);
            if ($fs->exists($targetFile)) {
                $fs->remove($targetFile);
            }

            exec("php index.php $file $targetFile", $output, $status);
            if ($status) {
                throw new \RuntimeException("Compiling failed with $status\n" . implode("\n", $output));
            }
        }
        chdir($pwd);
        $event->getIO()->write("<info>All done</info>");
    }
}
