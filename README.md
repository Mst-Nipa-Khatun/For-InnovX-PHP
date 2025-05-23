# For-Innovx
## Task 1:

### PHP BrainStorm 


PHP, standing for "PHP: Hypertext Preprocessor," is a widely-used, open-source server-side scripting language, particularly well-suited for web development. It's designed to generate dynamic web page content and interact with databases. PHP can also be used for command-line scripting and desktop applications. 

##### Way out of learn PHP: Step by Step :

##### Lesson 1: Introduction to PHP 

What is PHP?
	•	PHP stands for “PHP: Hypertext Preprocessor”
	•	A server-side scripting language used to create dynamic web pages
	•	PHP files have .php extension and are executed on the server

Sample Code:

    <?php
    echo "Hello, PHP!";
    ?>


##### Lesson 2: Variables in PHP

<?php
$name = "Nipa";
$age = 25;

echo "My name is $name and I am $age years old.";
?>
##### Common Variable Types:
   •	string — text (e.g., "Hello")
   
   •	int — numbers (e.g., 25)
   
   •	float — decimals (e.g., 10.5)
   
   •	bool — true or false

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

###### Lesson 5: Functions in PHP

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

###### Lesson 6: Forms & User Input (GET & POST)

HTML Form (POST):

          <form method="POST" action="submit.php">
              Name: <input type="text" name="username">
              <input type="submit" value="Submit">
           </form>

PHP Script (submit.php):

              <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 $name = $_POST['username'];
                 echo "Your name is: $name";
                  }
              ?>

##### Lesson 7: Insert Data into MySQL (Create)

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
            $conn->close();
        ?>
##### Lesson 8: Read Data from MySQL

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

## Task 2:
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
```json
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
```json
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

```json
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

**2. background-image**
   
Sets a background image using a URL.
```
div {
  background-image: url('bg.jpg');
}
```

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

**4. background-attachment**

Specifies whether the background is fixed or scrolls with the page.

i.Roll (default)

ii.fixed
```
div {
  background-image: url('bg.jpg');
  background-attachment: fixed;
}
```
**5. background-position**
 
Sets the position of the background image.

Examples: left top, center center, right bottom.
```
div {
  background-image: url('bg.jpg');
  background-position: center center;
}
```
**6. background (shorthand)**

Combines all background properties in one line:
```
background: [color] [image] [repeat] [attachment] [position];
div {
  background: lightblue url('bg.jpg') no-repeat fixed center;
}
```