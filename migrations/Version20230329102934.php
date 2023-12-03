<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230329102934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reponses (id INT AUTO_INCREMENT NOT NULL, id_question_id INT NOT NULL, texte_reponse VARCHAR(255) NOT NULL, INDEX IDX_1E512EC66353B48 (id_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC66353B48 FOREIGN KEY (id_question_id) REFERENCES questions (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC66353B48');
        $this->addSql('DROP TABLE reponses');
    }
}
