<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260714015540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE massage_collection_translation (id INT AUTO_INCREMENT NOT NULL, locale VARCHAR(5) NOT NULL, name VARCHAR(100) DEFAULT NULL, description LONGTEXT DEFAULT NULL, collection_id INT NOT NULL, INDEX IDX_D50FF892514956FD (collection_id), UNIQUE INDEX unique_massage_collection_locale (collection_id, locale), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE massage_collection_translation ADD CONSTRAINT FK_D50FF892514956FD FOREIGN KEY (collection_id) REFERENCES massage_collection (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE massage_collection_translation DROP FOREIGN KEY FK_D50FF892514956FD');
        $this->addSql('DROP TABLE massage_collection_translation');
    }
}
