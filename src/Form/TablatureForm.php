<?php namespace App\Form;

use Vankosoft\ApplicationBundle\Form\AbstractForm;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Tablature;
use App\Entity\TablatureCategory;

class TablatureForm extends AbstractForm
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        parent::buildForm( $builder, $options );
        
        $builder
            ->add( '_currentUrl', HiddenType::class, ['mapped' => false] )
            
            ->add( 'enabled', CheckboxType::class, [
                'label'                 => 'vs_wgp.form.public',
                'translation_domain'    => 'WebGuitarPro',
                'required'              => false,
            ])
            
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
            
            ->add( 'category_taxon', EntityType::class, [
                'label'                 => 'vs_cms.form.page.categories',
                'translation_domain'    => 'VSCmsBundle',
                'multiple'              => true,
                'required'              => false,
                'mapped'                => false,
                'placeholder'           => 'vs_cms.form.page.categories_placeholder',
                
                'class'                 => TablatureCategory::class,
                'choice_label'          => 'name',
            ])
            
            

        ;
    }
    
    public function configureOptions( OptionsResolver $resolver ): void
    {
        parent::configureOptions( $resolver );
        
        $resolver->setDefaults([
            'data_class'        => Tablature::class,
            'csrf_protection'   => false,
        ]);
    }
    
    public function getName()
    {
        return 'vs_wgp.tablature';
    }
}
