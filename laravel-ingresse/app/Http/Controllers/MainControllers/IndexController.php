<?php

namespace App\Http\Controllers\MainControllers;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Middleware;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    Public Function Index()
    {
        //calling all the series
        $client = new \GuzzleHttp\Client();
        
        $request =  $client->request('GET', 'http://api.tvmaze.com/shows');
        $response = $request->getBody()->getContents();
       
        $SeriesList = json_decode($response);

        $counter = 0;

        $ImagePathList[$counter] = "";
        $GenresList[$counter] = "";
        $NameList[$counter] = "";

        foreach($SeriesList as $serie)
        {
            //making name list of all series
            
            $NameList[$counter] = $serie->name;

            //making path list of all images
            $ImagePathList[$counter] = $serie->image->medium;

             //making genres list of all series
            if(empty($serie->genres))
            {
                $GenresList[$counter] = "n/a";
            }
            else
            {
                $GenresList[$counter] = $serie->genres[0];
            };
            
            $counter += 1;
        }

        //get and store images in files
        $counter = 1;
      
        foreach($ImagePathList as $image)
        {
            $client = new \GuzzleHttp\Client();

            $url = $image;
            $title = "poster";
            $extension = pathinfo($url, PATHINFO_EXTENSION);

            $filename = $counter.'-'.str_slug($title).'.'.$extension;

            $file =  file_get_contents($url);

            $save = file_put_contents($filename, $file);

            $counter += 1;
        }

        return view('MainViews.SeriesDashboard',compact('NameList','GenresList'));


    }

    //SingleShow Controller

    Public Function Serie($name)
    {
        //calling single show
        $client = new \GuzzleHttp\Client();
        $query = $name;
        
        $request =  $client->request('GET', 'http://api.tvmaze.com/search/shows?q='.$query);
        $response = $request->getBody()->getContents();
       
        $Details = json_decode($response);

        $SingleShowDetails = $Details[0]->show;

        //get and store images in files

            $url = $SingleShowDetails->image->original;
            $title = "OriginalPoster";
            $extension = pathinfo($url, PATHINFO_EXTENSION);

            $filename = str_slug($title).'.'.$extension;

            $file =  file_get_contents($url);

            $save = file_put_contents($filename, $file);

        return view('MainViews.SerieDetails',compact('SingleShowDetails'));
    }

    
}
