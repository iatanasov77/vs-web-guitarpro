<?php namespace App\Form;

use Vankosoft\ApplicationBundle\Form\AbstractForm;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\RequestStack;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Component\I18N;
use App\Entity\TablatureCategory;

class TablatureCategoryForm extends AbstractForm
{
    protected $requestStack;
    protected $categoryClass;
    
    public function __construct(
        string $dataClass,
        RequestStack $requestStack
    ) {
        parent::__construct( $dataClass );
        
        $this->requestStack     = $requestStack;
        $this->categoryClass    = $dataClass;
    }
    
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        parent::buildForm( $builder, $options );
        
        $category   = $options['data'];
        
        $builder
            ->add( '_currentUrl', HiddenType::class, ['mapped' => false] )
            
            ->add( 'currentLocale', ChoiceType::class, [
                'choices'               => \array_flip( I18N::LanguagesAvailable() ),
                'data'                  => $this->requestStack->getCurrentRequest()->getLocale(),
                'mapped'                => false,
                'label'                 => 'vs_wgp.form.locale',
                'translation_domain'    => 'WebGuitarPro',
            ])
            ->add( 'name', TextType::class, [
                'label'                 => 'vs_wgp.form.name',
                'translation_domain'    => 'WebGuitarPro',
            ])
            
            ->add( 'parent', EntityType::class, [
                'label'                 => 'vs_cms.form.category.parent_category',
                'translation_domain'    => 'VSCmsBundle',
                'class'                 => $this->categoryClass,
                'query_builder'         => function ( EntityRepository $er ) use ( $category )
                {
                    $qb = $er->createQueryBuilder( 'tc' );
                    if  ( $category && $category->getId() ) {
                        $qb->where( 'tc.id != :id' )->setParameter( 'id', $category->getId() );
                    }
                    
                    return $qb;
                },
                'choice_label'  => 'name',
                
                'required'      => false,
                'placeholder'   => 'vs_cms.form.category.parent_category_placeholder',
            ])
        ;
    }
    
    public function configureOptions( OptionsResolver $resolver ): void
    {
        parent::configureOptions( $resolver );
        
        $resolver->setDefaults([
            'data_class'        => TablatureCategory::class,
            'csrf_protection'   => false,
        ]);
    }
    
    public function getName()
    {
        return 'vs_wgp.tablature_category';
    }
}
