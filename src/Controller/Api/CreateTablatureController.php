<?php namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Factory\Factory;

use App\Component\TablatureUploader\TablatureUploader;
use App\Entity\Tablature;

/*
 * Manuals:
 * ========
 *  https://api-platform.com/docs/core/file-upload/
 *  https://digitalfortress.tech/php/file-upload-with-api-platform-and-symfony/
 */
class CreateTablatureController extends AbstractController
{
    /** @var TokenStorageInterface */
    private $tokenStorage;
    
    /** @var ManagerRegistry */
    private $doctrine;
    
    /** @var Factory */
    private $tablaturesFactory;
    
    /** @var Factory */
    private $tablaturesFilesFactory;
    
    /** @var TablatureUploader */
    private $uploader;
    
    public function __construct(
        TokenStorageInterface $tokenStorage,
        ManagerRegistry $doctrine,
        Factory $tablaturesFactory,
        Factory $tablaturesFilesFactory,
        TablatureUploader $uploader
    ) {
        $this->tokenStorage             = $tokenStorage;
        $this->doctrine                 = $doctrine;
        $this->tablaturesFactory        = $tablaturesFactory;
        $this->tablaturesFilesFactory   = $tablaturesFilesFactory;
        $this->uploader                 = $uploader;
    }
    
    public function __invoke( Request $request ): Tablature
    {
        $formData   = $this->getFormData( $request );
        $entity     = $this->tablaturesFactory->createNew();
        
        $entity->setEnabled( filter_var( $formData['published'], FILTER_VALIDATE_BOOLEAN ) );
        $entity->setArtist( $formData['artist'] );
        $entity->setSong( $formData['song'] );
        
        $entity->setUser( $this->getUser() );
        
        $tabFile    = $request->files->get( 'tablature' );
        //var_dump( $tabFile->getClientOriginalName() ); die;
        if ( $tabFile ) {
            $this->createTablature( $entity, $tabFile );
        } else {
            throw new BadRequestHttpException( '"file" is required' );
        }
        
        $em = $this->doctrine->getManager();
        $em->persist( $entity );
        $em->flush();
        
        return $entity;
    }
    
    private function getFormData( Request $request ): array
    {
        return [
            'published' => $request->request->get( 'published' ),
            'artist'    => $request->request->get( 'artist' ),
            'song'      => $request->request->get( 'song' ),
        ];    
    }
    
    private function createTablature( Tablature &$tablature, File $file ): void
    {
        $tablatureFile  = $tablature->getTablatureFile() ?: $this->tablaturesFilesFactory->createNew();
        $tablatureFile->setOriginalName( $file->getClientOriginalName() );
        $tablatureFile->setTablature( $tablature );
        
        $uploadedFile   = new UploadedFile( $file->getRealPath(), $file->getBasename() );
        $tablatureFile->setFile( $uploadedFile );
        $this->uploader->upload( $tablatureFile );
        $tablatureFile->setFile( null ); // reset File Because: Serialization of 'Symfony\Component\HttpFoundation\File\UploadedFile' is not allowed
        
        if ( ! $tablature->getTablatureFile() ) {
            $tablature->setTablatureFile( $tablatureFile );
        }
    }
}
