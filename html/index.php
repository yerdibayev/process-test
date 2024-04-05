<?php

require __DIR__ . '/vendor/autoload.php';

use App\Fields\DateField;
use App\Fields\NumberField;
use App\Fields\TextField;
use App\Process;

$fields = [
    ['name' => 'Name', 'type' => 'text', 'value' => 'John'],
    ['name' => 'Surname', 'type' => 'text', 'value' => 'Doe'],
    ['name' => 'Age', 'type' => 'number', 'value' => 30, 'format' => '%02d'],
    ['name' => 'Birthday', 'type' => 'date', 'value' => '1990-01-01', 'format' => 'd.m.Y'],
];

$process = new Process();

foreach ($fields as $fieldData) {
    $field = match ($fieldData['type']) {
        'text' => new TextField($fieldData),
        'number' => new NumberField($fieldData),
        'date' => new DateField($fieldData),
        '' => throw new \InvalidArgumentException("Field type cannot be empty."), // Проверка на пустой тип поля
        default => throw new InvalidArgumentException("Unsupported field type '{$fieldData['type']}'"),
    };
    $process->addField($field);
}

foreach ($process->getFields() as $field) {
    echo "{$field->getName()}: {$field->getFormattedValue()}\n" . '<br/>';
}

