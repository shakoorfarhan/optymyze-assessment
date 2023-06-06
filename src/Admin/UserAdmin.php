<?php

namespace App\Admin;

use App\Entity\Tariff;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('name', TextType::class)
            ->add('tariffs', EntityType::class, [
                'class' => Tariff::class,
                'choice_label' => 'type',
                'multiple' => true
            ])
            ->add('phoneNo', TextType::class, array(
                'label' => 'phone no'
            ))
            ->add('address', TextType::class, array(
                'label' => 'address'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('name');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->add('name')
            ->add('tariffs')
            ->add('phoneNo')
            ->add('address');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('name')
            ->add('tariffs')
            ->add('phoneNo')
            ->add('address');
    }
}