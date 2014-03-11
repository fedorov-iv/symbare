<?php
/**
 * Created by PhpStorm.
 * User: ifedor
 * Date: 1/23/14
 * Time: 6:16 AM
 */

namespace IFabrikator\Bundle\CoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteMapController extends Controller {

    public function indexAction(){
        $menuitems = array();

        return $this->render('IFabrikatorCoreBundle:Default:sitemap.html.twig', array(
            'menuitems' => $menuitems

        ));

    }

} 