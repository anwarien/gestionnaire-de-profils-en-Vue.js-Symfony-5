<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200604153752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE account_parameters CHANGE avatar_file_name avatar_file_name VARCHAR(255) DEFAULT \'NULL\', CHANGE telephone telephone INT DEFAULT NULL, CHANGE ville ville VARCHAR(70) DEFAULT NULL, CHANGE adresse adresse VARCHAR(180) DEFAULT NULL, CHANGE codepostal codepostal INT DEFAULT NULL, CHANGE genre genre enum(\'homme\', \'femme\')');
        $this->addSql('ALTER TABLE eleve CHANGE user_id user_id INT DEFAULT NULL, CHANGE session_id session_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation CHANGE modified modified DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE message CHANGE object object VARCHAR(180) DEFAULT NULL, CHANGE modified modified DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE module CHANGE modified modified DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE professeur CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance CHANGE module_id module_id INT DEFAULT NULL, CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE title title VARCHAR(190) DEFAULT NULL, CHANGE number number VARCHAR(10) DEFAULT NULL, CHANGE modified modified DATETIME DEFAULT NULL, CHANGE support_link support_link VARCHAR(255) DEFAULT NULL, CHANGE professeur_id professeur_id INT NOT NULL, CHANGE formation_id formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EBAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E5200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EBAB22EE9 ON seance (professeur_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E5200282E ON seance (formation_id)');
        $this->addSql('ALTER TABLE user CHANGE professeur_id professeur_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE account_parameters CHANGE avatar_file_name avatar_file_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\'\'NULL\'\'\' COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone INT DEFAULT NULL, CHANGE ville ville VARCHAR(70) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE codepostal codepostal INT DEFAULT NULL, CHANGE genre genre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE eleve CHANGE user_id user_id INT DEFAULT NULL, CHANGE session_id session_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation CHANGE modified modified DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE message CHANGE object object VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE modified modified DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE module CHANGE modified modified DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE professeur CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EBAB22EE9');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E5200282E');
        $this->addSql('DROP INDEX IDX_DF7DFD0EBAB22EE9 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E5200282E ON seance');
        $this->addSql('ALTER TABLE seance CHANGE module_id module_id INT DEFAULT NULL, CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE professeur_id professeur_id INT DEFAULT NULL, CHANGE formation_id formation_id INT DEFAULT NULL, CHANGE title title VARCHAR(190) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE number number VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE modified modified DATETIME DEFAULT \'NULL\', CHANGE support_link support_link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE professeur_id professeur_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\'');
    }
}
