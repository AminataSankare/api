<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180409080256 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE localite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, typebien_id INT DEFAULT NULL, localite_id INT DEFAULT NULL, nom_bien VARCHAR(30) NOT NULL, etat TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, prixlocation INT NOT NULL, INDEX IDX_45EDC386924DD2B5 (localite_id), INDEX IDX_45EDC386677134B4 (typebien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, bien_id INT DEFAULT NULL, client_id INT DEFAULT NULL, date_reservation DATETIME NOT NULL, etat TINYINT(1) NOT NULL, INDEX IDX_42C84955BD95B80F (bien_id), INDEX IDX_42C8495519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, bien_id INT DEFAULT NULL, image LONGBLOB NOT NULL, INDEX IDX_C53D045FBD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, num_piece INT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(30) NOT NULL, email VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_bien (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, bien_id INT DEFAULT NULL, image VARCHAR(50) NOT NULL, INDEX IDX_E01FBE6ABD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386677134B4 FOREIGN KEY (typebien_id) REFERENCES type_bien (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386924DD2B5 FOREIGN KEY (localite_id) REFERENCES localite (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ABD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386924DD2B5');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BD95B80F');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBD95B80F');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ABD95B80F');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386677134B4');
        $this->addSql('DROP TABLE localite');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE type_bien');
        $this->addSql('DROP TABLE images');
    }
}
