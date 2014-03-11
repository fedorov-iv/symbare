<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/21/14
 * Time: 4:52 AM
 */

namespace IFabrikator\Bundle\CoreBundle\Component;
use Doctrine\ORM\EntityManager;
use IFabrikator\Bundle\CoreBundle\Component\Router;


class Application {

    protected $router;
    protected $em;
    protected $controls = array();

    public function __construct(Router $router, EntityManager $em){
        $this->router = $router;
        $this->em = $em;
        $this->controls = $this->em->getRepository('IFabrikatorCoreBundle:Control')
                          ->getPageControls($this->router->getPage());
    }

    public function getRouter(){
        return $this->router;
    }

    public function getControls(){
        return $this->controls;
    }

} 