<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 17-06-16
 * Time: 11:55
 * Project: Naviation.me
 */
namespace Nav\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('NavSiteBundle:Pages:index.html.twig');
    }
}
