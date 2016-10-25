<?php

namespace WebsiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;


class ContactRDVType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez entrer votre nom.')),
                    new Length(array('max' => 255, 'maxMessage' => 'Ce champ ne peut pas excéder {{ limit }} caractères.'))
                )
            ))
            ->add('lastName', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => 'Vous devez entrer votre prénom.')),
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
                    new NotBlank(array('message' => 'Vous devez entrer votre numéro de téléphone.')),
                    new Regex(array('pattern' => '/^\d{2}[[:blank:]]\d{2}[[:blank:]]\d{2}[[:blank:]]\d{2}[[:blank:]]\d{2}$/', 'message' => 'Veuillez rentrer un numéro de téléphone valide.'))
                )
            ))
            ->add('appointmentFor', ChoiceType::class, array(
                'choices'  => array(
                    'Sophrologie' => 'Sophrologie',
                    'Soins énergetiques' => 'Soins énergétiques'
                ),
                'expanded' => true,
                'multiple' => true,
                'constraints' => array(
                    new NotBlank(array('message' => "Vous devez sélectionner au moins une activité.")),
                )
            ))
            ->add('availableDay', ChoiceType::class, array(
                'choices'  => array(
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi' 
                ),
                'expanded' => true,
                'multiple' => true,
                'constraints' => array(
                    new NotBlank(array('message' => "Merci de sélectionner les jours où vous êtes disponibles.")),
                )
            ))
            ->add('availableTime', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array('message' => "Merci d'indiquer les horaires auxquels vous êtes disponibles.")),
                    new Length(array('max' => 255, 'maxMessage' => 'Ce champ ne peut pas excéder {{ limit }} caractères.'))
                )
            ))
            ->add('content', TextareaType::class, array(
                'required' => false
            ))
            ->add('envoyer', SubmitType::class)
        ;
    }
}
