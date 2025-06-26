# For-Innovx
This is my login url:http://localhost/For-Innovx/php/view/html/login.html

## Step 1:

### PHP BrainStorm 


PHP, standing for "PHP: Hypertext Preprocessor," is a widely-used, open-source server-side scripting language, particularly well-suited for web development. It's designed to generate dynamic web page content and interact with databases. PHP can also be used for command-line scripting and desktop applications. 

##### Way out of learn PHP: Step by Step :

#### Lesson 1: Introduction to PHP 

**What is PHP?**
	•	PHP stands for “PHP: Hypertext Preprocessor”
	•	A server-side scripting language used to create dynamic web pages
	•	PHP files have .php extension and are executed on the server

Sample Code:

    <?php
    echo "Hello, PHP!";
    ?>

<hr>

#### Lesson 2: Variables in PHP

<?php
$name = "Nipa";
$age = 25;

echo "My name is $name and I am $age years old.";
?>
**Common Variable Types:**
   •	string — text (e.g., "Hello")
   
   •	int — numbers (e.g., 25)
   
   •	float — decimals (e.g., 10.5)
   
   •	bool — true or false

<hr>

#### Lesson 3: Conditional Statements

      <?php
      $marks = 75;

      if($marks >= 80) {
        echo "Grade: A+";
      } elseif($marks >= 70) {
        echo "Grade: A";
     } else {
       echo "You need improvement.";
      }
    ?>

##### Operators:

Symbol	Meaning

    ==	equal
    !=	not equal
    > 	greater
    <	less
    >=	greater or equal
    <=	less or equal
<hr>

#### Lesson 4: Loops in PHP

###### For Loop:

    for($i = 1; $i <= 5; $i++) {
         echo "Number: $i <br>";
      }

###### While Loop:

      $i = 1;
     while($i <= 5) {
           echo "$i<br>";
          $i++;
      }

##### Foreach Loop (for arrays):

        $fruits = ["Apple", "Mango", "Banana"];
        foreach($fruits as $fruit) {
          echo "$fruit<br>";
        }
<hr>

#### Lesson 5: Functions in PHP

Basic Function:

         function greet() {
              echo "Hello, PHP learner!";
         }
          greet();

Function with Parameter:

        function greetUser($name) {
             echo "Welcome, $name!";
         }
         greetUser("Sadia");

Function with Return:

         function add($a, $b) {
                  return $a + $b;
              }
           echo add(10, 5);
<hr>

#### Lesson 6: Forms & User Input (GET & POST)

**HTML Form (POST):**

          <form method="POST" action="submit.php">
              Name: <input type="text" name="username">
              <input type="submit" value="Submit">
           </form>

**PHP Script (submit.php):**

              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 $name = $_POST['username'];
                 echo "Your name is: $name";
                  }
              ?>
<hr>

#### Lesson 7: Insert Data into MySQL (Create)

   Create Database and Table:
   
	     •	Open phpMyAdmin → Create DB: my_php_db
	     •	Create Table: users with columns:     
        •	id (INT, auto_increment, primary key)
	     •	name (VARCHAR)

###### HTML Form (form.php):

      <form method="POST" action="insert.php">
          Name: <input type="text" name="username">
          <input type="submit" value="Save">
      </form>

###### PHP Insert Script (insert.php):

       <?php
          $conn = new mysqli("localhost", "root", "", "my_php_db");

          if ($conn->connect_error) {
           die("Connection failed");
           }

          $name = $_POST['username'];
          $sql = "INSERT INTO users (name) VALUES ('$name')";

          if ($conn->query($sql) === TRUE) {
               echo "Data inserted successfully!";
              } else {
                   echo "Error: " . $conn->error;
           }
            $conn->close();?>

<hr>

#### Lesson 8: Read Data from MySQL

        <?php
           $conn = new mysqli("localhost", "root", "", "my_php_db");

           if ($conn->connect_error) {
              die("Connection failed");
             }
 
            $sql = "SELECT id, name FROM users";
            $result = $conn->query($sql);

             if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        echo "ID: {$row['id']} — Name: {$row['name']}<br>";
                   }
                } else {
                  echo "No data found.";
                 }
             $conn->close();
          ?>

