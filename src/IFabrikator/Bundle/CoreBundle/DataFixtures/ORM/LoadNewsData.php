<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/24/14
 * Time: 5:48 AM
 */

namespace IFabrikator\Bundle\CoreBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IFabrikator\Bundle\CoreBundle\Entity\News;

class LoadNewsData extends AbstractFixture implements OrderedFixtureInterface {


    public function load(ObjectManager $manager){


        $news = new News();
        $news->setTitle('News 1');
        $news->setAnnounce('News 1 announce');
        $news->setCreatedAt(new \DateTime());
        $news->setBody('News 1 body text');
        $news->setIsActive(true);
        $manager->persist($news);
        $manager->flush();

        $news = new News();
        $news->setTitle('News 2');
        $news->setAnnounce('News 2 announce');
        $news->setCreatedAt(new \DateTime());
        $news->setBody('News 2 body text');
        $news->setIsActive(true);
        $manager->persist($news);
        $manager->flush();

        $news = new News();
        $news->setTitle('News 3');
        $news->setAnnounce('News 3 announce');
        $news->setCreatedAt(new \DateTime());
        $news->setBody('News 3 body text');
        $news->setIsActive(true);
        $manager->persist($news);
        $manager->flush();

    }
    public function getOrder(){
        return 5;
    }

} 