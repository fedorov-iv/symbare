<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/17/14
 * Time: 5:08 AM
 */

namespace IFabrikator\Bundle\CoreBundle\Component;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Router {

    protected $request;
    protected $em;
    protected $site;
    protected $page;
    protected $language;
    protected $requestedURL;

    public function __construct(EntityManager $em, Container $container){
        $this->em = $em;
        $this->request = $container->get('request');

        $siteRepository = $this->em->getRepository('IFabrikatorCoreBundle:Site');
        $this->site = $siteRepository->getSiteByHost($this->request->getHost());

        $this->language = $this->request->attributes->get('language', $container->getParameter('default_language'));
        $this->setRequestedURL($this->request->attributes->get('url', $container->getParameter('site_root')));

        $this->route();

    }

    protected function route(){


        if(!$this->site)
            throw new NotFoundHttpException('Не найден сайт по хосту с именем "'.$this->request->getHost().'"!');

        $pageRepository = $this->em->getRepository('IFabrikatorCoreBundle:Page');
        $this->page = $pageRepository->getActivePageByURL($this->getRequestedURL(), $this->site, $this->language);

        if(!$this->page)
            throw new NotFoundHttpException('Не найдена страница по адресу "'.$this->getRequestedURL().'"!');

    }

    protected function setRequestedURL($url){

        $url = ($url!='/') ? $url = '/'.trim($url, '/').'/' : $url;
        $this->requestedURL = $url;
    }

    public function getRequestedURL(){
        return $this->requestedURL;
    }

    public function getRequest(){
        return $this->request;

    }

    public function getSite(){
        return $this->site;

    }

    public function getPage(){
        return $this->page;

    }


    public function getLanguage(){
        return $this->language;

    }

} 