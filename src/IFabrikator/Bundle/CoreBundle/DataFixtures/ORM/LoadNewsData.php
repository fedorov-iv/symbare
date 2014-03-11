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
        $news->setTitle('Новость 1');
        $news->setAnnounce('Анонс тестовой новости 1');
        $news->setCreatedAt(new \DateTime());
        $news->setBody('Полный текст тестовой новости 1');
        $news->setIsActive(true);
        $manager->persist($news);
        $manager->flush();

        $news = new News();
        $news->setTitle('Новость 2');
        $news->setAnnounce('Анонс тестовой новости 2');
        $news->setCreatedAt(new \DateTime());
        $news->setBody('Полный текст тестовой новости 2');
        $news->setIsActive(true);
        $manager->persist($news);
        $manager->flush();

        $news = new News();
        $news->setTitle('Новость 3');
        $news->setAnnounce('Анонс тестовой новости 3');
        $news->setCreatedAt(new \DateTime());
        $news->setBody('Полный текст тестовой новости 3');
        $news->setIsActive(true);
        $manager->persist($news);
        $manager->flush();

    }
    public function getOrder(){
        return 5;
    }

} 