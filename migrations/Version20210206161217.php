<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206161217 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE test_entity_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE testenty_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weather_db_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE weather_final_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE test_entity (id INT NOT NULL, location VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE testenty (id INT NOT NULL, name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, gust_mph VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE weather_db (id INT NOT NULL, location TEXT NOT NULL, name VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN weather_db.location IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE weather_final (id INT NOT NULL, city VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, loctime VARCHAR(255) NOT NULL, temp_c VARCHAR(255) NOT NULL, temp_f VARCHAR(255) NOT NULL, weatherforecast VARCHAR(255) NOT NULL, wind_mph VARCHAR(255) NOT NULL, wind_degree VARCHAR(255) NOT NULL, wind_dir VARCHAR(255) NOT NULL, pressure VARCHAR(255) NOT NULL, humidity VARCHAR(255) NOT NULL, feelslike_c VARCHAR(255) NOT NULL, vis_km VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE test_entity_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE testenty_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE weather_db_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE weather_final_id_seq CASCADE');
        $this->addSql('DROP TABLE test_entity');
        $this->addSql('DROP TABLE testenty');
        $this->addSql('DROP TABLE weather_db');
        $this->addSql('DROP TABLE weather_final');
    }
}
