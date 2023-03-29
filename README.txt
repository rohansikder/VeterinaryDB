Github - https://github.com/rohansikder/VeterinaryDB

How to run:
Step 1 -  Make sure secure_file_priv value is set too "" in my.ini file. - This allows mysql to access pictures
Step 2 - Right click on wamp and go into wamp settings then go into Caution: Risky! Only for experts and check allow links on projects homepage (Note: Wamp may restart after this)- This will allow easy access of the php files from http://localhost/
Step 3 - Copy Project folder into C:wamp64/www 
Step 3 - Copy animals,petOwners and staff image folders into the C: drive - This is where the path is to access the images from the database
Step 4 - Copy Database script from Veterinary.sql and paste into mySql Console.
Step 5 - Go to http://localhost/ and click DatabaseManagementProject under your projects then click into PHP folder
Step 6 - Click into the table name. php like to see the database on the front end.

To Run mySql Queries:
Copy the Query from Queries.sql and paste into mySql console.

Schema:
My Schema can be found in the Schema and EER Diagram pdf, Here I drew up my first basic schema of the vet database.
I have also added the EER Diagram of my final database.

Database:
In Veterinary.sql my database is located in here.

Queries:
In the Queries.sql file I have my Multiple join and Aggregate queries.

PHP Files:
PHP files are located in the PHP folder, There is a php file for each table and each set of images and also a dbConfig php file this is used to access the database.

Images:
Images are stored in three separate folders and these should be put in the c: drive to be accessed by mySql.
