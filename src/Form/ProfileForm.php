<?php namespace Vankosoft\UsersBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;


use Vankosoft\UsersBundle\Model\UserInterface;

class ProfileForm extends UserFormType
{
    use Traits\UserInfoFormTrait;
    
    public function __construct( RequestStack $requestStack, string $dataClass, string $applicationClass, AuthorizationCheckerInterface $auth )
    {
        parent::__construct( $requestStack, $dataClass, $applicationClass, $auth );
    }
    
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        parent::buildForm( $builder, $options );
        
        $this->buildUserInfoForm( $builder, $options );
        $builder->setMethod( 'POST' );
        
        $builder->remove( 'enabled' );
        $builder->remove( 'verified' );
        $builder->remove( 'roles_options' );
        $builder->remove( 'applications' );
        $builder->remove( 'plain_password' );
        $builder->remove( 'email' );
        $builder->remove( 'username' );
    }
    
    public function configureOptions( OptionsResolver $resolver ) : void
    {
        parent::configureOptions( $resolver );
        
        $resolver
            ->setDefined([
                'users',
            ])
            ->setAllowedTypes( 'users', UserInterface::class )
            
            ->setDefaults([
                'csrf_protection'       => false,
                'profilePictureMapped'  => false,
                'firstNameMapped'       => false,
                'lastNameMapped'        => false,
            ])
        ;
    }
    
    public function getName()
    {
        return 'vs_users.profile';
    }
}
