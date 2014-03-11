<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/23/14
 * Time: 5:24 AM
 */

namespace IFabrikator\Bundle\CoreBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IFabrikator\Bundle\CoreBundle\Entity\Control;
use IFabrikator\Bundle\CoreBundle\Entity\Page;


class LoadControlData extends AbstractFixture implements OrderedFixtureInterface{

    public function load(ObjectManager $manager){


        $control = new Control();
        $control->setTitle('Новости на главную страницу');
        $control->setCode('main_page_news');
        $control->setDescription('Новости на главную страницу');
        $control->addPage($this->getReference('main_page'));
        $control->setClassName('IFabrikatorCoreBundle:MainPageNews:index');
        $control->setIsActive(true);
        $control->setIsAdmin(false);
        $control->setIsCommon(false);

        $manager->persist($control);
        $manager->flush();



        $control = new Control();
        $control->setTitle('Карта сайта');
        $control->setCode('sitemap');
        $control->setDescription('Карта сайта');
        $control->addPage($this->getReference('map_page'));
        $control->setClassName('IFabrikatorCoreBundle:SiteMap:index');
        $control->setIsActive(true);
        $control->setIsAdmin(false);
        $control->setIsCommon(false);

        $manager->persist($control);
        $manager->flush();
        
    }
    public function getOrder(){
        return 4;
    }

} 