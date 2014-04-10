<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/19/14
 * Time: 11:11 PM
 */

namespace IFabrikator\Bundle\CoreBundle\DataFixtures;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use IFabrikator\Bundle\CoreBundle\Entity\Site;


class LoadSiteData extends AbstractFixture implements OrderedFixtureInterface{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager){
        $site = new Site();
        $site->setTitle('Test site');
        $site->setHost('symbare.ifedor.loc');
        $site->setIsDefault(true);
        $site->setIsActive(true);
        $manager->persist($site);
        $manager->flush();

        $this->addReference('main_site', $site);

    }
    /**
     * {@inheritDoc}
     */
    public function getOrder(){
        return 1;
    }

} 