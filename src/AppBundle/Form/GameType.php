<?php

namespace AppBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class GameType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class)
            ->add('scoreTeam1', IntegerType::class)
            ->add('scoreTeam2', IntegerType::class)
            ->add('team1', EntityType::class, [
                'class' => 'AppBundle\Entity\Team',
                'choice_label'  => function ($team) {
                    $country = $team->getCountry();
                    if($country)
                        return $country->getName();
                },
                'placeholder' => 'Choose an option',
            ])
            ->add('team2', EntityType::class, [
                'class' => 'AppBundle\Entity\Team',
                'choice_label'  => function ($team) {
                    $country = $team->getCountry();
                    if($country)
                        return $country->getName();
                },
                'placeholder' => 'Choose an option'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Game'
        ));
    }
}
