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
                    new NotBlank(array('message' => 'Vous devez entrer votre prénom.'))
                )
            ))
            ->add('firstName', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez entrer votre nom.'))
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
                    new NotBlank(array('message' => 'Vous devez entrer votre numéro de téléphone.')),
                    new Regex(array('pattern' => '/^\d{2}[[:blank:]]\d{2}[[:blank:]]\d{2}[[:blank:]]\d{2}[[:blank:]]\d{2}$/', 'message' => 'Veuillez rentrer un numéro de téléphone valide (10 chiffres espacés : XX XX XX XX XX).'))
                )
            ))
            ->add('subject', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => "Vous devez remplir l'objet de votre message."))
                )
            ))
            ->add('content', TextareaType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez remplir le contenu de votre message.'))
                )
            ))
            ->add('envoyer', SubmitType::class)
        ;
    }
}
