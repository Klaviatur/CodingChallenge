<?php

namespace CodingChallenge\Models;

use CodingChallenge\Models\Model as Model;

class Contact extends Model
{
    protected array $fields = [
        'name' => [
            'attributes' => [],
            'value' => null,
        ],
        'phone' => [
            'attributes' => [],
            'value' => null,
        ],
        'city' => [
            'attributes' => [],
            'value' => null,
        ],
    ];
}
