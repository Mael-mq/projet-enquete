<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230403084606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC672C93255');
        $this->addSql('DROP INDEX IDX_1E512EC672C93255 ON reponses');
        $this->addSql('ALTER TABLE reponses CHANGE id_question_id_id id_question_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC66353B48 FOREIGN KEY (id_question_id) REFERENCES questions (id)');
        $this->addSql('CREATE INDEX IDX_1E512EC66353B48 ON reponses (id_question_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponses DROP FOREIGN KEY FK_1E512EC66353B48');
        $this->addSql('DROP INDEX IDX_1E512EC66353B48 ON reponses');
        $this->addSql('ALTER TABLE reponses CHANGE id_question_id id_question_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponses ADD CONSTRAINT FK_1E512EC672C93255 FOREIGN KEY (id_question_id_id) REFERENCES questions (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1E512EC672C93255 ON reponses (id_question_id_id)');
    }
}
