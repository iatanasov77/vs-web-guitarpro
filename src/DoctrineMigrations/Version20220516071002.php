<?php

declare(strict_types=1);

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516071002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id maintenance_page_id  INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id ) REFERENCES VSCMS_Pages (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id )');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD paid_service_period_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD CONSTRAINT FK_8936E3C0F504121C FOREIGN KEY (paid_service_period_id) REFERENCES VSUS_PayedServiceSubscriptionPeriods (id)');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD CONSTRAINT FK_8936E3C0A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)');
        $this->addSql('CREATE INDEX IDX_8936E3C0F504121C ON VSPAY_Payment (paid_service_period_id)');
        $this->addSql('CREATE INDEX IDX_8936E3C0A76ED395 ON VSPAY_Payment (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id  maintenance_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id) REFERENCES VSCMS_Pages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id)');
        $this->addSql('ALTER TABLE VSPAY_Payment DROP FOREIGN KEY FK_8936E3C0F504121C');
        $this->addSql('ALTER TABLE VSPAY_Payment DROP FOREIGN KEY FK_8936E3C0A76ED395');
        $this->addSql('DROP INDEX IDX_8936E3C0F504121C ON VSPAY_Payment');
        $this->addSql('DROP INDEX IDX_8936E3C0A76ED395 ON VSPAY_Payment');
        $this->addSql('ALTER TABLE VSPAY_Payment DROP paid_service_period_id, DROP user_id');
    }
}
