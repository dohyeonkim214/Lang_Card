# Pages
## index (Home)
D
### Functions


## Login (default)
M

## User's Top page
M

## Managing decks 
D

## Flashcard list
D

## create/edit page
D

1 - restful API
2 - Functions




# Lang_Card

This project is a capstone project of CST8257, Algonquin College.


# Due date: August 9, 2024

# Skills

PHP/Laravel + Blade


# Scheduling

1. Wireframe => finish by July, 28
2. Laravel/Blade Setting => July 30
3. Database migration => July 30, 31
4. Code the Views => August 1st~3rd
5. Test with RestfulAPI => August 3rd/4rd
6. Launching => August 8

#
#
# Mami's thought (7/30 added)
I said there's lots of differences on WhatsApp, but actually it may not such big differences...
Let's decide the best way.

### Before think about DB structure...
#### About Flashcard
In our App (language flashcard), Flashcard is a "English <=> English/Other Language" pair. It can be stored as a "Question <=> Answer" pair depends on how User use it. But it's better to think it simply.

#### Sentence and Word
Although we create a flashcards based on Communication class's game, we are requred to implement additional logic if we distinguish between "Sentence" and "Word". 
So User can add both sentence and word but DB don't consider to store them into different table.

#### About Languages
It's better to decide which language User can create. Otherwise there will be lots of same language data in DB (like "Korean", "KOREAN", "korean", "Korean Language"). This will hard to display Decks separated by languages.

## DB Design
All table will have "created" and "updated" culunm.

### User Table
- id
- user_name
- password

### Language Table
We'll decide which language should be available. Below is just an example languages.
This table is not upcated by Users.
- id
- lang_name (eg. English, French, Korean, Japanese, Portuguese, Spanish)

### Deck Table
- id
- deck_name
- conpleted
- user_id
- lang_id

### Flashcard Table
- id
- english_text
- second_language_text
- language_id
- user_id
- deck_id -> Will have multiple. (Need to decide Max decks card can belong to)

## Another Thing
Since Decks are desplayed separated by languages. I added "Language Selection" in the Wireframe "Create/Edit" page.

#
#
#



# Database Design Specification

## 1. Languages Table
**Table Name:** `languages`

**Description:** This table stores the different languages that are available in the application.

| Field Name | Data Type    | Constraints                                 | Description                              |
|------------|--------------|---------------------------------------------|------------------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO INCREMENT                 | Unique identifier for the language.      |
| name       | VARCHAR(255) | NOT NULL                                    | Name of the language.                    |
| created_at | TIMESTAMP    | NULLABLE                                    | Timestamp when the language was created. |
| updated_at | TIMESTAMP    | NULLABLE                                    | Timestamp when the language was last updated. |

## 2. Words Table
**Table Name:** `words`

**Description:** This table stores individual words in different languages.

| Field Name | Data Type    | Constraints                                                     | Description                              |
|------------|--------------|-----------------------------------------------------------------|------------------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO INCREMENT                                     | Unique identifier for the word.          |
| word       | VARCHAR(255) | NOT NULL                                                        | The word itself.                         |
| completed  | BOOLEAN      | DEFAULT FALSE                                                   | Status of whether the word is completed. |
| language_id| BIGINT       | FOREIGN KEY REFERENCES `languages(id)` ON DELETE CASCADE        | The language to which the word belongs.  |
| created_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the word was created.     |
| updated_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the word was last updated. |

## 3. Sentences Table
**Table Name:** `sentences`

**Description:** This table stores sentences in different languages.

| Field Name | Data Type    | Constraints                                                     | Description                                |
|------------|--------------|-----------------------------------------------------------------|--------------------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO INCREMENT                                     | Unique identifier for the sentence.        |
| sentence   | TEXT         | NOT NULL                                                        | The sentence itself.                       |
| completed  | BOOLEAN      | DEFAULT FALSE                                                   | Status of whether the sentence is completed.|
| language_id| BIGINT       | FOREIGN KEY REFERENCES `languages(id)` ON DELETE CASCADE        | The language to which the sentence belongs.|
| created_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the sentence was created.   |
| updated_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the sentence was last updated. |

## 4. LangCards Table
**Table Name:** `lang_cards`

**Description:** This table stores flashcards that include questions and answers.

