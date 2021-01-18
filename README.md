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
* Recommended WAMP for Windows or MAMP for IOS, to run locally

### Installation Notes
To install this web application locally in your computer, please follow the next steps:

1. Clone the app from Github : repository https://github.com/caribesoft/kctest clone the repository, or
from your termianl type the following command: gh repo clone caribesoft/kctest.
2. Configure your PHP/MySql server locallly, (recommended WAMP for Windows or MAMP for IOS)
3. Create the database named: knowledge
4. Create your tables, with the SQL command from PHPADMIN, open and copy file: /database/hnowledge.sql
5. Configure the Mysql connection: open /class/MYSQL.php file and update the following parameters:
	private $server = "mysql:host=127.0.0.1;dbname=knowledge";
	private $user = "root";
	private $password = "secret";
6. Create your tables, with the SQL command from PHPADMIN, open and copy file: /database/hnowledge.sql
7. Start your Apache / PHP / Msql server 
8. In you browser type: http://localhost:8888/
9. You will see the login screen, please use the following user creentials:
		User: ADMIN
		Password: 123456
10. You will see the USER LIST
