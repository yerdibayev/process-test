<?php

namespace App;

use App\Interfaces\FieldInterface;

class Process {
    /**
     * @var array
     */
    private array $fields = [];

    /**
     * @param FieldInterface $field
     * @return void
     */
    public function addField(FieldInterface $field): void {
        $name = $field->getName();

        // Проверка на уникальное имя поля
        if (isset($this->fields[$name])) {
            throw new \InvalidArgumentException("Field with name '{$name}' already exists.");
        }

        $this->fields[$name] = $field;
    }


    /**
     * @param string $name
     * @return FieldInterface|null
     */
    public function getField(string $name): ?FieldInterface {
        return $this->fields[$name] ?? null;
    }

    /**
     * @return array
     */
    public function getFields(): array {
        return $this->fields;
    }
}
