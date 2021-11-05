<?php

namespace App\Controller\Admin;

use App\Entity\TypeBook;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeBookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeBook::class;
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
