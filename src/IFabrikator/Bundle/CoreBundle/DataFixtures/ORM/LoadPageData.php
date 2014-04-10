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
use IFabrikator\Bundle\CoreBundle\Entity\Page;
use IFabrikator\Bundle\CoreBundle\Entity\Site;


class LoadPageData extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager){

        $page = new Page();
        $page->setTitle('Main page');
        $page->setSite($this->getReference('main_site'));
        $page->setSlug('/');
        $page->setUrl('/');
        $page->setTemplate('IFabrikatorCoreBundle:Default:index.html.twig');
        $page->setIsActive(true);
        $page->setIsLogonRequired(false);
        $page->setLanguage('ru');
        $manager->persist($page);
        $manager->flush();
        
        $this->addReference('main_page', $page);


        $newsPage = new Page();
        $newsPage->setTitle('News');
        $newsPage->setSite($this->getReference('main_site'));
        $newsPage->setParent($this->getReference('main_page'));
        $newsPage->setSlug('news');
        $newsPage->setUrl('/news/');
        $newsPage->setTemplate('IFabrikatorCoreBundle:Default:inner.html.twig');
        $newsPage->setIsActive(true);
        $newsPage->setIsLogonRequired(false);
        $newsPage->setLanguage('ru');
        $manager->persist($newsPage);
        $manager->flush();

        $this->addReference('news_page', $newsPage);


        $mapPage = new Page();
        $mapPage->setTitle('Site Map');
        $mapPage->setSite($this->getReference('main_site'));
        $mapPage->setParent($this->getReference('main_page'));
        $mapPage->setSlug('sitemap');
        $mapPage->setUrl('/sitemap/');
        $mapPage->setTemplate('IFabrikatorCoreBundle:Default:inner.html.twig');
        $mapPage->setIsActive(true);
        $mapPage->setIsLogonRequired(false);
        $mapPage->setLanguage('ru');
        $manager->persist($mapPage);
        $manager->flush();

        $this->addReference('map_page', $mapPage);

        $mapPage = new Page();
        $mapPage->setTitle('Administration');
        $mapPage->setSite($this->getReference('main_site'));
        $mapPage->setParent($this->getReference('main_page'));
        $mapPage->setSlug('backend');
        $mapPage->setUrl('/backend/');
        $mapPage->setTemplate('IFabrikatorCoreBundle:Backend:admin.index.html.twig');
        $mapPage->setIsActive(true);
        $mapPage->setIsLogonRequired(false);
        $mapPage->setLanguage('ru');
        $manager->persist($mapPage);
        $manager->flush();


    }
    /**
     * {@inheritDoc}
     */

    public function getOrder(){
        return 3;
    }

} 