<?php

namespace App\Controller;

use App\Form\ContactType;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="user_contact")
     */
    public function contact(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactType::class);

        $contact = $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $email= (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to("ngomarona51@gmail.com")
                ->subject('Contact depuis le site ASA')
                ->htmlTemplate('contact/email.html.twig')
                ->context([
                    'mail' => $contact->get('email')->getData(),
                    'sujet' => $contact->get('sujet')->getData(),
                    'message' => $contact->get('message')->getData()

                ])
            ;

            $mailer->send($email);
            $this->addFlash('messagem', 'Message  envoyé avec succès');
            return $this->redirectToRoute('user_contact');

        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
