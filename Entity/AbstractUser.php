<?php

namespace CuteNinja\PersonaBundle\Entity;

use CuteNinja\MemoriaBundle\Entity\BaseEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class AbstractUser
 *
 * @package CuteNinja\PersonaBundle\Entity
 */
abstract class AbstractUser extends BaseEntity implements UserInterface
{
    /**
     * @var string $username
     */
    protected $username;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $salt
     */
    protected $salt;

    /**
     * Encrypted password. Must be persisted.
     *
     * @var string $password
     */
    protected $password;

    /**
     * Plain password. Used for model validation. Must not be persisted.
     *
     * @var string $plainPassword
     */
    protected $plainPassword;

    /**
     * @var string $firstName
     */
    protected $firstName;

    /**
     * @var string $lastName
     */
    protected $lastName;

    /**
     * @var string $avatar
     */
    protected $avatar;

    /**
     * @var Role[] $roles
     */
    protected $roles;

    /**
     * @var Group[] $groups
     */
    protected $groups;

    /**
     * @var \DateTime $lastConnectedAt
     */
    protected $lastConnectedAt;

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
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return $this->salt;
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
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     *
     * @return $this
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     *
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return Role[]
     */
    public function getRoles()
    {
        return $this->roles ?: [];
    }

    /**
     * @param Role[] $roles
     *
     * @return $this
     */
    public function setRoles($roles = [])
    {
        $this->roles = [];

        foreach ($roles as $role) {
            $this->addRole($role);
        }

        return $this;
    }

    /**
     * @return Group[]
     */
    public function getGroups()
    {
        return $this->groups ?: [];
    }

    /**
     * @param Group[] $groups
     *
     * @return $this
     */
    public function setGroups($groups = [])
    {
        $this->groups = [];

        foreach ($groups as $group) {
            $this->addGroup($group);
        }

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastConnectedAt()
    {
        return $this->lastConnectedAt;
    }

    /**
     * @param \DateTime $lastConnectedAt
     *
     * @return $this
     */
    public function setLastConnectedAt($lastConnectedAt)
    {
        $this->lastConnectedAt = $lastConnectedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @param Role $role
     *
     * @return bool
     */
    public function hasRole(Role $role)
    {
        if (in_array($role, $this->roles)) {
            return true;
        }

        return false;
    }


    /**
     * @param Role $role
     *
     * @return $this
     */
    public function addRole(Role $role)
    {
        if(!$this->hasRole($role)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    /**
     * @param Role $role
     *
     * @return $this
     */
    public function removeRole(Role $role)
    {
        if (false !== $key = array_search($role, $this->roles)) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }

        return $this;
    }

    /**
     * @param Group $group
     *
     * @return bool
     */
    public function hasGroup(Group $group)
    {
        if (in_array($group, $this->groups)) {
            return true;
        }

        return false;
    }


    /**
     * @param Group $group
     *
     * @return $this
     */
    public function addGroup(Group $group)
    {
        if(!$this->hasGroup($group)) {
            $this->groups[] = $group;
        }

        return $this;
    }

    /**
     * @param Group $group
     *
     * @return $this
     */
    public function removeGroup(Group $group)
    {
        if (false !== $key = array_search($group, $this->groups)) {
            unset($this->groups[$key]);
            $this->groups = array_values($this->groups);
        }

        return $this;
    }
}