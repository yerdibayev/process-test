<?php

namespace App\Fields;

class DateField extends AbstractField {
    /**
     * @var string
     */
    protected string $type = 'date';
    /**
     * @var string|mixed
     */
    private string $format;

    /**
     * @param array $config
     */
    public function __construct(array $config) {
        parent::__construct($config);

        $this->value = $config['value'] ?? date('d.m.Y'); // Default to current date
        $this->format = $config['format'] ?? 'd.m.Y'; // default format
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getFormattedValue(): string {
        try {
            $date = new \DateTime($this->value);
            return $date->format($this->format);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("The provided date '{$this->value}' is invalid.");
        }
    }
}
