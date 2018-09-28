function tryMe() {
	console.log("hello world");
}

tryMe();

function testParamArg(param1, param2) {
    console.log("param1","param2");
}

testParamArg("andre","ganteng");

var myGlobal = 5;

function testFunction() {
    var local = "foo";
    console.log(local);
}
testFunction();
console.log(local);

//pass values into a function with arguments
function plusThree(num){
    return num + 3;
}
var answer = plusThree(3); //8

function timesFive(a) {
    return a * 5;
}
console.log(timesFive(3));


/*
queue 
is an abstract data structure where items are kept in (an) order
new items are added to the back of queue
old items are taken off front of queue*/

//still need to figure out what the fuck the stand in line lesson means

//Conditional Logic with IF statements
//the keyword "if" tells JS to execute the "statement" (code in curly brackets) under certain "conditions" only, 
//which is defined in parentheses, and is Boolean
//when condition is true, statement will execute
//when condition is false, statement will not execute
/*
if (condition is met) {
    statement is executed;
}
*/
function test(myCondition) {
    if (myCondition) {
        return "it was true";
    }
    return "it was false";
}

/*Comparison operators, all Boolean
the most basic: == "equality" operator
meaning: if equivalent, true
            if not equal, false
different the singular = sign, which is an "assignment" operator


"strict equality" operator: === 
"inequality" operator: !=
"greater than" operator: >
"less than" operator: <
"greater than or equal to" operator >=
"logical and" operator: && 
    this operator is to validate function with more than one statements/conditions
*/
    if (num > 5 && num < 10) {
    return "yes";
}
return "no"
;
/*
"logical or" operator: ||
*/
    if (num < 10 || num < 5) {
        return "no";
    }
return "yes";


/*
else statements
if condition is true, then statement will execute. If false, then it will not execute.
Else statements give an alternate statement to execute, if false.
*/
if (num > 3) {
    return "bigger than 3";
}
else {
    return "3 or less";
}

// else if statements can give yet another condition and statement if false, and can be chained indefinitely for complex computing
function ladiesLike(dickSize) {
    if (dickSize < 5) {
        return "tiny";
    } else if (dickSize < 10) {
        return "small";
    } else if (dickSize < 15) {
        return "medium";
    } else if (dickSize < 20) {
        return "large";
    } else {
        return "the one mama wants";
    }
}
ladiesLike(11);
// you can determine the type of variable/value with the typeof operator, typeof 3;

//Golf Code
var names = ["Hole-in-one!", "Eagle", "Birdie", "Par", "Bogey", "Double Bogey", "Go Home!"];
function golfScore(par, strokes) {
  // Only change code below this line
  if (strokes == 1) {
      return "Hole-in-one!";
  } else if (strokes <= par -2) {
      return "Eagle";
  } else if (strokes == par -1) {
      return "Birdie";
  } else if (strokes == par) {
      return "Par";
  } else if (strokes == par +1) {
      return "Bogey";
  } else if (strokes == par +2) {
      return "Double Bogey";
  } else {
      return "Go Home!";
  }
  // Only change code above this line
}
// Change these values to test
golfScore(5, 4);

//SWITCH STATEMENTS, used if you have many options to choose from




//OBJECTS
//Accessing Object properties with variables
var dogs = {
    Fido: "Mutt",
    Hunter: "Doberman",
    Snoopie: "Beagle"
  };
  var myDog = "Hunter";
  var myBreed = dogs[myDog] //accessing dogs[Hunter] using bracket notation
  console.log(myBreed); //will print "Doberman"

//Another way to do this:
var someObj = {
  propName: "John"
};

function propPrefix(str) {
  var s = "prop";
  return s + "str";
}

var someProp = propPrefix("Name"); //propPrefix + name argument creates property name "propName"
console.log(someObj[someProp]);

//Updating Object Properties -> using dot notation or bracket notation
var myDog = {
    'name': 'Kaya',
    'breed': 'Balinese',
    'color': 'brown',
    'friends': ['Mona']
}
myDog.name = 'Kaya Anjing'; //or
myDog['name'] = 'Kaya Anjing';

//Add new Properties -> same as updating object properties
//Delete Properties
delete myDog.color;