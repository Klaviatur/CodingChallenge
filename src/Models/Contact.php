<?php

namespace CodingChallenge\Models;

class Contact extends Model
{
    protected array $fields = [
        'index' => [
            'name' => 'ID',
            'value' => null,
        ],
        'name' => [
            'name' => 'Name',
            'value' => null,
        ],
        'phone' => [
            'name' => 'Phone Number',
            'value' => null,
        ],
        'city' => [
            'name' => 'City',
            'value' => null,
        ],
    ];
}
