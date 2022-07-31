<?php

namespace classes;

class Import {
    static public function files (string $folder): void
    {
        foreach (glob("$folder/*") as $filename)
            self::act($filename);
    }

    private static function act (string $filename): void
    {
        $a = [
            'ignored' => self::isIgnored($filename),
            'hidden' => self::isHidden($filename),
            'php' => self::isPhpFile($filename),
            'folder' => self::isFolder($filename)
        ];

        if(!($a['ignored'] | $a['hidden'])){
            if($a['php'])
                include_once $filename;
            elseif($a['folder'])
                self::files($filename);
        }
    }

    private static function getCleanFilename (string $filename): string
    {
        $a = explode('/', $filename);
        return array_pop($a);
    }

    private static function isPhpFile (string $filename): bool
    {
        $a = explode('.', $filename);
        return strtolower(array_pop($a)) === 'php';
    }

    private static function isFolder (string $filename): bool
    {
        return !str_contains(self::getCleanFilename($filename) ,'.');
    }

    private static function isHidden (string $filename): bool
    {
        $firstChar = $filename[0];
        $secondChar = $filename[1];
        return $firstChar === '.' && $firstChar.$secondChar !== './';
    }

    private static function isIgnored (string $filename): bool
    {
        $filenamesToIgnore = [
            "index.php",
            "Import.php",
            ".env"
        ];

        return in_array(self::getCleanFilename($filename), $filenamesToIgnore);
    }
}