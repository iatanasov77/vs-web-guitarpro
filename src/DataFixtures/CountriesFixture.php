<?php namespace App\DataFixtures;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Bundle\FixturesBundle\Fixture\FixtureInterface;

use Symfony\Component\Intl\Countries;

/**
 * @REFERENCE: https://github.com/Sylius/SyliusFixturesBundle/blob/master/docs/custom_fixture.md
 */
final class CountriesFixture extends AbstractFixture implements FixtureInterface
{
    /** @var ObjectManager */
    private $countryManager;
    
    public function __construct( EntityManagerInterface $countryManager )
    {
        $this->countryManager = $countryManager;
    }
    
    public function getName(): string
    {
        return 'test_countries';
    }
    
    public function load(   array $options  ): void
    {
        foreach ( $options['countries'] as $countryCode ) {
            //$country    = new Country( $countryCode );
            
            //$this->countryManager->persist( $country );
        }
        
        $this->countryManager->flush();
    }
    
    protected function configureOptionsNode( ArrayNodeDefinition $optionsNode ): void
    {//var_dump( Countries::getNames() ); die;
        $optionsNode
            ->children()
                ->arrayNode( 'countries' )
                    ->performNoDeepMerging()
                    ->defaultValue( array_keys( Countries::getNames() ) )
                    ->prototype( 'scalar' )
        ;
    }
}
