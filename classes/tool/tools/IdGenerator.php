<?php

namespace tools;

class idGenerator extends ToolsBase{
    /**
     * @var int
     */
    private int $length = 21;
    /**
     * @var bool
     */
    private bool $hex = false;

    /**
     * @param int $length
     * @return idGenerator
     */
    public function setLength(int $length): self
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @param bool $hex
     * @return idGenerator
     */
    public function setHex(bool $hex): self
    {
        $this->hex = $hex;
        return $this;
    }

    /**
     * @return string
     */
    public function use() : string
    {
        $characters = $this->hex ?
            '0123456789abcdef':
            '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}