<?php namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

use App\Entity\Tablature;

class TablatureForm extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( '_currentUrl', HiddenType::class, ['mapped' => false] )
            
            ->add( 'artist', TextType::class, ['label' => 'Artist'] )
            ->add( 'song', TextType::class, ['label' => 'Song'] )
            
            ->add( 'tablature', FileType::class, [
                'label' => 'Tablature',
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            //'application/octet-stream',
                            'audio/x-guitar-pro',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid GuitarPro file',
                    ])
                ],
            ])
            ->add( 'btnSave', SubmitType::class, ['label' => 'Save'] )
        ;
    }
    
    public function configureOptions( OptionsResolver $resolver )
    {
        $resolver->setDefaults([
            'data_class'        => Tablature::class,
            'csrf_protection'   => false,
        ]);
    }
}
