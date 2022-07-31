<?php

namespace tools;

class Timestamp extends ToolsBase {
    /**
     * @var TimestampType
     */
    private TimestampType $type = TimestampType::ms;

    /**
     * @param TimestampType $type
     * @return $this
     */
    public function setType(TimestampType $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function use(): int
    {
        return match ($this->type){
            TimestampType::ms => (int)floor($_SERVER['REQUEST_TIME_FLOAT'] * 1000),
            TimestampType::s => $_SERVER['REQUEST_TIME']
        };
    }
}

enum TimestampType {
    case ms;
    case s;
}