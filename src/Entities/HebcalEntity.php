<?php


namespace Ivy47\HebcalApi\Entities;


class HebcalEntity implements \ArrayAccess
{
    /**
     * @var array
     */
    private $container;

    public function __construct($attributes) {
        $this->container = $attributes;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key) {
        return $this->container[$key];
    }

    /**
     * @param $key
     * @param $value
     */
    public function __set($key, $value) {
        $this->container[$key] = $value;
    }


    /**
     * @param $key
     * @return bool
     */
    public function __isset ($key) {
        return isset($this->container[$key]);
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}