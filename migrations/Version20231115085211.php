<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231115085211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accommodation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, area NUMERIC(10, 2) NOT NULL, price NUMERIC(10, 2) NOT NULL, image VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extra_activities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) NOT NULL, image VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, questions LONGTEXT NOT NULL, answers LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE means_of_transport (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(50) NOT NULL, engine_type VARCHAR(80) NOT NULL, power_system VARCHAR(80) NOT NULL, navigation_system VARCHAR(80) NOT NULL, survival_system VARCHAR(80) NOT NULL, antirad_system VARCHAR(80) NOT NULL, max_speed INT NOT NULL, autonomy VARCHAR(80) NOT NULL, pressurization VARCHAR(80) NOT NULL, off_road_capability VARCHAR(80) DEFAULT NULL, altitude VARCHAR(80) DEFAULT NULL, underwater_map_system VARCHAR(80) DEFAULT NULL, capacity INT NOT NULL, image VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planet (id INT AUTO_INCREMENT NOT NULL, planet_characteristics_id INT NOT NULL, points_of_interest_id INT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, precaution LONGTEXT NOT NULL, image VARCHAR(150) DEFAULT NULL, INDEX IDX_68136AA5921D146A (planet_characteristics_id), INDEX IDX_68136AA541DA9EF6 (points_of_interest_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planet_characteristics (id INT AUTO_INCREMENT NOT NULL, main_gaz VARCHAR(50) NOT NULL, temperature VARCHAR(50) NOT NULL, gravity VARCHAR(50) NOT NULL, irradiance VARCHAR(50) NOT NULL, semi_major_axis VARCHAR(80) NOT NULL, revolution_period VARCHAR(80) NOT NULL, orbital_circumference VARCHAR(80) NOT NULL, max_orbital_speed VARCHAR(80) NOT NULL, mass VARCHAR(80) NOT NULL, equatorial_perimeter VARCHAR(80) NOT NULL, surface_gravity VARCHAR(80) NOT NULL, rotation_period VARCHAR(80) NOT NULL, rotation_speed VARCHAR(80) NOT NULL, solar_irradiance VARCHAR(80) NOT NULL, max_surface_temperature VARCHAR(80) NOT NULL, min_surface_temperature VARCHAR(80) NOT NULL, carbon_dioxide VARCHAR(10) NOT NULL, argon VARCHAR(10) NOT NULL, dinitrogen VARCHAR(10) NOT NULL, dioxygen VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE points_of_interest (id INT AUTO_INCREMENT NOT NULL, place VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resort (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, place VARCHAR(80) NOT NULL, area NUMERIC(10, 2) NOT NULL, starting_price NUMERIC(10, 2) NOT NULL, order_number INT NOT NULL, image VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stay (id INT AUTO_INCREMENT NOT NULL, extra_activities_id INT NOT NULL, accommodation_id INT NOT NULL, user_id INT NOT NULL, duration_weeks INT NOT NULL, number_of_travelers INT NOT NULL, check_in DATE NOT NULL, check_out DATE NOT NULL, date_time DATETIME NOT NULL, total_amount NUMERIC(10, 2) NOT NULL, INDEX IDX_5E09839CB12E89EB (extra_activities_id), INDEX IDX_5E09839C8F3692CD (accommodation_id), INDEX IDX_5E09839CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planet ADD CONSTRAINT FK_68136AA5921D146A FOREIGN KEY (planet_characteristics_id) REFERENCES planet_characteristics (id)');
        $this->addSql('ALTER TABLE planet ADD CONSTRAINT FK_68136AA541DA9EF6 FOREIGN KEY (points_of_interest_id) REFERENCES points_of_interest (id)');
        $this->addSql('ALTER TABLE stay ADD CONSTRAINT FK_5E09839CB12E89EB FOREIGN KEY (extra_activities_id) REFERENCES extra_activities (id)');
        $this->addSql('ALTER TABLE stay ADD CONSTRAINT FK_5E09839C8F3692CD FOREIGN KEY (accommodation_id) REFERENCES accommodation (id)');
        $this->addSql('ALTER TABLE stay ADD CONSTRAINT FK_5E09839CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planet DROP FOREIGN KEY FK_68136AA5921D146A');
        $this->addSql('ALTER TABLE planet DROP FOREIGN KEY FK_68136AA541DA9EF6');
        $this->addSql('ALTER TABLE stay DROP FOREIGN KEY FK_5E09839CB12E89EB');
        $this->addSql('ALTER TABLE stay DROP FOREIGN KEY FK_5E09839C8F3692CD');
        $this->addSql('ALTER TABLE stay DROP FOREIGN KEY FK_5E09839CA76ED395');
        $this->addSql('DROP TABLE accommodation');
        $this->addSql('DROP TABLE activities');
        $this->addSql('DROP TABLE extra_activities');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE means_of_transport');
        $this->addSql('DROP TABLE planet');
        $this->addSql('DROP TABLE planet_characteristics');
        $this->addSql('DROP TABLE points_of_interest');
        $this->addSql('DROP TABLE resort');
        $this->addSql('DROP TABLE stay');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
