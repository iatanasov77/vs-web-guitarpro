<?php namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\UserManagement\User;

class ShareTablatureForm extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->setMethod( 'POST' )
            
            ->add( 'tablatureId', HiddenType::class )
            ->add( 'shareId', HiddenType::class )
            
            ->add( 'name', TextType::class, [
                'label'                 => 'vs_wgp.form.share_tablature.name',
                'translation_domain'    => 'WebGuitarPro',
                'attr'  => [
                    'placeholder' => 'vs_wgp.form.share_tablature.name_placeholder'
                ],
            ])
            
            ->add( 'targetUsers', EntityType::class, [
                'label'                 => 'vs_wgp.form.share_tablature.target_users',
                'translation_domain'    => 'WebGuitarPro',
                
                'multiple'              => true,
                'class'                 => User::class,
                'choice_label'          => 'email',
                'placeholder'           => 'vs_wgp.form.share_tablature.target_users_placeholder',
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
                'csrf_token_id'   => 'wgp_tablature_share',
            ])
        ;
    }
    
    public function getName()
    {
        return 'vs_wgp.share_tablature';
    }
}
