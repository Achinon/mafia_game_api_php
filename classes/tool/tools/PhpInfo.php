<?php

namespace tools;

class phpInfo extends ToolsBase {
    /**
     * @return void
     */
    public function use() : void
    {
        echo '<pre>' . PHP_EOL;
        phpinfo();
        echo PHP_EOL . '</pre>';
    }
}