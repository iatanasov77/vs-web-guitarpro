<?php namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Vankosoft\UsersBundle\Model\UserInterface;

class RegistrationForm extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->setMethod( 'POST' )
            
            ->add( 'email', TextType::class, [
                'label' => 'vs_users.form.user.email',
                'translation_domain' => 'VSUsersBundle',
                'attr'  => [
                    'placeholder' => 'vs_users.form.user.email'
                ],
            ])
            ->add( 'username', TextType::class, [
                'label' => 'vs_users.form.user.username',
                'translation_domain' => 'VSUsersBundle',
                'attr'  => [
                    'placeholder' => 'vs_users.form.user.username'
                ],
            ])
            
            ->add( 'plain_password', RepeatedType::class, [
                'type'                  => PasswordType::class,
                'label'                 => 'vs_users.form.user.password',
                'translation_domain'    => 'VSUsersBundle',
                'first_options'         => [
                    'label' => 'vs_users.form.user.password',
                    'attr'  => [
                        'placeholder' => 'vs_users.form.user.password'
                    ],
                ],
                'second_options'        => [
                    'label' => 'vs_users.form.user.password_repeat',
                    'attr'  => [
                        'placeholder' => 'vs_users.form.user.password_repeat'
                    ],
                ],
                "mapped"                => false,
            ])
            
            ->add( 'agreeTerms', CheckboxType::class, [
                'label'                 => 'vs_users.form.registration.agree_terms',
                'translation_domain'    => 'VSUsersBundle',
                'mapped'                => false,
            ])
            ->add( 'btnRgister', SubmitType::class, [
                'label' => 'vs_users.form.registration.register',
                'translation_domain' => 'VSUsersBundle'
            ])
        ;
    }
    
    public function configureOptions( OptionsResolver $resolver ) : void
    {   
        parent::configureOptions( $resolver );
        
        $resolver
            ->setDefaults([
                'csrf_protection' => true,
                'csrf_field_name' => '_token',
                'csrf_token_id'   => 'registration',
            ])
            ->setDefined([
                'user',
            ])
            ->setAllowedTypes( 'user', UserInterface::class )
        ;
    }

    public function getName()
    {
        return 'wct_user.registration';
    }
}
