<?php

namespace TimurFlush\Message;

/**
 * Class MessageRepository
 * @package TimurFlush\Message
 */
class MessageRepository implements MessageRepositoryInterface, \Countable, \Iterator
{
    /**
     * @var MessageInterface[]
     */
    private $_messages = [];

    /**
     * @param MessageInterface $message
     */
    public function add(MessageInterface $message)
    {
        $this->_messages[] = $message;
    }

    /**
     * @return MessageInterface[]
     */
    public function getAll(): array
    {
        return $this->_messages;
    }

    /**
     * @return void
     */
    public function flush()
    {
        $this->_messages = [];
    }

    /**
     * @return int
     */
    public function count()
    {
        return sizeof($this->_messages);
    }

    /**
     * @return mixed|MessageInterface
     */
    public function current()
    {
        return current($this->_messages);
    }

    /**
     * @return int|mixed|null|string
     */
    public function key()
    {
        return key($this->_messages);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->_messages);
    }

    /**
     * @return void
     */
    public function rewind()
    {
        reset($this->_messages);
    }

    /**
     * @return bool
     */
    public function valid()
    {
        $key = key($this->_messages);
        return $key !== false && $key !== null;
    }
}
