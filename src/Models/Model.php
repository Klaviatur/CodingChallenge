<?php

namespace CodingChallenge\Models;

class Model
{
    protected array $fields;

    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (array_key_exists($key, $this->fields))
                $this->fields[$key]['value'] = $value;
        }
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->fields as $key => $field)
            $array[$key] = $field['value'];
        return $array;
    }

    public function toJson($flags = JSON_PRETTY_PRINT): string
    {
        return json_encode($this->toArray(), $flags);
    }
}