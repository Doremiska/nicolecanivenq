<?php

namespace AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AdminBundle\Form\Type\AddressType;
use AdminBundle\Form\Type\AddressOtherType;
use AdminBundle\Form\Type\ImageType;
use AdminBundle\Form\Type\PdfType;

class AdvertType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('date', DateType::class, array('invalid_message' => "La date n'est pas valide."))
            ->add('timeStart', TimeType::class, array('invalid_message' => "L'heure n'est pas valide."))
            ->add('timeEnd', TimeType::class, array('invalid_message' => "L'heure n'est pas valide."))
            ->add('description', TextareaType::class, array('required' => false))
            ->add('image', ImageType::class, array('required' => false))
            ->add('pdf', PdfType::class, array('required' => false)) 
            ->add('address', EntityType::class, array(
                'class' => 'AdminBundle:Address',
                'choice_label' => 'town',
                'multiple' => false,
                'expanded' => true
            ))
            ->add('addressOther', AddressOtherType::class, array('required' => false)) 
            ->add('price', TextType::class)
            ->add('priceOff', TextType::class)
            ->add('submit', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\Advert'
        ));
    }
}
