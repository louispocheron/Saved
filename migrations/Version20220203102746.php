<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203102746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action ADD users_id INT DEFAULT NULL, CHANGE date date DATETIME NOT NULL, CHANGE distance distance INT NOT NULL, CHANGE timestart timestart TIME NOT NULL, CHANGE timeend timeend TIME NOT NULL, CHANGE hours hours TIME NOT NULL, CHANGE donation donation NUMERIC(10, 2) NOT NULL, CHANGE villedepart villedepart VARCHAR(255) NOT NULL, CHANGE villearrive villearrive VARCHAR(255) NOT NULL, CHANGE raison raison VARCHAR(255) NOT NULL');
        $this->addSql('CREATE INDEX IDX_47CC8C9267B3B43D ON action (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C9267B3B43D');
        $this->addSql('DROP INDEX IDX_47CC8C9267B3B43D ON action');
        $this->addSql('ALTER TABLE action DROP users_id, CHANGE date date DATE DEFAULT NULL, CHANGE distance distance INT DEFAULT NULL, CHANGE timestart timestart TIME DEFAULT NULL, CHANGE timeend timeend TIME DEFAULT NULL, CHANGE hours hours TIME DEFAULT NULL, CHANGE donation donation NUMERIC(10, 2) DEFAULT NULL, CHANGE villedepart villedepart VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE villearrive villearrive VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE raison raison LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
