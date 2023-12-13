<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204152126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheteur (id INT AUTO_INCREMENT NOT NULL, nom_acheteur VARCHAR(50) NOT NULL, prenom_acheteur VARCHAR(50) NOT NULL, code_postale VARCHAR(50) NOT NULL, adresse VARCHAR(75) NOT NULL, ville VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, nom_assoc VARCHAR(50) NOT NULL, adresse VARCHAR(75) NOT NULL, ville VARCHAR(50) NOT NULL, code_postale VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY livre_fk_1');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY livre_fk_2');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY pret_fk_1');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY pret_fk_2');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE taille');
        $this->addSql('DROP TABLE typebac');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE peche');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE espece');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE bac');
        $this->addSql('DROP TABLE pret');
        $this->addSql('DROP TABLE qualite');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (num SMALLINT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_bin`, prenom VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_bin`, adrRue VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, adrCP INT DEFAULT NULL, adrVille VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, tel VARCHAR(10) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, mel VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, PRIMARY KEY(num)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, datePeche DATE NOT NULL, idBateau INT NOT NULL, idEspece INT NOT NULL, idTaille INT NOT NULL, idPresentation VARCHAR(5) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, idQualite CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, idBac CHAR(1) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_general_ci`, poidsBrutLot NUMERIC(6, 2) DEFAULT NULL, prixEnchere NUMERIC(6, 2) DEFAULT NULL, dateEnchere DATE DEFAULT NULL, HeureDebutEnchere DATETIME DEFAULT NULL, prixPlancher NUMERIC(6, 2) DEFAULT NULL, prixDepart NUMERIC(6, 2) DEFAULT NULL, codeEtat CHAR(1) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_general_ci`, INDEX idx_datePeche (datePeche), INDEX IDEspece (idEspece), INDEX IDBateaufk_PECHE (datePeche, idBateau), INDEX IdTaillefk (idTaille), INDEX IdPresentationfk (idPresentation), INDEX IdQualitefk (idQualite), INDEX idx_Idbateau (idBateau), PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, specification VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typebac (id CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, tare NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, immatriculation VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE presentation (id VARCHAR(5) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, libelle VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE date (id DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE peche (idDatepeche DATE NOT NULL, idBateau INT NOT NULL, INDEX idBateau (idBateau), PRIMARY KEY(idDatepeche, idBateau)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE auteur (num SMALLINT AUTO_INCREMENT NOT NULL, nom VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_bin`, prenom VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, nationalite VARCHAR(15) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, PRIMARY KEY(num)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE espece (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, nomScientifique VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_general_ci`, nomCourt VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE genre (num TINYINT(1) NOT NULL, libelle VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_bin`, PRIMARY KEY(num)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livre (num SMALLINT AUTO_INCREMENT NOT NULL, ISBN VARCHAR(13) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_bin`, titre VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT \'\' NOT NULL COLLATE `utf8mb3_bin`, prix DOUBLE PRECISION DEFAULT NULL, editeur VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, annee SMALLINT DEFAULT NULL, langue VARCHAR(25) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_bin`, numAuteur SMALLINT DEFAULT NULL, numGenre TINYINT(1) DEFAULT NULL, INDEX livre_fk_1 (numAuteur), INDEX livre_fk_2 (numGenre), PRIMARY KEY(num)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE bac (id INT AUTO_INCREMENT NOT NULL, Idbateau INT NOT NULL, datePeche DATE NOT NULL, IdLot INT NOT NULL, idBac CHAR(1) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_general_ci`, idTypeBac CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, INDEX idTypeBac_BAC (idTypeBac), INDEX idx_IdLot (IdLot), INDEX idx_Idbateau (Idbateau), INDEX idx_datePeche (datePeche), PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pret (num SMALLINT AUTO_INCREMENT NOT NULL, numLivre SMALLINT DEFAULT 0 NOT NULL, numAdherent SMALLINT DEFAULT 0 NOT NULL, datePret DATE DEFAULT \'0000-00-00\' NOT NULL, dateRetourPrevue DATE DEFAULT \'0000-00-00\' NOT NULL, dateRetourReelle DATE DEFAULT NULL, INDEX pret_fk_1 (numLivre), INDEX pret_fk_2 (numAdherent), PRIMARY KEY(num)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_bin` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE qualite (id CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, libelle VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT livre_fk_1 FOREIGN KEY (numAuteur) REFERENCES auteur (num) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT livre_fk_2 FOREIGN KEY (numGenre) REFERENCES genre (num) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT pret_fk_1 FOREIGN KEY (numLivre) REFERENCES livre (num) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT pret_fk_2 FOREIGN KEY (numAdherent) REFERENCES adherent (num) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE acheteur');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
