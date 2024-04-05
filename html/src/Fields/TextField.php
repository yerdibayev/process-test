<?php

namespace App\Fields;

class TextField extends AbstractField {
    /**
     * @var string
     */
    protected string $type = 'text';

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        parent::__construct($config);

        $this->value = $config['value'] ?? ''; // 'Default to an empty string if no value is provided'
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getFormattedValue(): string {
        return (string)$this->value;
    }
}
