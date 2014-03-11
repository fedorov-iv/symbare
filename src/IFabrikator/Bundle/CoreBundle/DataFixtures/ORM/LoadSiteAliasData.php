<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/19/14
 * Time: 11:11 PM
 */

namespace IFabrikator\Bundle\CoreBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IFabrikator\Bundle\CoreBundle\Entity\SiteAlias;
use IFabrikator\Bundle\CoreBundle\Entity\Site;


class LoadSiteAliasData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager){


        $siteAlias = new SiteAlias();
        $siteAlias->setHost('symbare2.ifedor.loc');
        $siteAlias->setSite($this->getReference('main_site'));
        $manager->persist($siteAlias);
        $manager->flush();

    }
    /**
     * {@inheritDoc}
     */

    public function getOrder(){
        return 2;
    }

} 