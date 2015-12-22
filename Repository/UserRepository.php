<?php

namespace CuteNinja\PersonaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use PersonaBundle\Entity\User;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class UserRepository
 *
 * @package PersonaBundle\Repository
 */
class UserRepository extends EntityRepository implements UserProviderInterface, UserLoaderInterface
{
    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        $queryBuilder = $this->createQueryBuilder('user');
        $queryBuilder->select('DISTINCT user');

        return $queryBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {
        $queryBuilder = $this->getQueryBuilder();

        $queryBuilder->andWhere('user.email = :username');
        $queryBuilder->setParameter('username', $username);

        $user = $queryBuilder->getQuery()->getOneOrNullResult();

        if ($user === null) {
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {
        return $class === 'PersonaBundle\Entity\User';
    }
}