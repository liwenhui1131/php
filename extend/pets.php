<?php
/**
 * @auther 李文辉 <lwh1131@outlook.com>
 * @copyright 2014-2017 海量云图（北京）数据技术有限公司
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pets</title>
</head>
<body>
<?php

/**
 *Class Pet.
 *  The class contains one attribute: name.
 *  The class contains four methods:
 */
class Pet
{
    public $name;

    function __construct($pet_name)
    {
        $this->name = $pet_name;
        self::sleep();
    }

    function eat()
    {
        echo "<p>$this->name is eating.</p>";
    }

    function sleep()
    {
        echo "<p>$this->name is sleeping.</p>";
    }

    function play()
    {
        echo "<p>$this->name is playing.</p>";
    }
} // End of Pet class.

/* *
*Cat class extends Pet.
* Cat overrides play().
*/

class Cat extends Pet
{
    function play()
    {

        // Call the Pet::play() method:
        parent::play();

        echo "<p>$this->name is climbing.</p>";
    }
} // End of Cat class.

/* *
*Dog class extends Pet.
* Dog overrides play().
*/

class Dog extends Pet
{
    function play()
    {

        parent::play(); // Call the Pet::play() method:

        echo "<p>$this->name is fetching.</p>";
    }
} // End of Dog class.


$dog = new Dog('Satchel');// Create a dog:

$cat = new Cat('Bucky');// Create a cat:

$pet = new Pet('Rob');// Create an unknown type of pet:

$dog->eat();// Feed them:
$cat->eat();
$pet->eat();

$dog->sleep();// Nap time:
$cat->sleep();
$pet->sleep();

$dog->play();// Have them play:
$cat->play();
$pet->play();

unset($dog, $cat, $pet);// Delete the objects:

?>
</body>
</html>