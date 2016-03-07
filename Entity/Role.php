<?php

namespace CuteNinja\PersonaBundle\Entity;

use CuteNinja\MemoriaBundle\Entity\BaseEntity;

/**
 * Class Role
 *
 * @package CuteNinja\PersonaBundle\Entity
 */
class Role extends BaseEntity
{
    /**
     * Used as ID.
     *
     * @var string $value
     */
    protected $value;

    /**
     * @var string $label
     */
    protected $label;

    /**
     * @var $description
     */
    protected $description;

    /**
     * @param string $value
     * @param string $label
     */
    public function __construct($value, $label)
    {
        $this->value = $value;
        $this->labe  = $label;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}