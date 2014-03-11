<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/23/14
 * Time: 6:15 AM
 */

namespace IFabrikator\Bundle\CoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainPageNewsController extends Controller {

    public function indexAction(){

        $repo = $this->getDoctrine()->getRepository('IFabrikatorCoreBundle:News');

        $news = $repo->findBy(array('isActive'=>true));

        return $this->render('IFabrikatorCoreBundle:Default:main.page.news.html.twig', array(
            'newslist' => $news

        ));

    }

} 