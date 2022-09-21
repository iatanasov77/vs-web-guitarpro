<?php namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\UserManagement\User;
use App\Entity\Tablature;
use App\Entity\TablatureShare;

class EditShareForm extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->setMethod( 'POST' )
            ->add( 'id', HiddenType::class, ['mapped' => false] )
                
            ->add( 'targetUsers', EntityType::class, [
                'label'                 => 'vs_wgp.form.share_tablature.target_users',
                'translation_domain'    => 'WebGuitarPro',
                
                'multiple'              => true,
                'class'                 => User::class,
                'choice_label'          => 'email',
                'placeholder'           => 'vs_wgp.form.share_tablature.target_users_placeholder',
            ])
            
            ->add( 'tablatures', EntityType::class, [
                'label'                 => 'vs_wgp.form.share_tablature.shared_tablatures',
                'translation_domain'    => 'WebGuitarPro',
                
                'multiple'              => true,
                'class'                 => Tablature::class,
                'choice_label'          => function ( Tablature $tab ) {
                    return $tab->getArtist() . ' - ' . $tab->getSong();
                },
                'placeholder'           => 'vs_wgp.form.share_tablature.shared_tablatures_placeholder',
            ])
        ;
    }
    
    public function configureOptions( OptionsResolver $resolver ) : void
    {
        parent::configureOptions( $resolver );
        
        $resolver
            ->setDefaults([
                'csrf_protection'   => true,
                'csrf_field_name'   => '_token',
                'csrf_token_id'     => 'wgp_tablature_share',
                'data_class'        => TablatureShare::class,
            ])
        ;
    }
    
    public function getName()
    {
        return 'vs_wgp.edit_share';
    }
}
