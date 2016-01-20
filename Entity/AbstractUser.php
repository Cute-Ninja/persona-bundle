<?php

namespace CuteNinja\PersonaBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class AbstractUser
 *
 * @package PersonaBundle\Entity
 */
abstract class AbstractUser implements UserInterface
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $username
     */
    protected $username;

    /**
     * @var string $password
     */
    protected $password;

    /**
     * @var string[] Symfony roles
     */
    protected $roles;

    /**
     * @var string $status
     */
    protected $status = self::STATUS_ACTIVE;

    /**
     * @var \DateTime $creation
     */
    protected $createdAt;

    /**
     * @var \DateTime $lastUpdate
     */
    protected $updatedAt;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        if(!empty($password)) {
            $this->password = $password;
        }

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRoles()
    {
        return $this->roles ? : [];
    }

    /**
     * @param string[] $roles
     *
     * @return $this
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return;
    }

    public function logCreation()
    {
        $creationDate = new \DateTime();

        $this->setCreatedAt($creationDate);
        $this->setUpdatedAt($creationDate);
    }

    public function logUpdate()
    {
        $this->setUpdatedAt(new \DateTime());
    }
}
