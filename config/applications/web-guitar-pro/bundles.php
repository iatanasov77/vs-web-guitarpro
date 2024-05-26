<?php

return [
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true, 'test' => true],
	Symfony\WebpackEncoreBundle\WebpackEncoreBundle::class => ['all' => true],
	
	SymfonyCasts\Bundle\VerifyEmail\SymfonyCastsVerifyEmailBundle::class => ['all' => true],
    SymfonyCasts\Bundle\ResetPassword\SymfonyCastsResetPasswordBundle::class => ['all' => true],
	
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle::class => ['all' => true],
    
	FOS\RestBundle\FOSRestBundle::class => ['all' => true],
    FOS\CKEditorBundle\FOSCKEditorBundle::class => ['all' => true],
    
    Knp\Bundle\MenuBundle\KnpMenuBundle::class => ['all' => true],
    Knp\Bundle\PaginatorBundle\KnpPaginatorBundle::class => ['all' => true],
	Knp\Bundle\TimeBundle\KnpTimeBundle::class => ['all' => true],
	Knp\Bundle\GaufretteBundle\KnpGaufretteBundle::class => ['all' => true],
	Artgris\Bundle\FileManagerBundle\ArtgrisFileManagerBundle::class => ['all' => true],
	Liip\ImagineBundle\LiipImagineBundle::class => ['all' => true],
	
	BabDev\PagerfantaBundle\BabDevPagerfantaBundle::class => ['all' => true],
    Sylius\Bundle\ResourceBundle\SyliusResourceBundle::class => ['all' => true],
    Sylius\Bundle\ThemeBundle\SyliusThemeBundle::class => ['all' => true],
	
    winzou\Bundle\StateMachineBundle\winzouStateMachineBundle::class => ['all' => true],
	JMS\SerializerBundle\JMSSerializerBundle::class => ['all' => true],
    Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle::class => ['all' => true],
    Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle::class => ['all' => true],
    
    Vankosoft\AgentBundle\VSAgentBundle::class => ['all' => true],
    Vankosoft\ApplicationInstalatorBundle\VSApplicationInstalatorBundle::class => ['all' => true],
    Vankosoft\ApplicationBundle\VSApplicationBundle::class => ['all' => true],
    Vankosoft\CmsBundle\VSCmsBundle::class => ['all' => true],
    Vankosoft\UsersBundle\VSUsersBundle::class => ['all' => true],
	
	FOS\JsRoutingBundle\FOSJsRoutingBundle::class => ['all' => true],
    Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle::class => ['all' => true],
	Hackzilla\Bundle\PasswordGeneratorBundle\HackzillaPasswordGeneratorBundle::class => ['all' => true],
    
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['all' => true],
    
    Payum\Bundle\PayumBundle\PayumBundle::class => ['all' => true],
    Vankosoft\UsersSubscriptionsBundle\VSUsersSubscriptionsBundle::class => ['all' => true],
    Vankosoft\PaymentBundle\VSPaymentBundle::class => ['all' => true],
    Vankosoft\BoricaBundle\VSBoricaBundle::class => ['all' => true],
    Vankosoft\CatalogBundle\VSCatalogBundle::class => ['all' => true],
];
