<?php

namespace App\Http\Controllers;
use File;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
     public function index()
    {
    		$filename1 = "authors";
    		$filename2 = "posts";
		    $path1 = "https://maqe.github.io/json/authors.json"; 
		    $path2 = "https://maqe.github.io/json/posts.json"; 
		   
		    $authors = json_decode(file_get_contents($path1), true); 
		    $posts = json_decode(file_get_contents($path2), true);		    

        return view('post', compact('authors','posts'));
    }
}