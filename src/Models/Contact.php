<?php

namespace CodingChallenge\Models;

class Contact extends Model
{
    protected array $fields = [
        'name' => [
            'attributes' => [],
            'name' => 'Name',
            'value' => null,
        ],
        'phone' => [
            'attributes' => [],
            'name' => 'Phone Number',
            'value' => null,
        ],
        'city' => [
            'attributes' => [],
            'name' => 'City',
            'value' => null,
        ],
    ];
}
