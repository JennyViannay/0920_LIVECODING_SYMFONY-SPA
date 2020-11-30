<?php

namespace App\Controller\Admin;

use App\Entity\Refuge;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RefugeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Refuge::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