| Field Name | Data Type    | Constraints                                                     | Description                                 |
|------------|--------------|-----------------------------------------------------------------|---------------------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO INCREMENT                                     | Unique identifier for the lang card.        |
| question   | VARCHAR(255) | NOT NULL                                                        | The question on the lang card.              |
| answer     | VARCHAR(255) | NOT NULL                                                        | The answer on the lang card.                |
| language_id| BIGINT       | FOREIGN KEY REFERENCES `languages(id)` ON DELETE CASCADE        | The language to which the lang card belongs.|
| created_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the lang card was created.   |
| updated_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the lang card was last updated. |

## 5. Decks Table
**Table Name:** `decks`

**Description:** This table stores collections of flashcards grouped into decks.

| Field Name | Data Type    | Constraints                                                     | Description                              |
|------------|--------------|-----------------------------------------------------------------|------------------------------------------|
| id         | BIGINT       | PRIMARY KEY, AUTO INCREMENT                                     | Unique identifier for the deck.          |
| name       | VARCHAR(255) | NOT NULL                                                        | Name of the deck.                        |
| language_id| BIGINT       | FOREIGN KEY REFERENCES `languages(id)` ON DELETE CASCADE        | The language to which the deck belongs.  |
| created_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the deck was created.     |
| updated_at | TIMESTAMP    | NULLABLE                                                        | Timestamp when the deck was last updated. |
| type       | ENUM         | NULLABLE                                                        | Type of the deck (word or sentence).|


## Defining Relationships Between Tables

### Languages Table:
**Primary Entity:** The languages table serves as the primary entity that holds the different languages available in the application.

**One-to-Many Relationships:** This table has a one-to-many relationship with the decks, words, sentences, and lang_cards tables. This means one language can have multiple decks, words, sentences, and language cards associated with it.

### Decks Table:
**Foreign Key:** The decks table contains a foreign key `language_id` that references the `id` column in the `languages` table.

**Belongs To Relationship:** Each record in the decks table belongs to a single record in the `languages` table.

**Type Column:** The decks table includes a `type` column to specify whether the deck is for words or sentences.

### Words Table:
**Foreign Key:** The words table contains a foreign key `language_id` that references the `id` column in the `languages` table.

**Belongs To Relationship:** Each record in the words table belongs to a single record in the `languages` table.

### Sentences Table:
**Foreign Key:** The sentences table contains a foreign key `language_id` that references the `id` column in the `languages` table.

**Belongs To Relationship:** Each record in the sentences table belongs to a single record in the `languages` table.

### LangCards Table:
**Foreign Key:** The lang_cards table contains a foreign key `language_id` that references the `id` column in the `languages` table.

**Belongs To Relationship:** Each record in the lang_cards table belongs to a single record in the `languages` table.

### Entity-Relationship (ER) Diagram Representation
- **Languages (1) —> (N) Decks**
- **Languages (1) —> (N) Words**
- **Languages (1) —> (N) Sentences**
- **Languages (1) —> (N) LangCards**

### Explanation:
- **One-to-Many Relationship:** This type of relationship indicates that a single record in the parent table (`languages`) can be associated with multiple records in the child tables (`decks`, `words`, `sentences`, `lang_cards`).
- **Foreign Key Constraints:** Foreign keys are used to enforce the relationship between tables, ensuring referential integrity. For example, the `language_id` in the `decks` table must match an `id` in the `languages` table.
- **Cascade on Delete:** The `onDelete('cascade')` constraint means that when a record in the parent table (`languages`) is deleted, all related records in the child tables (`decks`, `words`, `sentences`, `lang_cards`) will also be automatically deleted.

### Steps to Implement:
1. **Create Migration Files:** Define the structure of each table and specify foreign keys in the migration files.
2. **Run Migrations:** Execute the migrations to create the tables in the database.
3. **Define Models:** Create Eloquent models for each table and define the relationships using methods like `hasMany` and `belongsTo`.
4. **Set Up Controllers:** Implement controllers to manage the data flow between the database and the views, leveraging the defined relationships.


# Functions By RestFul API

1. Create: Create new Decks and FlashCards(POST)
2. Delete: Delete current decks and Flashcards(DELETE)
3. Edit: Edit current Decks and Flashcards(PUT)
4. Add: Add a new word/sentence on Flashcard(PUT)
5. Index: Show Decks list/Flashcards List(GET)


## In Navigation bar
- Logo, Link for each page (Only show if user login), Login/out button

## Home Page
- Search bar (Not mandatory)
- List of Decks separated by languages

## User's Top Page (THIS IS JUST MY IDEA, WILL REPLACE FROM YOUR IDEA)
Similar to Home page but only listed the Decks user created.
- Nav bar may have both Home and User Page link

## Flashcard List Page
Display a list of flashcards for the selected deck

## Flashcard Add/Edit Page
Input fields for flashcard question and answer
