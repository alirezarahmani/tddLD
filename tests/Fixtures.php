<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 12/10/15
 * Time: 8:49 PM
 */
namespace Test;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use app\Entity\Post;

class Fixtures implements FixtureInterface
{
    /**
     * Load the User fixtures
     *
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager)
    {
        $user = new Post(['title'=>'hio','body'=>'100000']);
        $manager->persist($user);
        $manager->flush();
    }
}
