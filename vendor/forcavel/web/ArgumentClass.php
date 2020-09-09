<?php

namespace vendor\forcavel\web;

class ArgumentClass
{
    /**
     * @var string[]
     */
    private static $args = [
        'make' => [
            'controller'
        ]
    ];

    /**
     * @param array $cmds
     * @return bool
     */
    public static function ProcessArgument(array $cmds): bool
    {
        $cmd = explode('::', $cmds[1]);
        if (count($cmd) === 3) {
            $func = ucfirst($cmd[0]) . ucfirst($cmd[1]);
        } else {
            throw new \InvalidArgumentException("Your command must have 3 '::' delimiters.");
        }
        if (method_exists(__CLASS__, $func)) {
            return self::$func($cmd[2]);
        }
        throw new \InvalidArgumentException("The function '$func' does not exists.");
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function MakeController(string $name): bool
    {
        echo("Creating controller '$name'... \r\n");
        return true;
    }
}
