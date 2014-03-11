<?php

namespace IFabrikator\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

class DefaultController extends Controller
{


    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {

        $application = $this->container->get('ifabrikator.application');

        $router = $application->getRouter();
        $page = $router->getPage();

        $controls = $application->getControls();

        $content = '';

        if($controls)
            foreach($controls as $control)
                $content.= $this->forward($control->getClassName())->getContent();

        return $this->render($page->getTemplate(), array(
            'url' => $router->getRequestedURL(),
            'host'=> $router->getRequest()->getHost(),
            'language'=>$router->getLanguage(),
            'params'=>$this->getRequest()->attributes->get('params'),
            'page_title'=>$router->getPage()->getTitle(),
            'content'=>$content,
        ));



    }
    /**
     * @Cache(expires="tomorrow")
     */
    public function getMenuAction($type = null){

        
        $repository = $this->getDoctrine()->getRepository('IFabrikatorCoreBundle:Page');
        $menuitems =  $repository->findBy(array('parent' => 1, 'isActive' => true));

        return $this->render('IFabrikatorCoreBundle:Default:topmenu.html.twig', array('menuitems'=> $menuitems));
    }

}
