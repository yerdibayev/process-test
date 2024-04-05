<?php

use PHPUnit\Framework\TestCase;
use App\Process;
use App\Interfaces\FieldInterface;
use App\Fields\TextField;
use App\Fields\NumberField;
use App\Fields\DateField;

class ProcessTest extends TestCase {

    public function testAddFieldWithUniqueName() {
        $process = new Process();
        $textField = new TextField(['name' => 'textField', 'value' => 'Hello World']);
        $process->addField($textField);
        // Assert field is added
        $this->assertInstanceOf(FieldInterface::class, $process->getField('textField'));
        $this->assertEquals('Hello World', $process->getField('textField')->getValue());
    }

    public function testAddFieldThrowsExceptionForDuplicateName() {
        $this->expectException(\InvalidArgumentException::class);

        $process = new Process();
        $textField1 = new TextField(['name' => 'textField', 'value' => 'First Entry']);
        $textField2 = new TextField(['name' => 'textField', 'value' => 'Second Entry']);

        $process->addField($textField1);
        $process->addField($textField2); // This should throw an exception
    }

    public function testDefaultValuesForDifferentFieldTypes() {
        $process = new Process();

        $numberField = new NumberField(['name' => 'numberField']); // Default value should be 0
        $dateField = new DateField(['name' => 'dateField']); // Default value should be today's date
        $textField = new TextField(['name' => 'textField']); // Default value should be an empty string

        $process->addField($numberField);
        $process->addField($dateField);
        $process->addField($textField);

        // Assert default values are set correctly
        $this->assertEquals(0, $process->getField('numberField')->getValue());
        $this->assertEquals(date('d.m.Y'), $process->getField('dateField')->getValue());
        $this->assertEquals('', $process->getField('textField')->getValue());
    }

    public function testGetFieldReturnsNullForNonexistentField() {
        $process = new Process();
        $this->assertNull($process->getField('nonexistentField'));
    }

    public function testGetFieldsReturnsAllFields() {
        $process = new Process();
        $textField = new TextField(['name' => 'textField', 'value' => 'Text']);
        $numberField = new NumberField(['name' => 'numberField', 'value' => 123]);

        $process->addField($textField);
        $process->addField($numberField);

        $fields = $process->getFields();

        // Assert both fields are returned
        $this->assertCount(2, $fields);
        $this->assertArrayHasKey('textField', $fields);
        $this->assertArrayHasKey('numberField', $fields);
    }
}
