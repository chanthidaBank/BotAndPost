<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
  
    public function index()
    {
         $allcommand = '';
         $command = '';
         $x=0;
         $y=0;
         $dir = "N";

        return view('bot',compact('allcommand','command','x','y','dir'));
    }

    public function walk(Request $request)
    {
        $command = $request->command;
        $directions = [];           
        $str_L = join(",L,",explode("L",$command));         
        $str_R = join(",R,",explode("R",$str_L));
        $str_W = join("",explode(",W",$str_R));   
        $str_W = join(",W",explode("W",$str_W));   
                                 
        $str = $str_W;
        $str_comma = explode(",",$str);
        
        for($i = 0; $i < count($str_comma); $i++)
        {            
            if($str_comma[$i] != '') {
                array_push($directions,$str_comma[$i]);               
            }
        }
        
        list($x,$y,$dir) = $this->algorithm($directions);    

        return response()->json([
            'x'=>$x, 
            'y'=>$y, 
            'dir'=>$dir
        ]);
    }


    public function algorithm($directions) {      
      $x=0;
      $y=0;
      $dir = "N";

        for($i = 0; $i < count($directions); $i++) {    

            $distance = $directions[$i];                    
            $distance = intval(preg_replace('/[^0-9]+/', '', $distance), 10);

            $direction = $directions[$i];
            $regex = '/[LRW]/';
            preg_match($regex,$direction,$d);
            $direction = $d[0];
           

            if($dir == "W"){
              if($direction == 'R'){
                  $y = $y+$distance;
                  $dir = "N";
              }else if($direction == 'L'){
                  $y = $y-$distance;
                  $dir = "S";
              }else if($direction == 'W'){
                  $x = $x-$distance;
                  $dir = "W";
              }
            }else if($dir == "E"){
              if($direction == 'R'){
                  $y = $y-$distance;
                  $dir = "S";
              }else if($direction == 'L'){
                  $y = $y+$distance;
                  $dir = "N";
              }else if($direction == 'W'){
                  $x = $x+$distance;
                  $dir = "E";
              }
            }else if($dir == "N"){
              if($direction == 'R'){
                  $x = $x+$distance;
                 $dir = "E";
              }else if($direction == 'L'){
                  $x = $x-$distance;
                  $dir = "W";
              }else if($direction == 'W'){
                  $y = $y+$distance;
                  $dir = "N";
              }

            }else if($dir == "S"){
              if($direction == 'R'){
                  $x = $x-$distance;
                  $dir = "W";
              }else if($direction == 'L'){
                  $$x = $x+$distance;
                  $dir = "E";
              }else if($direction == 'W'){
                  $y = $y-$distance;
                  $dir = "S";
              }
            }
             
        }

        return array($x,$y,$dir);
    }
}