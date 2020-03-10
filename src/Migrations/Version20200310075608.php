<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200310075608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oferta ADD empresa_id INT NOT NULL, ADD candidat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F2521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id)');
        $this->addSql('ALTER TABLE oferta ADD CONSTRAINT FK_7479C8F28D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('CREATE INDEX IDX_7479C8F2521E1991 ON oferta (empresa_id)');
        $this->addSql('CREATE INDEX IDX_7479C8F28D0EB82 ON oferta (candidat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F2521E1991');
        $this->addSql('ALTER TABLE oferta DROP FOREIGN KEY FK_7479C8F28D0EB82');
        $this->addSql('DROP INDEX IDX_7479C8F2521E1991 ON oferta');
        $this->addSql('DROP INDEX IDX_7479C8F28D0EB82 ON oferta');
        $this->addSql('ALTER TABLE oferta DROP empresa_id, DROP candidat_id');
    }
}
