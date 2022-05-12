<?php

declare(strict_types=1);

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512122531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE VSPAY_GatewayConfig (id INT AUTO_INCREMENT NOT NULL, gateway_name VARCHAR(255) NOT NULL, factory_name VARCHAR(255) NOT NULL, config LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', active TINYINT(1) NOT NULL, use_sandbox TINYINT(1) NOT NULL, sandbox_config LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VSPAY_Payment (id INT AUTO_INCREMENT NOT NULL, payment_method_id INT DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, client_email VARCHAR(255) DEFAULT NULL, client_id VARCHAR(255) DEFAULT NULL, total_amount INT DEFAULT NULL, currency_code VARCHAR(255) DEFAULT NULL, details LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_8936E3C05AA1164F (payment_method_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VSPAY_PaymentMethod (id INT AUTO_INCREMENT NOT NULL, gateway_id INT DEFAULT NULL, name VARCHAR(64) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_1CCD1B9F577F8E00 (gateway_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VSUS_PayedServiceCategories (id INT AUTO_INCREMENT NOT NULL, taxon_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_9E88F124DE13F470 (taxon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VSUS_PayedServiceSubscriptionPeriods (id INT AUTO_INCREMENT NOT NULL, payed_service_id INT DEFAULT NULL, subscription_period VARCHAR(64) NOT NULL, price VARCHAR(255) NOT NULL, currency VARCHAR(255) NOT NULL, INDEX IDX_1018A6BE5139FC0A (payed_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VSUS_PayedServiceSubscriptions (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, payed_service_id INT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_11A46ECAA76ED395 (user_id), INDEX IDX_11A46ECA5139FC0A (payed_service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VSUS_PayedServices (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(64) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_5E8A244512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD CONSTRAINT FK_8936E3C05AA1164F FOREIGN KEY (payment_method_id) REFERENCES VSPAY_PaymentMethod (id)');
        $this->addSql('ALTER TABLE VSPAY_PaymentMethod ADD CONSTRAINT FK_1CCD1B9F577F8E00 FOREIGN KEY (gateway_id) REFERENCES VSPAY_GatewayConfig (id)');
        $this->addSql('ALTER TABLE VSUS_PayedServiceCategories ADD CONSTRAINT FK_9E88F124DE13F470 FOREIGN KEY (taxon_id) REFERENCES VSAPP_Taxons (id)');
        $this->addSql('ALTER TABLE VSUS_PayedServiceSubscriptionPeriods ADD CONSTRAINT FK_1018A6BE5139FC0A FOREIGN KEY (payed_service_id) REFERENCES VSUS_PayedServices (id)');
        $this->addSql('ALTER TABLE VSUS_PayedServiceSubscriptions ADD CONSTRAINT FK_11A46ECAA76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)');
        $this->addSql('ALTER TABLE VSUS_PayedServiceSubscriptions ADD CONSTRAINT FK_11A46ECA5139FC0A FOREIGN KEY (payed_service_id) REFERENCES VSUS_PayedServices (id)');
        $this->addSql('ALTER TABLE VSUS_PayedServices ADD CONSTRAINT FK_5E8A244512469DE2 FOREIGN KEY (category_id) REFERENCES VSUS_PayedServiceCategories (id)');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id maintenance_page_id  INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id ) REFERENCES VSCMS_Pages (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id )');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE VSPAY_PaymentMethod DROP FOREIGN KEY FK_1CCD1B9F577F8E00');
        $this->addSql('ALTER TABLE VSPAY_Payment DROP FOREIGN KEY FK_8936E3C05AA1164F');
        $this->addSql('ALTER TABLE VSUS_PayedServices DROP FOREIGN KEY FK_5E8A244512469DE2');
        $this->addSql('ALTER TABLE VSUS_PayedServiceSubscriptionPeriods DROP FOREIGN KEY FK_1018A6BE5139FC0A');
        $this->addSql('ALTER TABLE VSUS_PayedServiceSubscriptions DROP FOREIGN KEY FK_11A46ECA5139FC0A');
        $this->addSql('DROP TABLE VSPAY_GatewayConfig');
        $this->addSql('DROP TABLE VSPAY_Payment');
        $this->addSql('DROP TABLE VSPAY_PaymentMethod');
        $this->addSql('DROP TABLE VSUS_PayedServiceCategories');
        $this->addSql('DROP TABLE VSUS_PayedServiceSubscriptionPeriods');
        $this->addSql('DROP TABLE VSUS_PayedServiceSubscriptions');
        $this->addSql('DROP TABLE VSUS_PayedServices');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id  maintenance_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id) REFERENCES VSCMS_Pages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id)');
    }
}
