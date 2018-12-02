<?php

namespace TimurFlush\Message;

/**
 * Class Message
 * @package TimurFlush\Message
 */
class Message implements MessageInterface
{
    /* Message types */
    const TYPE_SUCCESS = 'SUCCESS';
    const TYPE_ERROR = 'ERROR';
    const TYPE_WARNING = 'WARNING';
    const TYPE_INFO = 'INFO';
    const TYPE_CRITICAL = 'CRITICAL';

    /**
     * @var string
     */
    protected $_text;

    /**
     * @var string
     */
    protected $_type;

    /**
     * @var array
     */
    protected $_otherInformation;

    /**
     * Message constructor.
     *
     * @param string $text
     * @param string $type
     * @param array $otherInformation
     */
    public function __construct(string $text = '', string $type = '', array $otherInformation = [])
    {
        $this->_text = $text;
        $this->_type = $type;
        $this->_otherInformation = $otherInformation;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->_text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->_text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->_type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->_type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function getOtherInformation(): array
    {
        return $this->_otherInformation;
    }

    /**
     * @param array $otherInformation
     * @return $this
     */
    public function setOtherInformation(array $otherInformation)
    {
        $this->_otherInformation = $otherInformation;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->_text;
    }

    /**
     * @param array $properties
     * @return Message
     */
    public static function __set_state(array $properties)
    {
        return new self(
            $properties['_text'],
            $properties['_type'],
            $properties['_otherInformation']
        );
    }
}
