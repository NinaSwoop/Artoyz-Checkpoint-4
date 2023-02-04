<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201103007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_toy (user_id INT NOT NULL, toy_id INT NOT NULL, INDEX IDX_8C13C6E5A76ED395 (user_id), INDEX IDX_8C13C6E5B524FDDC (toy_id), PRIMARY KEY(user_id, toy_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_toy ADD CONSTRAINT FK_8C13C6E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_toy ADD CONSTRAINT FK_8C13C6E5B524FDDC FOREIGN KEY (toy_id) REFERENCES toy (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_toy DROP FOREIGN KEY FK_8C13C6E5A76ED395');
        $this->addSql('ALTER TABLE user_toy DROP FOREIGN KEY FK_8C13C6E5B524FDDC');
        $this->addSql('DROP TABLE user_toy');
    }
}
