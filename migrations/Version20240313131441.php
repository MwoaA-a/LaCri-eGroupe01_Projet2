<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313131441 extends AbstractMigration
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
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, date_facturation DATE NOT NULL, etat INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lots (id INT AUTO_INCREMENT NOT NULL, num_bateau INT NOT NULL, date_peche DATE NOT NULL, poids_brut_lot INT DEFAULT NULL, prix_plancher INT DEFAULT NULL, prix_depart INT DEFAULT NULL, prix_encheres_max INT DEFAULT NULL, date_enchere DATE DEFAULT NULL, heure_debut_enchere TIME DEFAULT NULL, code_etat VARCHAR(50) NOT NULL, equa INT DEFAULT NULL, espece INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bac DROP FOREIGN KEY idTypeBac_BAC');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY IdPresentationfk');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY IDEspece');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY IdQualitefk');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY IDBateaufk_PECHE');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY IdBateaufk_BATEAU');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY IdTaillefk');
        $this->addSql('ALTER TABLE peche DROP FOREIGN KEY peche_ibfk_1');
        $this->addSql('ALTER TABLE peche DROP FOREIGN KEY peche_ibfk_2');
        $this->addSql('DROP TABLE bac');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE peche');
        $this->addSql('DROP TABLE presentation');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('DROP TABLE taille');
        $this->addSql('DROP TABLE typebac');
        $this->addSql('ALTER TABLE bateau CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE immatriculation immatriculation VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE espece ADD nom_scientifique VARCHAR(50) DEFAULT NULL, ADD nom_court VARCHAR(50) NOT NULL, DROP nomScientifique, DROP nomCourt, CHANGE nom nom VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bac (id INT AUTO_INCREMENT NOT NULL, Idbateau INT NOT NULL, datePeche DATE NOT NULL, IdLot INT NOT NULL, idBac CHAR(1) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_general_ci`, idTypeBac CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, INDEX idx_Idbateau (Idbateau), INDEX idx_datePeche (datePeche), INDEX idTypeBac_BAC (idTypeBac), INDEX idx_IdLot (IdLot), PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE date (id DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, datePeche DATE NOT NULL, idBateau INT NOT NULL, idEspece INT NOT NULL, idTaille INT NOT NULL, idPresentation VARCHAR(5) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, idQualite CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, idBac CHAR(1) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_general_ci`, poidsBrutLot NUMERIC(6, 2) DEFAULT \'NULL\', prixEnchere NUMERIC(6, 2) DEFAULT \'NULL\', dateEnchere DATE DEFAULT \'NULL\', HeureDebutEnchere DATETIME DEFAULT \'NULL\', prixPlancher NUMERIC(6, 2) DEFAULT \'NULL\', prixDepart NUMERIC(6, 2) DEFAULT \'NULL\', codeEtat CHAR(1) CHARACTER SET latin1 DEFAULT \'NULL\' COLLATE `latin1_general_ci`, INDEX IdTaillefk (idTaille), INDEX IDEspece (idEspece), INDEX idx_datePeche (datePeche), INDEX IdPresentationfk (idPresentation), INDEX IDBateaufk_PECHE (datePeche, idBateau), INDEX IdQualitefk (idQualite), INDEX idx_Idbateau (idBateau), PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE peche (idDatepeche DATE NOT NULL, idBateau INT NOT NULL, INDEX idBateau (idBateau), INDEX IDX_E96511E26874C35B (idDatepeche), PRIMARY KEY(idDatepeche, idBateau)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE presentation (id VARCHAR(5) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, libelle VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE qualite (id CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, libelle VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE taille (id INT AUTO_INCREMENT NOT NULL, specification VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typebac (id CHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_ci`, tare NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bac ADD CONSTRAINT idTypeBac_BAC FOREIGN KEY (idTypeBac) REFERENCES typebac (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT IdPresentationfk FOREIGN KEY (idPresentation) REFERENCES presentation (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT IDEspece FOREIGN KEY (idEspece) REFERENCES espece (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT IdQualitefk FOREIGN KEY (idQualite) REFERENCES qualite (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT IDBateaufk_PECHE FOREIGN KEY (datePeche, idBateau) REFERENCES peche (idDatepeche, idBateau)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT IdBateaufk_BATEAU FOREIGN KEY (idBateau) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT IdTaillefk FOREIGN KEY (idTaille) REFERENCES taille (id)');
        $this->addSql('ALTER TABLE peche ADD CONSTRAINT peche_ibfk_1 FOREIGN KEY (idBateau) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE peche ADD CONSTRAINT peche_ibfk_2 FOREIGN KEY (idDatepeche) REFERENCES date (id)');
        $this->addSql('DROP TABLE acheteur');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE lots');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE bateau CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE immatriculation immatriculation VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE espece ADD nomScientifique VARCHAR(255) DEFAULT \'NULL\', ADD nomCourt VARCHAR(255) DEFAULT \'NULL\', DROP nom_scientifique, DROP nom_court, CHANGE nom nom VARCHAR(255) NOT NULL');
    }
}
