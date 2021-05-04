<?php

namespace App\Form;

use App\Entity\Block;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class BlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content', CKEditorType::class, [
                'config' => [
                    'allowedContent' => true
                ]
            ])
            ->add('sort')
            ->add('template', ChoiceType::class, [
                'choices' => [
                    'custom_white' => 'custom',
                    'custom_gtay' => 'custom-light-gray',
                    'review_block' => 'review',
                    'dev_block' => 'dev',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Block::class,
        ]);
    }
}
