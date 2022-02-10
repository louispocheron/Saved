<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208092432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE associations ADD description VARCHAR(10000) DEFAULT NULL');
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE associations (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(2000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE action ADD associations_id INT DEFAULT NULL');
        // $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C924122538A FOREIGN KEY (associations_id) REFERENCES associations (id)');
        // $this->addSql('CREATE INDEX IDX_47CC8C924122538A ON action (associations_id)');
        // $this->addSql('ALTER TABLE user CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C924122538A');
        // $this->addSql('DROP TABLE associations');
        // $this->addSql('DROP INDEX IDX_47CC8C924122538A ON action');
        // $this->addSql('ALTER TABLE action DROP associations_id, CHANGE villedepart villedepart VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE villearrive villearrive VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE raison raison VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        // $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        // $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT NULL');
    }
}
