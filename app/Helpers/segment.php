<?php
    if (! function_exists('activeSegment') ) {

        function activeSegment ($name, $segment = 2, $class = 'active') 
        {   
            return request()->segment($segment) == $name ? $class : '';
        }   
    }  

    if (! function_exists('activeRoute') ) {

        function activeRoute ($route, $currentRoute) 
        {   
            return $route === $currentRoute ? 'active' : '';
        }   
    }  