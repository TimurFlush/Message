<?php

namespace TimurFlush\Message\Tests\unit;

use PHPUnit\Framework\TestCase;
use TimurFlush\Message\Message;
use TimurFlush\Message\MessageRepository;

class MessageRepositoryTest extends TestCase
{
    public function testAccessorsForRepository()
    {
        $repository = new MessageRepository();

        $this->assertCount(0, $repository->getAll());

        $repository->add(new Message('1'));
        $repository->add(new Message('2'));

        $this->assertCount(2, $repository->getAll());

        $repository->flush();

        $this->assertCount(0, $repository->getAll());
    }

    public function testCountableInterface()
    {
        $repository = new MessageRepository();

        $repository->add(new Message('1'));

        $this->assertCount(1, $repository);

        $repository->add(new Message('2'));

        $this->assertCount(2, $repository);
    }

    public function testIteratorInterface()
    {
        $repository = new MessageRepository();
        $repository->add(new Message('0'));
        $repository->add(new Message('1'));

        foreach ($repository as $key => $message) {
            $this->assertEquals($key, (int)$message->getText());
        }
    }
}
