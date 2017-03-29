<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;;

class FichaAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id', 'integer')
            ->add('titulo')
            ->add('categoria')
            ->add('calle')
            ->add('codigoPostal')
            ->add('ciudad')
            ->add('comunidadAutonoma')
            ->add('pais')
            ->add('email')
            ->add('web')
            ->add('personaDeContacto')
            ->add('telefono')
            ->add('fax')
            ->add('hotline')
            ->add('descripcion')
            ->add('longitud')
            ->add('latitud')
            ->add('poblacion')
            ->add('descripcionLarga')
            ->add('cif')
            ->add('tipoFicha')
            ->add('perfilRedesSociales')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titulo')
            ->add('categoria')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titulo')
            ->addIdentifier('categoria')
        ;
    }
} 