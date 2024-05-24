<?php namespace App\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

use Vankosoft\UsersBundle\Form\UserFormType;
use Vankosoft\UsersBundle\Model\UserInterface;
use Vankosoft\UsersBundle\Form\Traits\UserInfoFormTrait;
use Vankosoft\PaymentBundle\Model\Interfaces\PricingPlanInterface;

/*
 * Form Inheritance:
 * https://stackoverflow.com/questions/22414166/inherit-form-or-add-type-to-each-form
 */
class RegistrationForm extends UserFormType
{
    use UserInfoFormTrait;
    
    /** @var string */
    private $pricingPlanClass;
    
    /** @var RepositoryInterface */
    private $pricingPlanRepository;
    
    public function __construct(
        string $dataClass,
        RepositoryInterface $localesRepository,
        RequestStack $requestStack,
        string $applicationClass,
        AuthorizationCheckerInterface $auth,
        array $requiredFields,
        string $pricingPlanClass,
        RepositoryInterface $pricingPlanRepository
    ) {
        parent::__construct( $dataClass, $localesRepository, $requestStack, $applicationClass, $auth, $requiredFields );
        
        $this->pricingPlanClass         = $pricingPlanClass;
        $this->pricingPlanRepository    = $pricingPlanRepository;
    }
    
    public function buildForm( FormBuilderInterface $builder, array $options ): void
    {
        parent::buildForm( $builder, $options );
        $this->buildUserInfoForm( $builder, $options );
        
        $builder->remove( 'enabled' );
        $builder->remove( 'verified' );
        
        $builder->remove( 'roles_options' );
        $builder->remove( 'applications' );
        $builder->remove( 'username' );
        
        $builder->remove( 'btnSave' );
        
        $builder
            ->setMethod( 'POST' )
            
            ->add( 'designation', HiddenType::class, [
                'mapped'    => $options['designationMapped'],
                'data'      => 'Musician / User']
            )
            
            ->add( 'pricingPlan', ChoiceType::class, [
                'label'                 => 'vs_vvp.form.register.pricing_plan_select',
                'placeholder'           => 'vs_vvp.form.register.pricing_plan_select_placeholder',
                'translation_domain'    => 'VanzVideoPlayer',
                'choices'               => $this->pricingPlanRepository->findAllForForm(),
                'required'              => false,
                'mapped'                => false,
            ])
            
            ->add( 'agreeTerms', CheckboxType::class, [
                'label'                 => 'vs_users.form.registration.agreement_text',
                'translation_domain'    => 'VSUsersBundle',
                'mapped'                => false,
            ])
            
            ->add( 'btnRgister', SubmitType::class, [
                'label' => 'vs_users.form.registration.register',
                'translation_domain' => 'VSUsersBundle'
            ])
        ;
    }
    
    public function configureOptions( OptionsResolver $resolver ): void
    {   
        parent::configureOptions( $resolver );
        
        $resolver
            ->setDefaults([
                'csrf_protection'       => true,
                
                'profilePictureMapped'  => false,
                'titleMapped'           => false,
                'firstNameMapped'       => false,
                'lastNameMapped'        => false,
                'designationMapped'     => false,
            ])
            ->setDefined([
                'users',
            ])
            ->setAllowedTypes( 'users', UserInterface::class )
        ;
    }

    public function getName()
    {
        return 'vs_users.registration';
    }
}
