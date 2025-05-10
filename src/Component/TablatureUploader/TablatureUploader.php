<?php namespace App\Component\TablatureUploader;

use League\Flysystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;
use Webmozart\Assert\Assert;

use Vankosoft\CmsBundle\Component\Uploader\AbstractFileUploader;
use Vankosoft\CmsBundle\Model\Interfaces\FileInterface;

class TablatureUploader extends AbstractFileUploader
{
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
        
        $tablatureFile->setType( $this->filesystem->mimeType( $tablatureFile->getPath() ) );
    }
}
