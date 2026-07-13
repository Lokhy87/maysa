<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260713153912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create massage_translation table for localized massage content';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE massage_translation (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(5) NOT NULL, subtitle VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, name VARCHAR(150) DEFAULT NULL, massage_id INT NOT NULL, INDEX IDX_DFBECC90E964225 (massage_id), INDEX idx_locale (locale), UNIQUE INDEX unique_massage_locale (massage_id, locale), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE massage_translation ADD CONSTRAINT FK_DFBECC90E964225 FOREIGN KEY (massage_id) REFERENCES massage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE massage_translation DROP FOREIGN KEY FK_DFBECC90E964225');
        $this->addSql('DROP TABLE massage_translation');
    }
}
