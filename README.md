# Lang_Card
This project is a capstone project of CST8257, Algonquin College. Flashcard-Based application for language.
### Laravel framework
PHP/Laravel + Blade

## DB Design
All table will have "created" and "updated" culunm.

### Users Table
- id
- user_name
- password

### Languages Table
- id
- language_name (English, French, Korean, Japanese, Spanish)

### Decks Table
- id
- name (Deck Title)
- conpleted
- user_id
- language_id

### Flashcards Table
- id
- english_text
- second_language_text
- language_id
- user_id
- deck_id
- second_deck_id (Nullable)
- third_deck_id (Nullable)



# Pages
## Login/Register
- Able to login with email and password
- Able to register.
## Home page
Deck List
- Both login and unknown user can see all Decks.
- Separated by all and each language sections.
Clicking *View* => Flashcards list
- Unkown user only can see flashcards in the Deck
- Login user can create a new flashcard if selected Deck is created by login user.

## User Page
Login user's personal page. User can see own Decks and mange Decks/Flashcards.
### Dashboard
- Showing number of Decks/Flashcards created by login user.

### Decks
Deck List
- Only show own Decks separated by all and each languages.
- Able to *Delete*, *Manage*, *Open* the Decks  
*Delete* => Delete the Deck  
*Manage* => Jump to managing page  
*Open* => Jump to the flashcard list belonging to the selected Deck, and able to create a new flashcard  
#### Managing page (flashcards/index.blade.php)
Deck
- Able to edit *Deck title*, *Complete* condition.
Flashcards
- Showing the flashcard list with *Deck list belonging to* and *Edit/Delete* button.
- Able to delete flashcard and *Create Flashcard*  
*Edit* button => Jump to edit page for selected flashcard.  
*Create Flashcrad* => Jump to create flashcard page  
#### Edit page (flashcards/edit.blade.php)
Edit page for selected flashcard.
- Able to change *English Text*, *Second Language Text*, and *Decks*
#### Create page (flashcards/create.blade.php)
Create page for flashcard.
- Able to create flashcard by filling *English Text*, *Second Language Text*, and *Decks*

### Create New
- Able to create a new Deck by filling *Deck Title* and *Language*.










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
