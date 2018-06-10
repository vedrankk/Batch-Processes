This was created for practice and because I led the Batch funcionality of Drupal.
It is not yet done, since it need to be a little more adaptible, but this is the basic version.

**WALKTHROUGH**

Include the BatchBuilder class in your file, wherever it is.

Create the builder object
```php
$builder = new BatchBuilder();
```
*Optional: The BatchBuilder has a parametar for the directory. That is the path from the file where you are setting the batch, to the root directory of this batch script.
You can see that in the test/index.php file, we supplied the '../' to the BatchBuilder, because that is the path to the location of the class from the file.*


Create the batch array, which has a few necessary items.

```php
//You create the batch array, all elements are required, in the future I will create it to be more versatile, so you can use it without classes
$batch = [
		//Params that will be processed in the function
		'params' => [
			['id' => 1, 'name' => 'Vedran'],
			['id' => 2, 'name' => 'Marko'],
		],
		//Name of the function that will be called for all the params. Params for the function are supplied as an array
		'function' => 'test_function',
		//Name of the file where the functions is stored
		'filename' => 'Test.php',
		//Name of class containing the function
		'class' => 'TestClass',
];
```
So in this batch, the name of the file has to be **Test.php** And that file will contain the following

```php
class TestClass{
	public function test_function(array $values){
		echo $values['id'] .' ' .$values['name'];
	}
}
```

As you see, it has to have the class and the function defined in the batch array.

After this, you just call two functions
```php
//Sets all the variables and starts the batch
$builder->batch_set($batch);
$builder->batch_process();
```

The script will process using the POST request. Currently there is no error detection or reporting, this is just the demo version.
