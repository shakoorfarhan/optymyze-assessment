<?php

namespace App\Admin;

use App\Entity\Tariff;
use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class TariffAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('type', TextType::class);
        $form->add('user', EntityType::class,[
            'class' => User::class,
            'choice_label' => 'name'
        ]);
        $form->add('tariff', IntegerType::class, array(
            'label'=> 'Tariff (%age)'
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('user');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->add('type');
        $list->add('tariff', IntegerType::class, array(
            'label' => 'Tariff (%age)'
        ));
        $list->add('user');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('type');
        $show->add('tariff', IntegerType::class, array(
            'label' => 'Tariff (%age)'
        ));
        $show->add('user');
    }
}