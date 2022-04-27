<?php

namespace App\Controller\Admin;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NewsCrudController extends AbstractCrudController
{
    public const NEWS_BASE_PATH = 'upload/images/news';
    public const NEWS_UPLOAD_DIR = 'public/upload/images/news';

    public static function getEntityFqcn(): string
    {
        return News::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
            ImageField::new('image')
                ->setBasePath(self::NEWS_BASE_PATH)
                ->setUploadDir(self::NEWS_UPLOAD_DIR),
            DateField::new('createdAt')->hideOnForm(),
            DateField::new('updatedAt')->hideOnForm()

        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof News) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);
        parent::persistEntity($entityManager, $entityInstance);
    }
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof News) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);
        parent::updateEntity($entityManager, $entityInstance);
    }

}
