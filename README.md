# StreetWear Storm
A website allowing users to browse a catalog of shoes ranging in a variety of brands under the sneakers categories. 
A user is presented with the home page showcasing the newest shoes added currently with graphics making the shoes pop. 
To shop the user will navigate through the navbar showing the options of: Newest Arrivals, Mens, Women's and kids. 
Upon navigating through the page users can pick out shoes and add them to the cart. Users can view the cart and 
then proceed to checkout filling out user information. 
Users who have signed up can track their orders that have been placed.

## Authors
* Peter Eang
* Jada Senebouttarath

## Project Requirements
### 1. Separates all database/business logic using the MVC pattern
* Database and business logic under the model folder
* All HTML files under the views folder
* Routes to all the HTML files under the index.php
* Classes under the classes folder
* JavaScripts under scripts

### 2. Routes all URLS and leverages templating language using the Fat-Free Framework
* All routes are in the index.php and leverages templating language using the Fat-Free Framework

### 3. Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.
* Database layer is under model as data-layer.php. Cart detail and Shoe are the related tables (one to many relationship).

### 4. Data can be viewed and added
* Database layer uses PDO and prepared statements to add, retrieve, and delete from the database.

### 5. Has a history of commits from both team members to a Git repository. Commits are clearly commented.
* Each teammate has a history of commits and commits are clearly commented.

### 6. Uses OOP, and defines multiple classes, including at least one inheritance relationship.
* Two classes. User and PremiumUser. User contains first and last name, username, password, and email. The Premium User
  extends from the User class.

### 7. Contains full Docblocks for all PHP files and follows PEAR standards.
* All PHP files contains Docblocks and follows PEAR standards.

### 8. Has full validation on the client side through JavaScript and server side through PHP.
* User and Premium User signup has full validation on the client side through JavaScript(scripts/signup.js)  and
  through PHP (model/validation.php)

### 9. All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.
* All functions and files are well-commented.

### 10. Your submission shows adequate effort for a final project in a full-stack web development course.
* We learned how to use a version control system to maintain source code, use the Model-View-Controller, and we
  were able to incorporate it into our project.

### BONUS: Incorporates Ajax that access data from a JSON file, PHP script, or API.
* We did not incorporate Ajax

# UML Class Diagram

# ER Database Diagram
