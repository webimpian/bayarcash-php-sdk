<?php

namespace Webimpian\BayarcashSdk\Resources;

use Webimpian\BayarcashSdk\Bayarcash;

class Resource
{
    /**
     * The Bayarcash SDK instance.
     *
     * @var \Webimpian\BayarcashSdk\Bayarcash|null
     */
    protected $bayarcash;

    /**
     * Create a new resource instance.
     *
     * @return void
     */
    public function __construct(array $attributes, ?Bayarcash $bayarcash = null)
    {
        $this->bayarcash = $bayarcash;
        $this->fill($attributes);
    }

    /**
     * Fill the resource with the array of attributes.
     *
     * @return void
     */
    protected function fill($attributes)
    {
        foreach ($attributes as $key => $value) {
            $key = $this->camelCase($key);

            $this->{$key} = $value;
        }
    }

    /**
     * Convert the key name to camel case.
     *
     * @param  string  $key
     * @return string
     */
    protected function camelCase($key)
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    /**
     * Transform the items of the collection to the given class.
     *
     * @param  string  $class
     * @return array
     */
    protected function transformCollection(array $collection, $class, array $extraData = [])
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this->bayarcash);
        }, $collection);
    }
}
