<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130124655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE toy ADD brand_id INT NOT NULL');
        $this->addSql('ALTER TABLE toy ADD CONSTRAINT FK_6705A76E44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_6705A76E44F5D008 ON toy (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE toy DROP FOREIGN KEY FK_6705A76E44F5D008');
        $this->addSql('DROP INDEX IDX_6705A76E44F5D008 ON toy');
        $this->addSql('ALTER TABLE toy DROP brand_id');
    }
}
