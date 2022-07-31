<?php

namespace tools;

class ParseDump extends ToolsBase {
    /**
     * @var array|object
     */
    private array|object $variable;

    /**
     * @var Parses
     */
    private Parses $type;

    /**
     * @param Parses $type
     * @return ParseDump
     */
    public function setType(Parses $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param array|object $variable
     * @return ParseDump
     */
    public function setVariable(array|object $variable): self
    {
        $this->variable = $variable;
        return $this;
    }

    /**
     * @return void
     */
    public function use() : void
    {
        $var = $this->match();

        echo '<pre>' . PHP_EOL;
        print_r($var);
        echo PHP_EOL . '</pre>';
    }

    /**
     * @return bool|array|string
     */
    private function match (): bool|array|string|object
    {
        return match ($this->type) {
            Parses::php => $this->variable,
            Parses::json => json_encode($this->variable)
        };
    }
}

enum Parses {
    case php;
    case json;
}