//Convert the switch statement into an object called lookup. 
//Use it to look up val and assign the associated string to the result variable.
// Setup
console.log("Sep 27 2018");
console.log("Object Indexing");
function phoneticLookup(val) {
  var result = "";


  var lookup = {
  	"alpha": "Adams",
  	"bravo": "Boston",
  	"charlie": "Chicago",
  	"delta": "Denver",
  	"echo": "Easy",
  	"foxtrot": "Frank"
  };
  result = lookup[val];



  // Only change code above this line
  return result;
}

// Change this value to test
console.log(phoneticLookup("alpha"));
//phoneticLookup("charlie"); 
//should output "Chicago"
