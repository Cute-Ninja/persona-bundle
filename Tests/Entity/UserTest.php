<?php

namespace CuteNinja\PersonaBundle\Tests\Entity;

use CuteNinja\PersonaBundle\Entity\AbstractUser;
use CuteNinja\PersonaBundle\Entity\Group;
use CuteNinja\PersonaBundle\Entity\Role;
use CuteNinja\PersonaBundle\Tests\Model\User;

/**
 * Class UserTest
 *
 * @package CuteNinja\PersonaBundle\Test\Entity
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testHasRole()
    {
        $user = $this->buildTestUser();

        $this->assertTrue($user->hasRole(new Role('ROLE_TEST_1', 'Test Role 1')));
        $this->assertFalse($user->hasRole(new Role('ROLE_NON_EXISTENT', 'Non Existent')));
    }

    public function testAddRole()
    {
        $user            = $this->buildTestUser();
        $existentRole    = new Role('ROLE_TEST_1', 'Test Role 1');
        $nonExistentRole = new Role('ROLE_NON_EXISTENT', 'Non Existent');

        $this->assertEquals(5, sizeof($user->getRoles()));
        $this->assertTrue($user->hasRole($existentRole));

        $user->addRole($existentRole);
        $this->assertEquals(5, sizeof($user->getRoles()));
        $this->assertTrue($user->hasRole($existentRole));

        $user->addRole($nonExistentRole);
        $this->assertEquals(6, sizeof($user->getRoles()));
        $this->assertTrue($user->hasRole($nonExistentRole));
    }

    public function testRemoveRole()
    {
        $user            = $this->buildTestUser();
        $existentRole    = new Role('ROLE_TEST_1', 'Test Role 1');
        $nonExistentRole = new Role('ROLE_NON_EXISTENT', 'Non Existent');

        $this->assertEquals(5, sizeof($user->getRoles()));
        $this->assertTrue($user->hasRole($existentRole));

        $user->removeRole($nonExistentRole);
        $this->assertEquals(5, sizeof($user->getRoles()));
        $this->assertFalse($user->hasRole($nonExistentRole));

        $user->removeRole($existentRole);
        $this->assertEquals(4, sizeof($user->getRoles()));
        $this->assertFalse($user->hasRole($existentRole));
    }

    public function testHasGroup()
    {
        $user = $this->buildTestUser();

        $this->assertTrue($user->hasGroup(new Group('GROUP_TEST_1', 'Test Group 1')));
        $this->assertFalse($user->hasGroup(new Group('GROUP_NON_EXISTENT', 'Non Existent')));
    }

    public function testAddGroup()
    {
        $user             = $this->buildTestUser();
        $existentGroup    = new Group('GROUP_TEST_1', 'Test Group 1');
        $nonExistentGroup = new Group('GROUP_NON_EXISTENT', 'Non Existent');

        $this->assertEquals(5, sizeof($user->getGroups()));

        $user->addGroup($existentGroup);
        $this->assertEquals(5, sizeof($user->getGroups()));
        $this->assertTrue($user->hasGroup($existentGroup));

        $user->addGroup($nonExistentGroup);
        $this->assertEquals(6, sizeof($user->getGroups()));
        $this->assertTrue($user->hasGroup($nonExistentGroup));
    }

    public function testRemoveGroup()
    {
        $user             = $this->buildTestUser();
        $existentGroup    = new Group('GROUP_TEST_1', 'Test Group 1');
        $nonExistentGroup = new Group('GROUP_NON_EXISTENT', 'Non Existent');

        $this->assertEquals(5, sizeof($user->getGroups()));
        $this->assertTrue($user->hasGroup($existentGroup));

        $user->removeGroup($nonExistentGroup);
        $this->assertEquals(5, sizeof($user->getGroups()));
        $this->assertFalse($user->hasGroup($nonExistentGroup));

        $user->removeGroup($existentGroup);
        $this->assertEquals(4, sizeof($user->getGroups()));
        $this->assertFalse($user->hasGroup($existentGroup));
    }

    /**
     * @return AbstractUser
     */
    private function buildTestUser()
    {
        $user = new User();

        $user->setRoles(
            [
                new Role('ROLE_TEST_1', 'Test Role 1'),
                new Role('ROLE_TEST_2', 'Test Role 2'),
                new Role('ROLE_TEST_3', 'Test Role 3'),
                new Role('ROLE_TEST_4', 'Test Role 4'),
                new Role('ROLE_TEST_5', 'Test Role 5'),
            ]
        );

        $user->setGroups(
            [
                new Group('GROUP_TEST_1', 'Test Group 1'),
                new Group('GROUP_TEST_2', 'Test Group 2'),
                new Group('GROUP_TEST_3', 'Test Group 3'),
                new Group('GROUP_TEST_4', 'Test Group 4'),
                new Group('GROUP_TEST_5', 'Test Group 5'),
            ]
        );

        return $user;
    }
}