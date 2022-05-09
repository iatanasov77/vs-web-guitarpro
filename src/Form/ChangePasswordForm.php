<?php namespace Vankosoft\UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

use Vankosoft\UsersBundle\Model\UserInterface;

class ChangePasswordForm extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {        
        $builder
            ->setMethod( 'POST' )
            
            ->add( 'oldPassword', PasswordType::class, [
                'label'                 => 'vs_users.form.profile.change_password.old_password',
                'translation_domain'    => 'VSUsersBundle',
                'mapped'                => false,
            ])
            
            ->add( 'password', RepeatedType::class, [
                'type'                  => PasswordType::class,
                'label'                 => 'vs_users.form.profile.change_password.new_password',
                'translation_domain'    => 'VSUsersBundle',
                'first_options'         => ['label' => 'vs_users.form.profile.change_password.new_password'],
                'second_options'        => ['label' => 'vs_users.form.profile.change_password.new_password_repeat'],
                'mapped'                => false,
            ])
            
            ->add( 'btnSave', SubmitType::class, [
                'label' => 'vs_users.form.user.save',
                'translation_domain' => 'VSUsersBundle'
            ])
            ->add( 'btnCancel', ButtonType::class, [
                'label' => 'vs_users.form.user.cancel',
                'translation_domain' => 'VSUsersBundle'
            ])
        ;
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
                'csrf_protection'   => false,
                'data_class'        => UserInterface::class,
            ])
        ;
    }

    public function getName()
    {
        return 'vs_users.profile.change_password';
    }
}

