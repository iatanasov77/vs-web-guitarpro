<?php

declare(strict_types=1);

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220919174656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE WGP_TablatureShares_Tablatures (share_id INT NOT NULL, tablature_id INT NOT NULL, INDEX IDX_935F26E52AE63FDB (share_id), INDEX IDX_935F26E5EBE5F332 (tablature_id), PRIMARY KEY(share_id, tablature_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE WGP_TablatureShares_Tablatures ADD CONSTRAINT FK_935F26E52AE63FDB FOREIGN KEY (share_id) REFERENCES WGP_TablatureShares (id)');
        $this->addSql('ALTER TABLE WGP_TablatureShares_Tablatures ADD CONSTRAINT FK_935F26E5EBE5F332 FOREIGN KEY (tablature_id) REFERENCES WGP_Tablatures (id)');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id maintenance_page_id  INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id ) REFERENCES VSCMS_Pages (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id )');
        $this->addSql('ALTER TABLE VSPAY_Order CHANGE status status ENUM(\'shopping_cart\', \'paid_order\', \'failed_order\')');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares DROP FOREIGN KEY FK_41561AB2EBE5F332');
        $this->addSql('DROP INDEX IDX_41561AB2EBE5F332 ON WGP_Users_TablatureShares');
        $this->addSql('DROP INDEX `primary` ON WGP_Users_TablatureShares');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares CHANGE tablature_id share_id INT NOT NULL');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares ADD CONSTRAINT FK_41561AB22AE63FDB FOREIGN KEY (share_id) REFERENCES WGP_TablatureShares (id)');
        $this->addSql('CREATE INDEX IDX_41561AB22AE63FDB ON WGP_Users_TablatureShares (share_id)');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares ADD PRIMARY KEY (user_id, share_id)');
        $this->addSql('CREATE UNIQUE INDEX owner_share_unique_idx ON WGP_TablatureShares (owner_id, name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE WGP_TablatureShares_Tablatures DROP FOREIGN KEY FK_935F26E52AE63FDB');
        $this->addSql('ALTER TABLE WGP_TablatureShares_Tablatures DROP FOREIGN KEY FK_935F26E5EBE5F332');
        $this->addSql('DROP TABLE WGP_TablatureShares_Tablatures');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id  maintenance_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id) REFERENCES VSCMS_Pages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id)');
        $this->addSql('ALTER TABLE VSPAY_Order CHANGE status status VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX owner_share_unique_idx ON WGP_TablatureShares');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares DROP FOREIGN KEY FK_41561AB22AE63FDB');
        $this->addSql('DROP INDEX IDX_41561AB22AE63FDB ON WGP_Users_TablatureShares');
        $this->addSql('DROP INDEX `PRIMARY` ON WGP_Users_TablatureShares');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares CHANGE share_id tablature_id INT NOT NULL');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares ADD CONSTRAINT FK_41561AB2EBE5F332 FOREIGN KEY (tablature_id) REFERENCES WGP_Tablatures (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_41561AB2EBE5F332 ON WGP_Users_TablatureShares (tablature_id)');
        $this->addSql('ALTER TABLE WGP_Users_TablatureShares ADD PRIMARY KEY (user_id, tablature_id)');
    }
}
