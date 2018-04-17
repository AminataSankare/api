<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180409075508 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation ADD bien_id INT DEFAULT NULL, ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_42C84955BD95B80F ON reservation (bien_id)');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
        $this->addSql('ALTER TABLE image CHANGE bien_id bien_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, DROP nom_complet, DROP tel');
        $this->addSql('ALTER TABLE images CHANGE bien_id bien_id INT DEFAULT NULL, CHANGE image image VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD nom_complet VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, ADD tel INT NOT NULL, DROP nom, DROP prenom');
        $this->addSql('ALTER TABLE image CHANGE bien_id bien_id INT NOT NULL');
        $this->addSql('ALTER TABLE images CHANGE bien_id bien_id INT NOT NULL, CHANGE image image VARCHAR(60) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BD95B80F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('DROP INDEX IDX_42C84955BD95B80F ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP bien_id, DROP client_id');
    }
}
