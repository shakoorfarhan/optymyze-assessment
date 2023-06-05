<?php

namespace App\Admin;

use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\DatePickerType;
use Sonata\Form\Type\DateTimePickerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class TariffAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('type', TextType::class)
            ->add('user', EntityType::class,[
            'class' => User::class,
            'choice_label' => 'name'
            ])
            ->add('tariff', IntegerType::class, array(
                'label'=> 'tariff ($)'
            ))
            ->add('startDate' , DatePickerType::class, array(
                'label' => 'start date'
            ))
            ->add('endDate' , DatePickerType::class, array(
                'label' => 'end date'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('user');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->add('type')
            ->add('tariff', IntegerType::class, array(
            'label' => 'tariff ($)'
            ))
            ->add('user')
            ->add('startDate', null, array(
                'label' => 'start date'
            ))
            ->add('endDate', null, array(
                'label' => 'end date'
            ));
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('type')
            ->add('tariff', IntegerType::class, array(
                'label' => 'tariff ($)'
            ))
            ->add('user')
            ->add('startDate', null, array(
                'label' => 'start date'
            ))
            ->add('endDate', null, array(
                'label' => 'end date'
            ));
    }
}