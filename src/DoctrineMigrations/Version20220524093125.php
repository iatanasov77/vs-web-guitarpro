<?php

declare(strict_types=1);

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524093125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE VSPAY_Order (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, payment_method_id INT DEFAULT NULL, payment_id INT DEFAULT NULL, total_amount DOUBLE PRECISION NOT NULL, currency_code VARCHAR(8) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, status ENUM(\'shopping_cart\', \'order\'), INDEX IDX_87954502A76ED395 (user_id), INDEX IDX_879545025AA1164F (payment_method_id), UNIQUE INDEX UNIQ_879545024C3A3BB (payment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE VSPAY_OrderItem (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, object_id INT DEFAULT NULL, object_type VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, currency_code VARCHAR(8) NOT NULL, INDEX IDX_1C9B655C8D9F6D38 (order_id), INDEX IDX_1C9B655C232D562B (object_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE VSPAY_Order ADD CONSTRAINT FK_87954502A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)');
        $this->addSql('ALTER TABLE VSPAY_Order ADD CONSTRAINT FK_879545025AA1164F FOREIGN KEY (payment_method_id) REFERENCES VSPAY_PaymentMethod (id)');
        $this->addSql('ALTER TABLE VSPAY_Order ADD CONSTRAINT FK_879545024C3A3BB FOREIGN KEY (payment_id) REFERENCES VSPAY_Payment (id)');
        $this->addSql('ALTER TABLE VSPAY_OrderItem ADD CONSTRAINT FK_1C9B655C8D9F6D38 FOREIGN KEY (order_id) REFERENCES VSPAY_Order (id)');
        $this->addSql('ALTER TABLE VSPAY_OrderItem ADD CONSTRAINT FK_1C9B655C232D562B FOREIGN KEY (object_id) REFERENCES VSUS_PayedServiceSubscriptionPeriods (id)');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id maintenance_page_id  INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id ) REFERENCES VSCMS_Pages (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id )');
        $this->addSql('ALTER TABLE VSPAY_GatewayConfig DROP active');
        $this->addSql('ALTER TABLE VSPAY_Payment DROP FOREIGN KEY FK_8936E3C05AA1164F');
        $this->addSql('ALTER TABLE VSPAY_Payment DROP FOREIGN KEY FK_8936E3C0A76ED395');
        $this->addSql('ALTER TABLE VSPAY_Payment DROP FOREIGN KEY FK_8936E3C0F504121C');
        $this->addSql('DROP INDEX IDX_8936E3C05AA1164F ON VSPAY_Payment');
        $this->addSql('DROP INDEX IDX_8936E3C0A76ED395 ON VSPAY_Payment');
        $this->addSql('DROP INDEX IDX_8936E3C0F504121C ON VSPAY_Payment');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD created_at DATETIME NOT NULL, DROP payment_method_id, DROP paid_service_period_id, DROP user_id');
        $this->addSql('ALTER TABLE VSUS_PayedServiceSubscriptionPeriods CHANGE currency currency_code VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE VSPAY_OrderItem DROP FOREIGN KEY FK_1C9B655C8D9F6D38');
        $this->addSql('DROP TABLE VSPAY_Order');
        $this->addSql('DROP TABLE VSPAY_OrderItem');
        $this->addSql('ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A');
        $this->addSql('DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings');
        $this->addSql('ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id  maintenance_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id) REFERENCES VSCMS_Pages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id)');
        $this->addSql('ALTER TABLE VSPAY_GatewayConfig ADD active TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD payment_method_id INT DEFAULT NULL, ADD paid_service_period_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, DROP created_at');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD CONSTRAINT FK_8936E3C05AA1164F FOREIGN KEY (payment_method_id) REFERENCES VSPAY_PaymentMethod (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD CONSTRAINT FK_8936E3C0A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE VSPAY_Payment ADD CONSTRAINT FK_8936E3C0F504121C FOREIGN KEY (paid_service_period_id) REFERENCES VSUS_PayedServiceSubscriptionPeriods (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8936E3C05AA1164F ON VSPAY_Payment (payment_method_id)');
        $this->addSql('CREATE INDEX IDX_8936E3C0A76ED395 ON VSPAY_Payment (user_id)');
        $this->addSql('CREATE INDEX IDX_8936E3C0F504121C ON VSPAY_Payment (paid_service_period_id)');
        $this->addSql('ALTER TABLE VSUS_PayedServiceSubscriptionPeriods CHANGE currency_code currency VARCHAR(255) NOT NULL');
    }
}
