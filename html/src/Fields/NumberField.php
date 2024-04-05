<?php

namespace App\Fields;

class NumberField extends AbstractField {
    /**
     * @var string
     */
    protected string $type = 'number';
    /**
     * @var string|mixed
     */
    private string $format;

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        parent::__construct($config);

        $this->format = $config['format'] ?? '%.2f'; // default format
        $this->value = $config['value'] ?? 0; // Default to 0 if no value is provided
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
        return sprintf($this->format, $this->value);
    }
}
