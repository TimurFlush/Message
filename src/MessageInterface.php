<?php

namespace TimurFlush\Message;

/**
 * Interface MessageInterface
 * @package TimurFlush\Message
 */
interface MessageInterface
{
    public function setText(string $text);

    public function getText(): string;

    public function setType(string $type);

    public function getType(): string;

    public function setOtherInformation(array $otherInformation);

    public function getOtherInformation(): array;
}
