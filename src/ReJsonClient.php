<?php

namespace Ehann\ReJson;

use Ehann\RedisRaw\RedisRawClientInterface;

class ReJsonClient
{
    private $redis;

    public function __construct(RedisRawClientInterface $redis)
    {
        $this->redis = $redis;
    }

    public function set($key, $json, $path = '.'): bool
    {
        return $this->redis->rawCommand('JSON.SET', [$key, $path, $json]);
    }

    public function get($key, $path = '.', $indent = '\t', $newline = '\n', $space = ' ', $shouldEscape = false): string
    {
        return $this->redis->rawCommand('JSON.GET', [
            $key,
            'INDENT',
            $indent,
            'NEWLINE',
            $newline,
            'SPACE',
            $space,
            $shouldEscape ? '' : 'NOESCAPE',
            $path,
        ]);
    }

    public function getMany(array $keys, $path)
    {
        $args = $keys;
        $args[] = $path;
        return $this->redis->rawCommand('JSON.MGET', $args);
    }


    public function delete($key, $path = '.'): int
    {
        return $this->redis->rawCommand('JSON.DEL', [$key, $path]);
    }

    public function getTypeOf($key, $path = '.')
    {
        return $this->redis->rawCommand('JSON.TYPE', [$key, $path]);
    }

    public function incrementBy($key, $path, $number)
    {
        return $this->redis->rawCommand('JSON.NUMINCRBY', [$key, $path, $number]);
    }

    public function multiplyBy($key, $path, $number)
    {
        return $this->redis->rawCommand('JSON.NUMMULTBY', [$key, $path, $number]);
    }

    public function appendString($key, $path, $jsonString)
    {
        return $this->redis->rawCommand('JSON.STRAPPEND', [$key, $path, $jsonString]);
    }

    public function stringLength($key, $path)
    {
        return $this->redis->rawCommand('JSON.STRLEN', [$key, $path]);
    }

    public function appendArray($key, $path, $json): int
    {
        return $this->redis->rawCommand('JSON.ARRAPPEND', [$key, $path, $json]);
    }

    public function arrayIndex($key, $path, $jsonScalar, $start = 0, $stop = 0)
    {
        return $this->redis->rawCommand('JSON.ARRINDEX', [$key, $path, $jsonScalar, $start, $stop]);
    }

    public function arrayInsert($key, $path, $index, $json): int
    {
        return $this->redis->rawCommand('JSON.ARRINSERT', [$key, $path, $index, $json]);
    }

    public function arrayLength($key, $path): int
    {
        return $this->redis->rawCommand('JSON.ARRLEN', [$key, $path]);
    }

    public function arrayPop($key, $path, $index = -1)
    {
        return $this->redis->rawCommand('JSON.ARRPOP', [$key, $path, $index]);
    }

    public function arrayTrim($key, $path, $start, $stop)
    {
        return $this->redis->rawCommand('JSON.ARRTRIM', [$key, $path, $start, $stop]);
    }

    public function objectKeys($key, $path)
    {
        return $this->redis->rawCommand('JSON.OBJKEYS', [$key, $path]);
    }

    public function objectLen($key, $path = '.'): int
    {
        return $this->redis->rawCommand('JSON.OBJLEN', [$key, $path]);
    }

    public function debugMemory($key, $path = '.'): int
    {
        return $this->redis->rawCommand('JSON.DEBUG', ['MEMORY', $key, $path]);
    }
}
