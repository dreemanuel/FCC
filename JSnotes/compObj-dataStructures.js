console.log("Sep 27 2018");
console.log("Complex Objects in Data Structures");

//example data structure:
var ourMusic = [
  {
    "artist": "Daft Punk",
    "title": "Homework",
    "release_year": 1997,
    "formats": [
      "CD",
      "Cassette",
      "LP"
    ],
    "gold": true
  },
  {
    "artist": "Billy Joel",
    "title": "Piano Man",
    "release_year": 1973,
    "formats": [ 
      "CD",
      "8T",
      "LP"
    ],
    "gold": true
  },
  {
    "artist": "Bury Your Dead",
    "title": "Cover Your Tracks",
    "release_year": 2004,
    "formats": ["CD", "Cassette", "LP", "MP3"],
    "gold": false
  },
];

//This is an array which contains one object inside. The object has various pieces of metadata about
//an album. It also has a nested "formats" array. If you want to add more album records, you can do
//this by adding records to the top level array.

//Objects hold data in a property, which has a key-value format. In the example above, "artist":
//"Daft Punk" is a property that has a key of "artist" and a value of "Daft Punk".

console.log(ourMusic);