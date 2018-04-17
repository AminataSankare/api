<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180409145536 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE paiement');
        $this->addSql('ALTER TABLE reservation CHANGE client client INT DEFAULT NULL, CHANGE bien bien INT DEFAULT NULL, CHANGE datereservation datereservation DATETIME NOT NULL, CHANGE etat etat TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE reservation RENAME INDEX bien TO IDX_42C8495545EDC386');
        $this->addSql('ALTER TABLE reservation RENAME INDEX client TO IDX_42C84955C7440455');
        $this->addSql('ALTER TABLE image CHANGE bien_id bien_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client DROP tel, CHANGE nom_complet nom_complet VARCHAR(50) NOT NULL, CHANGE password password VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE images CHANGE bien_id bien_id INT DEFAULT NULL, CHANGE image image VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, contrat_id INT DEFAULT NULL, datepaiement DATETIME NOT NULL, montant INT NOT NULL, periode DATE NOT NULL, INDEX IDX_B1DC7A1E1823061F (contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD tel INT NOT NULL, CHANGE nom_complet nom_complet VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE password password VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE image CHANGE bien_id bien_id INT NOT NULL');
        $this->addSql('ALTER TABLE images CHANGE bien_id bien_id INT NOT NULL, CHANGE image image VARCHAR(60) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE reservation CHANGE bien bien INT NOT NULL, CHANGE client client INT NOT NULL, CHANGE datereservation datereservation DATE NOT NULL, CHANGE etat etat VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE reservation RENAME INDEX idx_42c84955c7440455 TO client');
        $this->addSql('ALTER TABLE reservation RENAME INDEX idx_42c8495545edc386 TO bien');
    }
}
