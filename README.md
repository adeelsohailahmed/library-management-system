# Library Management System
A rudimentary library management system, designed and developed for the class of subject 'Web Programming'.

Live Demo will be hosted again at 000webhost when they sort several issues with their free plan they're currently facing...


## Functionality
The project has been designed from the librarian's point of view. It allows the librarian to:

1. Create an account for themselves (i.e. create a librarian account). 

   Note: Newly registered users receive an email containing activation link. User must click or visit that link to activate their account, as they can't login with an account which hasn't been activated. 
2. Create account for library members.
3. Issue books to members as well as receive books previously issued to the members.
4. View the list of issued books.
5. View the list of all the books present in various shelves of the library.
6. View the list of all the members of the library.
7. Order data by multiple columns. Search and/or filter data by any column in the list. Applies to all the aforementioned lists.
8. View, Edit, or Remove details of an individual book. Additional information about the book is fetched via GoodReads API.
9. View, Edit, or Remove details of an individual member.

## Technical Details
Front-end written using HTML5, CSS3, JavaScript, jQuery, and BootStrap 4. Used AJAX for Input Validation and for presenting dynamic options. Also used DataTables to allow users to search the book listings with flexibility.

Back-end written in pure PHP (without using any PHP framework). Used PHPMailer to send account activation emails. Used MySQL database, and PDO to query the database. Also used GoodReads API to display reviews and additional information about any book.

Works in both PHP 5.6 and PHP 7.

The project tries to mimic a simple Model-View-Controller (MVC) architecture.
