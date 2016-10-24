<?php

namespace WebsiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez entrer votre prénom.')),
                    new Length(array('max' => 255, 'maxMessage' => 'Ce champ ne peut pas excéder {{ limit }} caractères.'))
                )
            ))
            ->add('firstName', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez entrer votre nom.')),
                    new Length(array('max' => 255, 'maxMessage' => 'Ce champ ne peut pas excéder {{ limit }} caractères.'))
                )
            ))
            ->add('email', EmailType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez entrer votre adresse email.')),
                    new Email(array('message' => 'Veuillez rentrer une adresse email valide.'))
                )
            ))
            ->add('tel', TextType::class, array(
                'constraints' => array(
                    new Regex(array('pattern' => '/^\d{10}$/', 'message' => 'Veuillez rentrer un numéro de téléphone valide (10 chiffres sans espace).'))
                )
            ))
            ->add('subject', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => "Vous devez remplir l'objet de votre message.")),
                    new Length(array('max' => 255, 'maxMessage' => 'Ce champ ne peut pas excéder {{ limit }} caractères.'))
                )
            ))
            ->add('content', TextareaType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez remplir le contenu de votre message.')),
                    new Length(array('min' => 10, 'minMessage' => 'Votre message est trop court.'))
                )
            ))
            ->add('envoyer', SubmitType::class)
        ;
    }
}
