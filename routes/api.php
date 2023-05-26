<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$peliculas = [  "The Godfather",  "Pulp Fiction",  "The Dark Knight",  "The Shawshank Redemption",  "Forrest Gump",  "The Silence of the Lambs",  "Schindler's List",  "Goodfellas",  "The Matrix",  "Star Wars: Episode IV - A New Hope",  "Back to the Future",  "The Terminator",  "Jurassic Park",  "Jaws",  "Raiders of the Lost Ark",  "Alien",  "Blade Runner",  "The Exorcist",  "Psycho",  "The Shining",  "The Omen",  "The Ring",  "Scream",  "The Conjuring",  "A Nightmare on Elm Street",  "Friday the 13th",  "Halloween",  "The Babadook",  "Get Out",  "Hereditary",  "The Witch",  "The Sixth Sense",  "The Village",  "The Happening",  "The Others",  "The Truman Show",  "Eternal Sunshine of the Spotless Mind",  "Inception",  "The Prestige",  "Interstellar",  "Gravity",  "Avatar",  "The Avengers",  "The Lord of the Rings: The Fellowship of the Ring",  "The Hobbit: An Unexpected Journey",  "The Lion King",  "Frozen",  "Finding Nemo",  "Toy Story",  "The Incredibles"];
$series = [  "Breaking Bad",  "Game of Thrones",  "The Sopranos",  "The Wire",  "Friends",  "The Office",  "The Big Bang Theory",  "Stranger Things",  "Black Mirror",  "The Crown",  "Mindhunter",  "Narcos",  "Ozark",  "Peaky Blinders",  "Better Call Saul",  "House of Cards",  "Orange Is the New Black",  "The Handmaid's Tale",  "Fargo",  "American Horror Story",  "The Walking Dead",  "The Haunting of Hill House",  "Chernobyl",  "True Detective",  "Westworld",  "The Mandalorian",  "The Boys",  "The Umbrella Academy",  "Daredevil",  "Jessica Jones",  "Luke Cage",  "Iron Fist",  "The Punisher",  "The Witcher",  "Altered Carbon",  "Sense8",  "Doctor Who",  "Sherlock",  "Striking Vipers",  "Master of None",  "Dear White People",  "Bojack Horseman",  "The Simpsons",  "Family Guy",  "South Park",  "Rick and Morty",  "Star Trek: The Next Generation",  "Buffy the Vampire Slayer",  "The X-Files"];


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
