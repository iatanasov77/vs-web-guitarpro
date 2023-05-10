<?php

declare(strict_types=1);

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510050006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE WGP_TablatureCategories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, taxon_id INT NOT NULL, INDEX IDX_EF9842F4727ACA70 (parent_id), UNIQUE INDEX UNIQ_EF9842F4DE13F470 (taxon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE WGP_Tablatures_Categories (tablature_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_97CB9EDBEBE5F332 (tablature_id), INDEX IDX_97CB9EDB12469DE2 (category_id), PRIMARY KEY(tablature_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE WGP_TablatureCategories ADD CONSTRAINT FK_EF9842F4727ACA70 FOREIGN KEY (parent_id) REFERENCES WGP_TablatureCategories (id)');
        $this->addSql('ALTER TABLE WGP_TablatureCategories ADD CONSTRAINT FK_EF9842F4DE13F470 FOREIGN KEY (taxon_id) REFERENCES VSAPP_Taxons (id)');
        $this->addSql('ALTER TABLE WGP_Tablatures_Categories ADD CONSTRAINT FK_97CB9EDBEBE5F332 FOREIGN KEY (tablature_id) REFERENCES WGP_Tablatures (id)');
        $this->addSql('ALTER TABLE WGP_Tablatures_Categories ADD CONSTRAINT FK_97CB9EDB12469DE2 FOREIGN KEY (category_id) REFERENCES WGP_TablatureCategories (id)');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id maintenance_page_id  INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id ) REFERENCES VSCMS_Pages (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id )');
        $this->addSql('ALTER TABLE WGP_Tablatures ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B4690701989D9B62 ON WGP_Tablatures (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE WGP_TablatureCategories DROP FOREIGN KEY FK_EF9842F4727ACA70');
        $this->addSql('ALTER TABLE WGP_Tablatures_Categories DROP FOREIGN KEY FK_97CB9EDB12469DE2');
        $this->addSql('DROP TABLE WGP_TablatureCategories');
        $this->addSql('DROP TABLE WGP_Tablatures_Categories');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id  maintenance_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id) REFERENCES VSCMS_Pages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id)');
        $this->addSql('DROP INDEX UNIQ_B4690701989D9B62 ON WGP_Tablatures');
        $this->addSql('ALTER TABLE WGP_Tablatures DROP slug');
    }
}
