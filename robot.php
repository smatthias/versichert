<?php

class roboter
{
    private $argv;

    private $headTo = null;

    private $location;

    private $size = [
        8,
        8,
    ];

    public function __construct($argv)
    {
        $this->argv = $argv;

        $this->execute($argv);
    }

    private function execute($argv)
    {
        foreach ($argv as $arg) {
            switch ($arg) {
                case  is_numeric($arg):
                    $this->move($arg);
                    break;
                case (strpos($arg, ',') !== false):
                    $this->placement($arg);
                    break;
                case  is_string($arg):
                    $this->heading($arg);
                    break;
            }
        }
        echo 'location:' . implode(',', $this->location) . PHP_EOL;
    }

    private function heading($args)
    {
        $this->headTo = $args;
    }

    private function move($args)
    {
        for ($i = 0; $i < $args; $i++){
            if ($this->headTo === 'N') {
                if ($this->location[1] + 1 > $this->size[1]) {
                    echo 'off field size';
                    return;
                } else {
                    $this->location[1] = $this->location[1] + 1;
                }
            }

            if ($this->headTo === 'O') {
                if ($this->location[0] + 1 > $this->size[0]) {
                    echo 'off field size';
                    return;
                } else {
                    $this->location[0] = $this->location[0] + 1;
                }
            }

            if ($this->headTo === 'S') {
                if ($this->location[1] - 1 < 0) {
                    echo 'off field size';
                    return;
                } else {
                    $this->location[1] = $this->location[1] - 1;
                }
            }

            if ($this->headTo === 'W') {
                if ($this->location[0] - 1 < 0) {
                    echo 'off field size';
                    return;
                } else {
                    $this->location[0] = $this->location[0] - 1;
                }
            }
        }

    }

    private function placement($args)
    {
        if ($args[0] > $this->size[0]) {
            echo 'off field size';
            return;
        }
        if ($args[1] > $this->size[1]) {
            echo 'off field size';
            return;
        }
        $this->location = explode(',', $args);
    }
}

new roboter($argv);