<hr>

## Step 2:
<hr>

### About CSS:

#### Opacity:
Opacity is a CSS property that controls the **transparency** of an HTML element.

It takes values from 0 to 1.

        i. 1 means fully visible.(100%)
        ii.0 means fully transparent (invisible).(0%)
**Example**

``` 
div {
  opacity: 0.5;
}
 ```
In this code, the div will be 50% transparent.

Complete use:
```
<!DOCTYPE html>
<html>
<head>
<style>
img {
  opacity: 0.5;
}
</style>
</head>
<body>

<h1>Image Transparency</h1>
<p>The opacity property specifies the transparency of an element. The lower the value, the more transparent:</p>

<p>Image with 50% opacity:</p>
<img src="nipa.jpg" alt="nipa" width="170" height="100">

</body>
</html>



```
<hr>

### Z-Index in CSS:

z-index is used to **control layering**, i.e., which element appears on top and which goes underneath.

**Example**
```
.red-box {
	background-color: red;
	top: 50px;
	left: 50px;
	z-index: 1;
}

.blue-box {
	background-color: blue;
	top: 80px;
	left: 80px;
	z-index: 2;
}

```
Here, .box2 will appear on top of .box1 because it has a higher z-index.

```
<!DOCTYPE html>
<html>
<head>
  <style>
    .box {
      width: 150px;
      height: 150px;
      position: absolute;
      color: white;
      font-size: 20px;
      text-align: center;
      line-height: 150px;
    }

    .red-box {
      background-color: red;
      top: 50px;
      left: 50px;
      z-index: 1;
    }

    .blue-box {
      background-color: blue;
      top: 80px;
      left: 80px;
      z-index: 2;
    }
  </style>
</head>
<body>

  <div class="box red-box">Red Box</div>
  <div class="box blue-box">Blue Box</div>

</body>
</html>

```
<hr>

### Clear in CSS

Used to make sure an element doesn’t sit next to floating elements.

**Values**:

left → avoids left floats

right → avoids right floats

both → clears both sides.

Example:
```
<!DOCTYPE html>
<html>
<head>
<style>
img {
  float: left;
}

p.clear {
  clear: left;
}
</style>
</head>
<body>

<h1>The clear Property</h1>

<img src="w3css.gif" width="100" height="132">

<p class="clear">This is some text. This is some text. This is some text. This is some text. This is some text. This is some text.</p>
<p><strong>Remove the "clear" class to see the effect.</strong></p>

</body>
</html>
```
<hr>

###  Align (text-align) in CSS:
Controls the horizontal alignment of text or inline elements.

Values:

left → align text to the left
```
div.b {
  text-align: left;
}

```
right → align to the right
```
div.c {
  text-align: right;
}
```
center → center alignment.
```
div.a {
  text-align: center;
}

```

justify → space out text evenly across width
```
div.d {
  text-align: justify;
}
```
<hr>

### Background in CSS:
Controls background color, images, position, repeat, etc.


Values
```
background-color
background-image
background-repeat
background-attachment
background-position
background (shorthand property)
```

**1. background-color:**
```
div {
  background-color: lightblue;
}
```
Sets the background color of an element.
<hr>  

**2. background-image**
   
Sets a background image using a URL.
```
div {
  background-image: url('bg.jpg');
}
```
<hr>

**3. background-repeat**

Controls whether the background image repeats.

repeat (default)

no-repeat

repeat-x, repeat-y

```
div {
  background-image: url('bg.jpg');
  background-repeat: no-repeat;
}
```
<hr>

**4. background-attachment**

Specifies whether the background is fixed or scrolls with the page.

i.Scroll (default)

ii.fixed
```
div {
  background-image: url('bg.jpg');
  background-attachment: fixed;
}
```
<hr>

**5. background-position**
 
Sets the position of the background image.

Examples: left top, center center, right bottom.
```
div {
  background-image: url('bg.jpg');
  background-position: center center;
}
```
<hr>

**6. background (shorthand)**

Combines all background properties in one line:
```
background: [color] [image] [repeat] [attachment] [position];
div {
  background: lightblue url('bg.jpg') no-repeat fixed center;
}
```
<hr>

