<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{

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
            'sex' => $request->session()->get('sex', ""),
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

        # Redirect back to the search page w/ the searchTerm *and* searchResults (if any) stored in the session
        # Ref: https://laravel.com/docs/redirects#redirecting-with-flashed-session-data
        return redirect('/generator')->with([
            'year' => $year,
            'sex' => $sex,
            'personality' => $personality,
            'searchResults' => $searchResults
        ]);
    }




}
