<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
    	$author = "%" . Input::get('author') . "%" ;
		$category = "%" . Input::get('category') . "%";
		
		$keywords = [
    		['author', 'LIKE' , $author],
    		['category', 'LIKE', $category],
		];

		return DB::table('Book')->where($keywords)->get();
    }

    public function show(Book $Book)
    {
        return $Book;
    }

    public function store(Request $request)
    {
        $Book = Book::create($request->all());

        return response()->json($Book, 201);
    }
}