### Padding in CSS:

Defines the space inside the element, between the content and its border.(Inner Space)

Values:
```
padding-top: 10px;
padding-right: 15px;
padding-bottom: 10px;
padding-left: 15px;
```
<hr>

### Margin in CSS:

Defines the space outside the element, separating it from others.(Outer Sapce)

Values
```
margin-top: 10px;
margin-right: 20px;
margin-bottom: 10px;
margin-left: 20px;
```
<hr>

## Step 3:
<hr>

### About MySQL:

#### Index in mySQL:
An index in MySQL is a performance optimization tool used to speed up data retrieval from a table.

**Why Use Indexes?**
```
 Faster Search
 Quick Sorting
 Efficient JOINs
 Overall Boost
```

**When to Use Indexes?**

When searching/filtering by a column frequently
```
Columns often used in WHERE, JOIN, ORDER BY
Foreign keys or frequently queried fields
```

**Create an Index**

First create a table with index value
```
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    INDEX (email)
);
```
After creating table idex query:
```
CREATE INDEX index_email ON users(email);
```

**With Index:**

Fast Search: MySQL can find data quickly without scanning the entire table.

Better Performance: Especially useful when the table has thousands or millions of rows.

Efficient JOINs: Joining tables becomes much faster when foreign keys are indexed.

Faster Sorting & Grouping: ORDER BY and GROUP BY operations run much faster.

Less Disk Work: Fewer rows need to be read from the disk.


**Without Index:**

Slow Searches: MySQL has to scan every row to find matching results.

Poor Performance on Large Tables: Queries get slower as the table grows.

Slow JOINs: Without an index, joins become inefficient and slow.

Slower Sorting & Filtering: Operations like sorting or filtering require more time.

More Server Load: Higher CPU and memory usage for big queries.

<hr>

####  Primary Key in mySQL:

A primary key uniquely identifies each record in a table. It cannot be NULL and must be unique.
Each table can have only one primary key.

**Example**
```
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100)
);
```
Here, id is the primary key. It ensures each user has a unique ID.
<hr>

#### Composite Key in mySQL:

A composite key is made by combining two or more columns to create a unique identifier.
Useful when no single column is unique, but the combination is.Used when you want to prevent duplicate combinations of values.

```
CREATE TABLE order_items (
    order_id INT,
    product_id INT,
    quantity INT,
    PRIMARY KEY (order_id, product_id)
);
```
Here, the combination of order_id and product_id uniquely identifies each item in the order — but neither column alone is unique.
<hr>

#### Unique Key (Constraint) in mySQL:

A unique key ensures all values in a column (or group of columns) are different.Unlike primary key, a table can have multiple unique keys. 
**Can have NULL values** (but only one NULL per unique column in some engines).

Example
```
CREATE TABLE employees (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15) UNIQUE
);
```
Here, both email and phone must be unique, but they are not the primary key.

<hr>

#### INNER JOIN(JOIN) in mySQL:

Returns only matching rows from both tables. If there's no match, that row is not shown in the result.

Example:
When two table are present users and order ,then Only users who have at least one order will appear.
```
SELECT users.name, orders.order_date
FROM users
JOIN orders ON users.id = orders.user_id;
```
<hr>

#### LEFT JOIN (or LEFT OUTER JOIN) in mySQL:

Returns all rows from the left table, and the matching rows from the right table.

Example:

You want to list all users, even those who have no orders yet.

```
SELECT users.name, orders.order_date
FROM users
LEFT JOIN orders ON users.id = orders.user_id;
```
Shows all users. If a user has no orders, order_date will be NULL.
<hr>

## Step 4:

### About PHP Function

### Five PHP Array Functions:
1. array_push()
2. array_pop()
3. array_merge()
4. in_array()
5. array_keys()

**array_push()**

Adds one or more elements to the end of an array.
```
$fruits = ["apple", "banana"];
array_push($fruits, "orange", "mango");
print_r($fruits); 

// Output: ["apple", "banana", "orange", "mango"]

```

**array_pop()**

Removes the last element from an array.
```
$colors = ["red", "green", "blue"];
array_pop($colors);
print_r($colors); 
// Output: ["red", "green"]

```
**array_merge()**

