### KNOWLEDGE CITY TEST
By Victor Rodriguez


**Challenge description**

In this challenge, I  wrote a Login Page and a Student List Page, using HTML5, CSS3, Bootsrap, Javasript, Jquery, PHP and MySQL database.  

The Login page, is a simple HTML5 page that use Javascript and Jquery to validate if the User and Password  exist in a MySql table call api_users, this is executed by an Ajax Call to a PHP api service.
If the user credentials are correct and exist in the table, it is sent to the Student List Page.

The Students List Page is another HTML page that load a Javascript function to call  another API request, via AJAX, to retrive the list of students store in the students table, and the response is sent as an JSON object.  I create a HTML table, to show the students details information. The list will only will display 5 rows per page, so there in a pagination methos usiing Javascript and PHP to show a control
page, in the bottom of the list


**List of requirements**

* PHP ver 7.4.2
* MySQL ver 5.7.2
* Bootsrap framework ver 4.4
* Jquery 3.5

### Installation Notes
Just git clone from the repository.
Create the database.
Import the SQL file, from phpadmin, or MySql command line.
And run it from a local o remote server.
The administrator credetialsa are:
User: ADMIN
Password: 123456

