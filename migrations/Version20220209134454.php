<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209134454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE associations_user (associations_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D7F0F1724122538A (associations_id), INDEX IDX_D7F0F172A76ED395 (user_id), PRIMARY KEY(associations_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_associations (user_id INT NOT NULL, associations_id INT NOT NULL, INDEX IDX_9EDB8B3A76ED395 (user_id), INDEX IDX_9EDB8B34122538A (associations_id), PRIMARY KEY(user_id, associations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE associations_user ADD CONSTRAINT FK_D7F0F1724122538A FOREIGN KEY (associations_id) REFERENCES associations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE associations_user ADD CONSTRAINT FK_D7F0F172A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_associations ADD CONSTRAINT FK_9EDB8B3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_associations ADD CONSTRAINT FK_9EDB8B34122538A FOREIGN KEY (associations_id) REFERENCES associations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE associations_user');
        $this->addSql('DROP TABLE user_associations');
        $this->addSql('ALTER TABLE action CHANGE villedepart villedepart VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE villearrive villearrive VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE raison raison VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE associations CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE logo logo VARCHAR(2000) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(10000) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE messenger_messages CHANGE body body LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE headers headers LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE queue_name queue_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT NULL');
    }
}
