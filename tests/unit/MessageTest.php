<?php

namespace TimurFlush\Message\Tests\unit;

use PHPUnit\Framework\TestCase;
use TimurFlush\Message\Message;

class MessageTest extends TestCase
{
    public function testConstructor()
    {
        $message = new Message('SomeText', 'SomeType', [
            1 => 2
        ]);

        $r = new \ReflectionObject($message);

        $textProperty = $r->getProperty('_text');
        $textProperty->setAccessible(true);
        $textProperty = $textProperty->getValue($message);

        $typeProperty = $r->getProperty('_type');
        $typeProperty->setAccessible(true);
        $typeProperty = $typeProperty->getValue($message);

        $otherInformationProperty = $r->getProperty('_otherInformation');
        $otherInformationProperty->setAccessible(true);
        $otherInformationProperty = $otherInformationProperty->getValue($message);


        $this->assertEquals('SomeText', $textProperty);
        $this->assertEquals('SomeType', $typeProperty);
        $this->assertEquals([1=>2], $otherInformationProperty);
    }

    public function testAccessorsForTextProperty()
    {
        $message = new Message('Text', 'Type');

        $fluent = $message->setText('SomeText');

        $this->assertEquals(
            'SomeText',
            $message->getText()
        );
        $this->assertInstanceOf(
            Message::class,
            $fluent
        );
    }

    public function testAccessorsForTypeProperty()
    {
        $message = new Message('Text', 'Type');

        $fluent = $message->setType('SomeType');

        $this->assertEquals(
            'SomeType',
            $message->getType()
        );
        $this->assertInstanceOf(
            Message::class,
            $fluent
        );
    }

    public function testAccessorsForOtherInformationProperty()
    {
        $message = new Message('Text', 'Type');

        $expected = [
            1 => 2,
            3 => 4,
            5 => 6
        ];

        $fluent = $message->setOtherInformation($expected);

        $this->assertEquals(
            $expected,
            $message->getOtherInformation()
        );
        $this->assertInstanceOf(
            Message::class,
            $fluent
        );
    }

    public function testToStringMagicMethod()
    {
        $message = new Message('Text', 'Type');
        $message->setText('SomeText');

        $this->assertEquals(
            'SomeText',
            (string)$message
        );
    }

    public function testSetStateMagicMethod()
    {
        $message = new Message('Text', 'Type');

        $message->setText('SomeText');
        $message->setType('SomeType');
        $message->setOtherInformation(
            [
                1 => 2
            ]
        );

        $exported = var_export($message, true);
        eval('$restored = ' . $exported . ';');

        $this->assertInstanceOf(
            Message::class,
            $restored
        );

        $this->assertEquals(
            $message->getText(),
            $restored->getText()
        );

        $this->assertEquals(
            $message->getType(),
            $restored->getType()
        );

        $this->assertEquals(
            $message->getOtherInformation(),
            $restored->getOtherInformation()
        );

    }
}
