<?php

namespace Devcamp\Bundle\PlayerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PlayerType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' =>'pseudo',
                'required' => true,
                'attr' => array(
                    'size'=>50,
                    'placeholder' => 'Obligatoire',
                )
            ))
            ->add('team', 'choice', array(
                'choices'   => array(
                    'Lyon' => 'Lyon',
                    'Nantes' => 'Nantes',
                    'PSG' => 'PSG'),
                'required'  => false,
            ))
            ->add('email', 'email', array(
                    'label'     => 'E-Mail',
                    'required'  => true,
                ))
            ->add('password', 'password', array(
                'mapped' => false,
                'label' => 'Password',
                'required' => false,
            ))
            ->add('cellphone', 'text')
            ->add('health', 'health')
            ->add('OK', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Devcamp\Bundle\PlayerBundle\Entity\Player'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'devcamp_bundle_playerbundle_player';
    }
}