Merges two or more arrays into one.
```
$a = ["a", "b"];
$b = ["c", "d"];
$merged = array_merge($a, $b);
print_r($merged); 
// Output: ["a", "b", "c", "d"]

```

**in_array()**

Checks if a value exists in an array.
```
$names = ["Ali", "Sara", "John"];
if (in_array("Sara", $names)) {
echo "Name found!";
}
// Output: Name found!

```

**array_keys()**

Returns all the keys from an array.

```
$person = ["name" => "Alex", "age" => 30];
$keys = array_keys($person);
print_r($keys); 
// Output: ["name", "age"]

```

<hr>

### Five PHP String Functions:

1. strlen()
2. strtoupper() / strtolower()
3. substr()
4. str_replace()
5. strpos()

**strlen()**

Returns the length of a string.

```
echo strlen("Hello PHP");
// Output: 9

```
**strtoupper() / strtolower()**

Converts string to uppercase or lowercase.
```
echo strtoupper("php"); // Output: PHP
echo strtolower("HELLO"); // Output: hello

```
**substr()**

Returns a part (substring) of a string.
```
echo substr("Hello World", 0, 5); 
// Output: Hello

```
**str_replace()**

Replaces all occurrences of a string with another string.
```
echo str_replace("World", "PHP", "Hello World");
// Output: Hello PHP

```
**strpos()**

Finds the position of the first occurrence of a substring.
```
echo strpos("I love PHP", "PHP"); 
// Output: 7
```

<hr>

## Status Code:

**What is an HTTP Status Code?**

An HTTP Status Code is a 3-digit number sent by a server in response to a client's request (like a browser or API call).

**Categories of Status Codes:**

a.**1xx**	-- Informational --	Request received, keep going

b.**2xx** --	Success --	Request was successfully processed

c.**3xx** --	Redirection --	Further action needed

d.**4xx**	-- Client Error --	Problem with the request

e.**5xx**	-- Server Error --	Server failed to fulfill request

<hr>

**Some common use http status code:**

**200=OK** :The request succeeded.

**201=Created** :The resource was successfully created (used with POST).

**204=No Content** :Request succeeded but no content to return.

**301=Moved Permanently** :The URL has been changed permanently.

**302 = Found (Temporary Redirect)** :Temporarily redirected to another URL.

**304=Not Modified** :Cached version of the resource is still valid; no need to resend it.

**400=Bad Request** :The server could not understand the request (invalid syntax).

**401=Unauthorized** :Authentication required or failed.

**404=Not Found** :The requested resource could not be found.

**405=Method Not Allowed** :HTTP method (GET, POST, etc.) not allowed on this endpoint.

**500=Internal Server Error** :something went wrong on the server.

**502=Bad Gateway** :Bad response from another server	

<hr>

## HTTP Methods

HTTP methods define what kind of action you want to perform on the server (like creating, reading, updating, or deleting data).

Some http methods:
```
i.POST
ii.GET
iii.PUT
iv.DELETE
```
<hr>

### 1. POST – (Create Data)

Used to submit data to the server (like form submission, API call to insert).

example
```
$userName = $_POST['userName'];
$email = $_POST['email'];

```
<hr>

### 2. GET – (Read Data)

Used to retrieve data from the server.
example:
```
$userId = $_GET['userId'];
echo "User ID is: $userId";
```
<hr>

###  3. PUT – (Update Data)

Used to update existing data on the server.

example
```
parse_str(file_get_contents("php://input"), $_PUT);
$userId = $_GET['userId'];
$newEmail = $_PUT['email'];

```
PHP does not natively support $_PUT, so you have to read the raw input:
<hr>

### 4. DELETE – (Delete Data)

Used to delete a resource from the server.

example
```
parse_str(file_get_contents("php://input"), $_DELETE);
$userId = $_GET['userId'];
```
<hr>

**Using all in one php file:**

```
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        echo "Creating data using POST";
        break;

    case 'GET':
        echo "Reading data using GET";
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $_PUT);
        echo "Updating data using PUT";
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        echo "Deleting data using DELETE";
        break;

    default:
        echo "Unsupported method!";
}

```
<hr>

#   END


