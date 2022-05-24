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
        $fields = [];
        foreach ($this->fields as $fieldKey => $field) {
            if ($fieldKey === 'index') continue;
            $fields[$fieldKey] = $field;
        }
        return $fields;
    }

    public function getIndex(): int
    {
        return $this->fields['index']['value'];
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->fields as $key => $field)
            $array[$key] = $field['value'];
        return $array;
    }
}