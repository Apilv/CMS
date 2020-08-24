# CMS project
## Content Managment System

### Project features:
##### - User side (read only)
##### - Login to admin
##### - Manage content in admin page


## How to use it:
Copy repository URL and open it with the code editor, save the project to the root directory of your local server e.g.(AMPPS, XAMPP).
#### Creat project DB:
###### Open MySQL Workbench.
Make sure that MySQL Connection Login is set to:
```
    user = root
    password = mysql
```
 Connect to SQL. Create New SQL tab. Inside tab paste and execute following code:
``` 
CREATE DATABASE cms;
	CREATE TABLE cms.pages (
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        pageName varchar(255),
        content TEXT
        );
		INSERT INTO cms.pages VALUES (1,'Home','This is Home page!'),
		(2,'News','This is News page!'),
		(3,'Contact Us','This is Contact Us page!'),
		(4,'About Us','This is About Us page!'),
		(5,'Services','This is Services page!');
```
After you succesfuly created DB, go to browser -> localhost, open CMS directory.

#### (Login details provided as values and placeholders)

### Author: [Andrius Pilvelis](https://github.com/Apilv)
