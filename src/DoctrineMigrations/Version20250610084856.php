<?php

declare(strict_types=1);

namespace App\DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250610084856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE VSAPI_RefreshTokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_BB25E413C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_Users_Favorites (user_id INT NOT NULL, favorite_id INT NOT NULL, INDEX IDX_C688191BA76ED395 (user_id), INDEX IDX_C688191BAA17481D (favorite_id), PRIMARY KEY(user_id, favorite_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_TablatureCategories (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, taxon_id INT DEFAULT NULL, INDEX IDX_EF9842F4A76ED395 (user_id), INDEX IDX_EF9842F4727ACA70 (parent_id), UNIQUE INDEX UNIQ_EF9842F4DE13F470 (taxon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_TablatureShares (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_ABDD7817E3C61F9 (owner_id), UNIQUE INDEX owner_share_unique_idx (owner_id, name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_Users_TablatureShares (share_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_41561AB22AE63FDB (share_id), INDEX IDX_41561AB2A76ED395 (user_id), PRIMARY KEY(share_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_TablatureShares_Tablatures (share_id INT NOT NULL, tablature_id INT NOT NULL, INDEX IDX_935F26E52AE63FDB (share_id), INDEX IDX_935F26E5EBE5F332 (tablature_id), PRIMARY KEY(share_id, tablature_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_Tablatures (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, artist VARCHAR(255) NOT NULL, song VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, public TINYINT(1) DEFAULT 1 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_B4690701989D9B62 (slug), INDEX IDX_B4690701A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_Tablatures_Categories (tablature_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_97CB9EDBEBE5F332 (tablature_id), INDEX IDX_97CB9EDB12469DE2 (category_id), PRIMARY KEY(tablature_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE WGP_Tablatures_Files (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) NOT NULL, original_name VARCHAR(255) DEFAULT '' NOT NULL COMMENT 'The Original Name of the File.', UNIQUE INDEX UNIQ_B0C962317E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_Favorites ADD CONSTRAINT FK_C688191BA76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_Favorites ADD CONSTRAINT FK_C688191BAA17481D FOREIGN KEY (favorite_id) REFERENCES WGP_Tablatures (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureCategories ADD CONSTRAINT FK_EF9842F4A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureCategories ADD CONSTRAINT FK_EF9842F4727ACA70 FOREIGN KEY (parent_id) REFERENCES WGP_TablatureCategories (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureCategories ADD CONSTRAINT FK_EF9842F4DE13F470 FOREIGN KEY (taxon_id) REFERENCES VSAPP_Taxons (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureShares ADD CONSTRAINT FK_ABDD7817E3C61F9 FOREIGN KEY (owner_id) REFERENCES VSUM_Users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_TablatureShares ADD CONSTRAINT FK_41561AB22AE63FDB FOREIGN KEY (share_id) REFERENCES WGP_TablatureShares (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_TablatureShares ADD CONSTRAINT FK_41561AB2A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureShares_Tablatures ADD CONSTRAINT FK_935F26E52AE63FDB FOREIGN KEY (share_id) REFERENCES WGP_TablatureShares (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureShares_Tablatures ADD CONSTRAINT FK_935F26E5EBE5F332 FOREIGN KEY (tablature_id) REFERENCES WGP_Tablatures (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures ADD CONSTRAINT FK_B4690701A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures_Categories ADD CONSTRAINT FK_97CB9EDBEBE5F332 FOREIGN KEY (tablature_id) REFERENCES WGP_Tablatures (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures_Categories ADD CONSTRAINT FK_97CB9EDB12469DE2 FOREIGN KEY (category_id) REFERENCES WGP_TablatureCategories (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures_Files ADD CONSTRAINT FK_B0C962317E3C61F9 FOREIGN KEY (owner_id) REFERENCES WGP_Tablatures (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id maintenance_page_id  INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id ) REFERENCES VSCMS_Pages (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id )
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_PricingPlanCategories ADD CONSTRAINT FK_10C2B955727ACA70 FOREIGN KEY (parent_id) REFERENCES VSCAT_PricingPlanCategories (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_PricingPlanCategories ADD CONSTRAINT FK_10C2B955DE13F470 FOREIGN KEY (taxon_id) REFERENCES VSAPP_Taxons (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_PricingPlanSubscriptions ADD CONSTRAINT FK_EA3E01A0A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_ProductCategories ADD CONSTRAINT FK_7ADE9A79DE13F470 FOREIGN KEY (taxon_id) REFERENCES VSAPP_Taxons (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSPAY_CustomerGroups ADD CONSTRAINT FK_8D3A9BC4DE13F470 FOREIGN KEY (taxon_id) REFERENCES VSAPP_Taxons (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSPAY_Order ADD CONSTRAINT FK_87954502A76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSPAY_Promotion_Applications ADD CONSTRAINT FK_1D3F36D53E030ACD FOREIGN KEY (application_id) REFERENCES VSAPP_Applications (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSUM_UsersInfo CHANGE title title ENUM('mr', 'mrs', 'miss')
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSUS_NewsletterSubscriptions ADD CONSTRAINT FK_E521F0DCA76ED395 FOREIGN KEY (user_id) REFERENCES VSUM_Users (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_Favorites DROP FOREIGN KEY FK_C688191BA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_Favorites DROP FOREIGN KEY FK_C688191BAA17481D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureCategories DROP FOREIGN KEY FK_EF9842F4A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureCategories DROP FOREIGN KEY FK_EF9842F4727ACA70
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureCategories DROP FOREIGN KEY FK_EF9842F4DE13F470
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureShares DROP FOREIGN KEY FK_ABDD7817E3C61F9
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_TablatureShares DROP FOREIGN KEY FK_41561AB22AE63FDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Users_TablatureShares DROP FOREIGN KEY FK_41561AB2A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureShares_Tablatures DROP FOREIGN KEY FK_935F26E52AE63FDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_TablatureShares_Tablatures DROP FOREIGN KEY FK_935F26E5EBE5F332
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures DROP FOREIGN KEY FK_B4690701A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures_Categories DROP FOREIGN KEY FK_97CB9EDBEBE5F332
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures_Categories DROP FOREIGN KEY FK_97CB9EDB12469DE2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE WGP_Tablatures_Files DROP FOREIGN KEY FK_B0C962317E3C61F9
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE VSAPI_RefreshTokens
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_Users_Favorites
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_TablatureCategories
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_TablatureShares
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_Users_TablatureShares
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_TablatureShares_Tablatures
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_Tablatures
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_Tablatures_Categories
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE WGP_Tablatures_Files
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSAPP_Settings DROP FOREIGN KEY FK_4A491FD507FAB6A
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSAPP_Settings CHANGE maintenance_page_id  maintenance_page_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSAPP_Settings ADD CONSTRAINT FK_4A491FD507FAB6A FOREIGN KEY (maintenance_page_id) REFERENCES VSCMS_Pages (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4A491FD507FAB6A ON VSAPP_Settings (maintenance_page_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_PricingPlanCategories DROP FOREIGN KEY FK_10C2B955727ACA70
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_PricingPlanCategories DROP FOREIGN KEY FK_10C2B955DE13F470
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_PricingPlanSubscriptions DROP FOREIGN KEY FK_EA3E01A0A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSCAT_ProductCategories DROP FOREIGN KEY FK_7ADE9A79DE13F470
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSPAY_CustomerGroups DROP FOREIGN KEY FK_8D3A9BC4DE13F470
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSPAY_Order DROP FOREIGN KEY FK_87954502A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSPAY_Promotion_Applications DROP FOREIGN KEY FK_1D3F36D53E030ACD
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSUM_UsersInfo CHANGE title title VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE VSUS_NewsletterSubscriptions DROP FOREIGN KEY FK_E521F0DCA76ED395
        SQL);
    }
}
