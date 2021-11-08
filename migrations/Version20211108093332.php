<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108093332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_CBE5A331D4C006C8');
        $this->addSql('DROP INDEX IDX_CBE5A331C54C8C93');
        $this->addSql('DROP INDEX IDX_CBE5A331F675F31B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book AS SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM book');
        $this->addSql('DROP TABLE book');
        $this->addSql('CREATE TABLE book (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, type_id INTEGER NOT NULL, borrow_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, cover VARCHAR(80) NOT NULL COLLATE BINARY, publication_date DATE NOT NULL, description VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_CBE5A331F675F31B FOREIGN KEY (author_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_CBE5A331C54C8C93 FOREIGN KEY (type_id) REFERENCES type_book (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_CBE5A331D4C006C8 FOREIGN KEY (borrow_id) REFERENCES borrow (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO book (id, author_id, type_id, borrow_id, title, cover, publication_date, description) SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM __temp__book');
        $this->addSql('DROP TABLE __temp__book');
        $this->addSql('CREATE INDEX IDX_CBE5A331D4C006C8 ON book (borrow_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331C54C8C93 ON book (type_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id)');
        $this->addSql('DROP INDEX IDX_4A1B2A92F675F31B');
        $this->addSql('DROP INDEX IDX_4A1B2A92C54C8C93');
        $this->addSql('DROP INDEX IDX_4A1B2A92D4C006C8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__books AS SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM books');
        $this->addSql('DROP TABLE books');
        $this->addSql('CREATE TABLE books (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, type_id INTEGER NOT NULL, borrow_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, cover VARCHAR(80) NOT NULL COLLATE BINARY, publication_date DATE NOT NULL, description VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_4A1B2A92F675F31B FOREIGN KEY (author_id) REFERENCES author (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_4A1B2A92C54C8C93 FOREIGN KEY (type_id) REFERENCES type_book (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_4A1B2A92D4C006C8 FOREIGN KEY (borrow_id) REFERENCES borrow (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO books (id, author_id, type_id, borrow_id, title, cover, publication_date, description) SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM __temp__books');
        $this->addSql('DROP TABLE __temp__books');
        $this->addSql('CREATE INDEX IDX_4A1B2A92F675F31B ON books (author_id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92C54C8C93 ON books (type_id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92D4C006C8 ON books (borrow_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__borrow AS SELECT id, borrow_date, expected_return_date FROM borrow');
        $this->addSql('DROP TABLE borrow');
        $this->addSql('CREATE TABLE borrow (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, borrow_date DATE NOT NULL, expected_return_date DATE NOT NULL, CONSTRAINT FK_55DBA8B0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO borrow (id, borrow_date, expected_return_date) SELECT id, borrow_date, expected_return_date FROM __temp__borrow');
        $this->addSql('DROP TABLE __temp__borrow');
        $this->addSql('CREATE INDEX IDX_55DBA8B0A76ED395 ON borrow (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_CBE5A331F675F31B');
        $this->addSql('DROP INDEX IDX_CBE5A331C54C8C93');
        $this->addSql('DROP INDEX IDX_CBE5A331D4C006C8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book AS SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM book');
        $this->addSql('DROP TABLE book');
        $this->addSql('CREATE TABLE book (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, type_id INTEGER NOT NULL, borrow_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, cover VARCHAR(80) NOT NULL, publication_date DATE NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO book (id, author_id, type_id, borrow_id, title, cover, publication_date, description) SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM __temp__book');
        $this->addSql('DROP TABLE __temp__book');
        $this->addSql('CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331C54C8C93 ON book (type_id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331D4C006C8 ON book (borrow_id)');
        $this->addSql('DROP INDEX IDX_4A1B2A92F675F31B');
        $this->addSql('DROP INDEX IDX_4A1B2A92C54C8C93');
        $this->addSql('DROP INDEX IDX_4A1B2A92D4C006C8');
        $this->addSql('CREATE TEMPORARY TABLE __temp__books AS SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM books');
        $this->addSql('DROP TABLE books');
        $this->addSql('CREATE TABLE books (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, author_id INTEGER NOT NULL, type_id INTEGER NOT NULL, borrow_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, cover VARCHAR(80) NOT NULL, publication_date DATE NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO books (id, author_id, type_id, borrow_id, title, cover, publication_date, description) SELECT id, author_id, type_id, borrow_id, title, cover, publication_date, description FROM __temp__books');
        $this->addSql('DROP TABLE __temp__books');
        $this->addSql('CREATE INDEX IDX_4A1B2A92F675F31B ON books (author_id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92C54C8C93 ON books (type_id)');
        $this->addSql('CREATE INDEX IDX_4A1B2A92D4C006C8 ON books (borrow_id)');
        $this->addSql('DROP INDEX IDX_55DBA8B0A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__borrow AS SELECT id, borrow_date, expected_return_date FROM borrow');
        $this->addSql('DROP TABLE borrow');
        $this->addSql('CREATE TABLE borrow (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, borrow_date DATE NOT NULL, expected_return_date DATE NOT NULL)');
        $this->addSql('INSERT INTO borrow (id, borrow_date, expected_return_date) SELECT id, borrow_date, expected_return_date FROM __temp__borrow');
        $this->addSql('DROP TABLE __temp__borrow');
    }
}
