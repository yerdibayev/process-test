<?php

namespace App\Interfaces;

interface FieldInterface {
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return mixed
     */
    public function getValue(): mixed;

    /**
     * @return string
     */
    public function getFormattedValue(): string;
}
