<?php
/**
 * Created by PhpStorm.
 * User: Nav
 * Date: 17-06-16
 * Time: 11:55
 * Project: Naviation.me
 */
namespace Nav\SiteBundle\Controller;

use Nav\SiteBundle\Entity\Contact;
use Nav\SiteBundle\Form\ContactType;
use SendGrid\Content;
use SendGrid\Email;
use SendGrid\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $sectionRepo = $em->getRepository('NavSiteBundle:Section');
        $about = $sectionRepo->findOneByName('about');

        $projectRepo = $em->getRepository('NavSiteBundle:Project');
        $projects = $projectRepo->findByEnabled(1);

        $contact = new Contact();
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $contact->updatedTimestamps();
            $em->persist($contact);
            $em->flush();
            $this->mailContact($contact);
            $this->get('session')->getFlashBag()
                ->add(
                    'success',
                    'thank you for your submission, I will get back to you soon.'
                );
        }

        return $this->render('NavSiteBundle:Pages:index.html.twig', [
            'about' => $about,
            'projects' => $projects,
            'contactForm' => $contactForm->createView()
        ]);
    }

    private function mailContact($contact)
    {
        $sg = new \SendGrid($this->getParameter('sendgrid_apikey'));
        $from = new Email(null, "contact@naviation.me");
        $to = new Email(null, 'navarajh@gmail.com');
        $subject = 'Contactform from naviation.me';
        $content = new Content('text/plain', var_export($contact, true));

        $mail = new Mail($from, $subject, $to, $content);
        $response = $sg->client->mail()->send()->post($mail);

        return $response;
    }

    public function testAction()
    {
        // Testing stuff here.

    }
}
