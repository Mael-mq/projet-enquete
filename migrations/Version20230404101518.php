<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404101518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses_utilisateurs ADD reponse_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponses_utilisateurs ADD CONSTRAINT FK_DF7583CFCF18BB82 FOREIGN KEY (reponse_id) REFERENCES reponses (id)');
        $this->addSql('CREATE INDEX IDX_DF7583CFCF18BB82 ON reponses_utilisateurs (reponse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses_utilisateurs DROP FOREIGN KEY FK_DF7583CFCF18BB82');
        $this->addSql('DROP INDEX IDX_DF7583CFCF18BB82 ON reponses_utilisateurs');
        $this->addSql('ALTER TABLE reponses_utilisateurs DROP reponse_id');
    }
}
