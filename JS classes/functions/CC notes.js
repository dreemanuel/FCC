/*
7 FUNDAMENTAL DATA TYPES IN JS:
    - strings
    - numbers
    - booleans
    - null
    - undefined
    - symbols
    - objects

*methods are actions that can be performed on objects


ES6
    - helper functions
    - ternary operator
    - function expressions    
    - arrow functions
        fat arrow notation
        () => to replace having to write "function" everytime you want to declare a function;
    - implicit return;


ARRAY Methods
    - push() : adds item to end
    - pop() : removes last item
    - shift() : removes first item
    - unshift() : add item to beginning
    - slice() : only list a portion of the entire array
        slice(a,b) -> a: start array index, b: end array index (slice does not include b)
        eg. array [0,1,2,3,4,5,6]
            console.log(array.slice(2,5)); //outputs [2,3,4]
        slice does NOT alter the array; it just retrieves the information
    - indexOf(a) : retrieves the index number for item stated in parentheses (a)

FOR LOOPS
    iterates an action until stopping conditions are met, then moves into the next part of program
*/
    for (let counter = 0;       //counter var starts at 0;
        counter < 4;            //counter var ends if < 4 is false;
        counter++)              //counter var increments by 1;
        {
        console.log (counter);  //code block to execute
    };
    //output:
    //0
    //1
    //2
    //3
    //4
/*
    the for loop contains three expressions:
        - initializing iterator ex.
        - stopping ex.
        - iteration 

Looping in reverse:
    - set iterator to highest desired value
    - set stop to undder the desired amount

Looping through arrays:
    - use < arrayName.length to stop the loop
    */
var bobsFollowers = ['Fred', 'Jim', 'Jane', 'Kris'];
var tinasFollowers = ['Jane', 'Kris', 'Jon'];
var mutualFollowers = [];

for (let i = 0; i < bobsFollowers.length; i++) {
  for (let j = 0; j < tinasFollowers.length; j++) {
    if (bobsFollowers[i] === tinasFollowers[j]) {
      mutualFollowers.push(tinasFollowers[j])
    }
  }
}
console.log(mutualFollowers)

/*

WHILE LOOPS

for loop is ideal when we know how many times the loop should run, but we don't always know this;
while loop is used when we don't know how many loops will run until code is stopped.
eg.
*/
let whileLoop = 1;
while (whileLoop < 4) {                     //stop is declared first, in paretheses
    console.log(whileLoop); whileLoop++;    //code block, containing increment iteration
}


assign random numbers to index an array;
*/
const cards = ['diamond', 'spade', 'heart', 'club'];
let currentCard = '';
while (currentCard !== 'spade') {
  currentCard = cards[Math.floor(Math.random() * 4)];
  console.log(currentCard);
};
/*

DO WHILE LOOPS
to execute a statement once first before looping it to a condition.
the do while loop will run at least once even if condition != true.
*/

let countString = '';
let i = 0;

do {
    countString = countString + i;
    i++;
} while (i < 5);
console.log(countString);

/*
HIGHER ORDER FUNCTIONS are functions that pass other functions as parameters/arguments, or returns a function.
functions as parameters are called callback functions


ITERATORS




SWITCH
function caseInSwitch(val) {
  var answer = "";
  // Only change code below this line
  
  switch (val) {
    case 1:
      answer = 'alpha';
      break;
    case 2:
      answer = 'beta';
      break;
    case 3: 
      answer = 'gamma';
      break;
    case 4: 
      answer = 'delta';
      break;
  }
  // Only change code above this line  
  return answer;  
}

// Change this value to test
caseInSwitch(2);
