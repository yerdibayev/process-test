<?php

namespace App\Fields;

use App\Interfaces\FieldInterface;

abstract class AbstractField implements FieldInterface {
    protected string $name;
    protected mixed $value;

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        $this->name = $config['name'];
        $this->value = $config['value'] ?? null;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return mixed|null
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}
