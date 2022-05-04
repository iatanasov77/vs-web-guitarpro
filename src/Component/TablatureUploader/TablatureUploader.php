<?php namespace App\Component\TablatureUploader;

use Gaufrette\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Webmozart\Assert\Assert;

use Vankosoft\CmsBundle\Component\Uploader\FileUploaderInterface;
use Vankosoft\CmsBundle\Component\Generator\FilePathGeneratorInterface;
use Vankosoft\CmsBundle\Model\FileInterface;

class TablatureUploader implements FileUploaderInterface
{
    /** @var Filesystem */
    protected $filesystem;
    
    /** @var FilePathGeneratorInterface */
    protected $filePathGenerator;
    
    public function __construct(
        Filesystem $filesystem,
        FilePathGeneratorInterface $filePathGenerator
    ) {
            $this->filesystem = $filesystem;
            
            if ( $filePathGenerator === null ) {
                @trigger_error( sprintf(
                    'Not passing an $filePathGenerator to %s constructor is deprecated since Sylius 1.6 and will be not possible in Sylius 2.0.',
                    self::class
                ), \E_USER_DEPRECATED );
            }
            
            $this->filePathGenerator = $filePathGenerator ?? new FilePathGenerator();
    }
    
    public function upload( FileInterface $tablatureFile ): void
    {
        if ( ! $tablatureFile->hasFile() ) {
            return;
        }
        
        $file = $tablatureFile->getFile();
        
        /** @var File $file */
        Assert::isInstanceOf( $file, File::class );
        
        if ( null !== $tablatureFile->getPath() && $this->has( $tablatureFile->getPath() ) ) {
            $this->remove( $tablatureFile->getPath() );
        }
        
        do {
            $path = $this->filePathGenerator->generate( $tablatureFile );
        } while ( $this->isAdBlockingProne( $path ) || $this->filesystem->has( $path ) );
        
        $tablatureFile->setPath( $path );
        
        $this->filesystem->write(
            $tablatureFile->getPath(),
            file_get_contents( $tablatureFile->getFile()->getPathname() )
        );
        
        if ( method_exists ( $this->filesystem->getAdapter(), 'mimeType' ) ) {
            $tablatureFile->setType( $this->filesystem->getAdapter()->mimeType( $tablatureFile->getPath() ) );
        }
    }
    
    public function remove( string $path ): bool
    {
        if ( $this->filesystem->has( $path ) ) {
            return $this->filesystem->delete( $path );
        }
        
        return false;
    }
    
    private function has( string $path ): bool
    {
        return $this->filesystem->has( $path );
    }
    
    /**
     * Will return true if the path is prone to be blocked by ad blockers
     */
    private function isAdBlockingProne( string $path ): bool
    {
        return strpos( $path, 'ad' ) !== false;
    }
}
