<?php
namespace Test;
use App\Entity\Post;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\Common\DataFixtures\Loader;
use App\Repository\PostRepo;
use App;

class doctrineTest  extends TestCase
{

    private $em;
    private $repository;
    private $loader;
    public function setUp()
    {
        parent::setUp();
        $this->em         = App::make('Doctrine\ORM\EntityManagerInterface');
        $this->repository = new PostRepo($this->em);
        $this->executor = new ORMExecutor($this->em, new ORMPurger);
        $this->loader   = new Loader;
        $this->loader->addFixture(new Fixtures);
    }


    /** @test */
    public function file()
    {
        $purger = new ORMPurger();
        $executor = new ORMExecutor($this->em, $purger);
        $executor->execute($this->loader->getFixtures());
        $user = $this->repository->PostOfTitle('hio');
        $this->em->clear();
        $this->assertInstanceOf('App\Entity\Post', $user);
    }






}