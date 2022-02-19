<?php

namespace classes;

class Importer {
    const namespace = './classes/';

    /**
     * @return void
     */
    static public function importClasses (): void
    {
        $filenamesToIgnore = [
            self::file('index.php') => '',
            self::file('Importer.php') => ''
        ];
        $filenames = [];

        foreach (glob(self::file('*.php')) as $filename) {
            if(!isset($filenamesToIgnore[$filename]))
                $filenames[] = $filename;
        }

        if(count($filenames) === 0)
            die('error while importing classes');


        foreach ($filenames as $filename)
            include $filename;
    }

    /**
     * @param string $name
     * @return string
     */
    static private function file (string $name): string
    {
        return static::namespace . $name;
    }

    static public function php () {
        echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';
    }
}

