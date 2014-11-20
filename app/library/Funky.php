<?php

namespace app\library;

class Funky {

        public static function getDays($end=null) { 

            
            date_default_timezone_set('Australia/Melbourne');
            
            $latequotes = ['Just do it!', 'Get it done', 'Not up to it?', 'Find a way to do it'];
            $quote = array_rand($latequotes);
            
            $start = new DateTime();
            $end = new DateTime($end);
            
            $tsstart = strtotime('today midnight');
            $tsend = $end->getTimestamp();
            
            if ($tsstart > $tsend)
            {
                return "Overdue: $latequotes[$quote]";
            }
            
            if ($tsend >= $tsstart && $tsend <= ($tsstart + 86399))
            {
                return "Today";
            }
            
            $interval = $start->diff($end); 
            $doPlural = function($nb,$str){return $nb>1?$str.'s':$str;}; // adds plurals 
            
            $format = array(); 
            if($interval->y !== 0) { 
                $format[] = "%y ".$doPlural($interval->y, "year"); 
            } 
            if($interval->m !== 0) { 
                $format[] = "%m ".$doPlural($interval->m, "month"); 
            } 
            if($interval->d !== 0) { 
                $format[] = "%r%a ".$doPlural($interval->d, "day"); 
            } 
             
            if($interval->h !== 0) { 
                $format[] = "%h ".$doPlural($interval->h, "hour"); 
            } 
            if($interval->i !== 0) { 
                $format[] = "%i ".$doPlural($interval->i, "minute"); 
            } 
            if($interval->s !== 0) { 
                if(!count($format)) { 
                    return "less than a minute ago"; 
                } else { 
                    $format[] = "%s ".$doPlural($interval->s, "second"); 
                } 
            } 
           
            
                
            // We use the two biggest parts 
            if(count($format) > 1) { 
                $format = array_shift($format)." and ".array_shift($format); 
            } else { 
                $format = array_pop($format); 
            } 
            
            return $interval->format($format); 
        } 

        //show the contents of an array simple formatting for easy read
        public static function inarray($var)
        {
            echo '<pre style="background-color: #eee; width: 75%; margin: 0 auto; padding: 10px">';
            print_r($var);
            echo '</pre>';
        }

        public static function  dump($var)
        {
            echo '<pre style="background-color: #eee; width: 75%; margin: 0 auto; padding:10px">';
            var_dump($var);
            echo '</pre>';
        }

        //simple random string generator
        public static function str_random($length)
        {
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        }

        public static function dd($var)
        {
            echo '<pre style="background-color: #eee; width: 75%; margin: 0 auto; padding:10px">';
            var_dump($var);
            echo '</pre>';
            die();

        }

}