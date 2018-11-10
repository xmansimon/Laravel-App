<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    /*
     * GET /books
     */
    public function index()
    {
        return view('names.generator');
    }

    /*
     * GET /books/{title}
     */
    public function show($title)
    {
        return view('books.show')->with(['title' => $title]);
    }


    /**
     * GET
     * /books/search
     * Show the form to search for a book
     */
    public function generate(Request $request)
    {
        return view('names.generator')->with([
            'year' => $request->session()->get('year', ''),
            'personality' => $request->session()->get('personality', ""),
//            'compassionate' => $request->session()->get('compassionate', ""),
//            'diligent' => $request->session()->get('diligent', ""),
//
//            'persistent' => $request->session()->get('persistent', ""),
//
//            'unassuming' => $request->session()->get('unassuming', ""),
//            'reliable' => $request->session()->get('reliable', ""),
            'sex' => $request->session()->get('sex', ""),
//            'female' => $request->session()->get('female', ""),
            'searchResults' => $request->session()->get('searchResults',"")


        ]);


    }

    /**
     * GET
     * /books/search-process
     * Process the form to search for a book
     */
    public function searchProcess(Request $request)

    {
        $request->validate([
            'personality' => 'required',
            'year' => 'required|integer|between:1900,2010',
            'sex' => 'required',

        ]);
        # Start with an empty array of search results; books that
        # match our search query will get added to this array
        $year = $request->input('year', null);

        $sex = $request->input('sex', null);

        $personality = $request->input('personality', null);



//
//
//        # Store the searchTerm in a variable for easy access
//        # The second parameter (null) is what the variable
//        # will be set to *if* searchTerm is not in the request.
//        $searchTerm = $request->input('searchTerm', null);
//
//        # Only try and search *if* there's a searchTerm
//        if ($searchTerm) {
//            # Open the books.json data file
//            # database_path() is a Laravel helper to get the path to the database folder
//            # See https://laravel.com/docs/helpers for other path related helpers
//            $namesRawData = file_get_contents(database_path('/names.json'));
//
//            # Decode the book JSON data into an array
//            # Nothing fancy here; just a built in PHP method
        $namesRawData = file_get_contents(database_path('/names.json'));

        $names = json_decode($namesRawData, true);
//
        $searchResults = [];
        $bdayarray = [];
        $personalityarray = [];
        $sexarray = [];

        # Loop through all the book data, looking for matches
        # This code was taken from v0 of foobooks we built earlier in the semester
        foreach ($names as $n => $name) {
            //echo $n;

            //bday input, 1990 is the divide line for names
            if ($year > 1990) {
                if ($name['year'] > 1990) {
                    array_push($bdayarray, $n);
                }

            } else {
                if ($name['year'] < 1990) {
                    array_push($bdayarray, $n);
                }
            }
            //sex input
            if ($sex == 'male') {
                if ($name['sex'] == 'male') {
                    array_push($sexarray, $n);
                }
            } else {
                if ($name['sex'] == 'female') {
                    array_push($sexarray, $n);
                }
            }


            if ($personality % 3 == 0) {
                if ($name['personality'] == 1) {
                    array_push($personalityarray, $n);
                }
            } else if ($personality % 3 == 1) {
                if ($name['personality'] == 2) {
                    array_push($personalityarray, $n);
                }
            } else if ($personality % 3 == 2) {
                if ($name['personality'] == 3) {
                    array_push($personalityarray, $n);
                }
            }
        }
        //find the name meet all the requirements.
        $searchResults = array_intersect($sexarray, $personalityarray);
        $searchResults = array_intersect($searchResults, $bdayarray);
       // echo var_dump($searchResults);
//
//        if(!empty($searchResults)){
//            return dump($searchResults);
//        }


//
//
//
        # Redirect back to the search page w/ the searchTerm *and* searchResults (if any) stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return redirect('/generator')->with([
            'year' => $year,
            'sex' => $sex,
            'personality' => $personality,
//            'caseSensitive' => $request->has('caseSensitive'),
            'searchResults' => $searchResults
        ]);
    }


//
//        # Code will eventually go here to add the book to the database,
//        # but for now we'll just dump the form data to the page for proof of concept
//        dump($request->all());
//    }


}
