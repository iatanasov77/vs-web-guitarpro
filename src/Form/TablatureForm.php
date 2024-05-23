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
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use App\Entity\Tablature;
use App\Entity\TablatureCategory;

class TablatureForm extends AbstractForm
{
    /** @var TokenStorageInterface */
    private $tokenStorage;
    
    public function __construct(
        string $dataClass,
        TokenStorageInterface $tokenStorage,
        RequestStack $requestStack
    ) {
        parent::__construct( $dataClass );
        
        $this->tokenStorage = $tokenStorage;
        $this->requestStack = $requestStack;
    }
    
    public function buildForm( FormBuilderInterface $builder, array $options ): void
    {
        parent::buildForm( $builder, $options );
        
        $entity = $builder->getData();
        $builder
            ->add( '_currentUrl', HiddenType::class, ['mapped' => false] )
            
            ->add( 'enabled', CheckboxType::class, [
                'required'              => false,
                
                'label'                 => 'vs_wgp.form.public',
                'translation_domain'    => 'WebGuitarPro',
            ])
            
            ->add( 'artist', TextType::class, [
                'label'                 => 'vs_wgp.form.tablature.artist',
                'translation_domain'    => 'WebGuitarPro',
            ])
            ->add( 'song', TextType::class, [
                'label'                 => 'vs_wgp.form.tablature.song',
                'translation_domain'    => 'WebGuitarPro',
            ])
            
            ->add( 'tablature', FileType::class, [
                'mapped'                => false,
                'required'              => is_null( $entity->getId() ),
                
                'label'                 => 'vs_wgp.form.tablature.tablature',
                'translation_domain'    => 'WebGuitarPro',
                
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/octet-stream',
                            'audio/x-guitar-pro',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid GuitarPro file',
                    ])
                ],
            ])
            
            ->add( 'category_taxon', EntityType::class, [
                'label'                 => 'vs_cms.form.page.categories',
                'translation_domain'    => 'VSCmsBundle',
                'multiple'              => true,    // Multiple Can be Changed in Template
                'required'              => false,
                'mapped'                => false,
                'placeholder'           => 'vs_cms.form.page.categories_placeholder',
                
                'class'                 => TablatureCategory::class,
                'choice_label'          => function ( $category ) {
                    return $category->getNameTranslated( $this->requestStack->getMainRequest()->getLocale() );
                },
                'query_builder'         => function ( EntityRepository $er )
                {
                    $qb     = $er->createQueryBuilder( 'tc' );
                    $token  = $this->tokenStorage->getToken();
                    if ( $token ) {
                        $qb->where( 'tc.user = :user' )->setParameter( 'user', $token->getUser() );
                    }
                    
                    return $qb;
                }
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
