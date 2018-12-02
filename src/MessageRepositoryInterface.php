<?php

namespace TimurFlush\Message;

/**
 * Interface MessageRepositoryInterface
 * @package TimurFlush\Message
 */
interface MessageRepositoryInterface
{
    public function add(MessageInterface $message);

    public function getAll(): array;

    public function flush();
}
