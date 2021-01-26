<?php

use Illuminate\Support\Facades\DB;

function jaVotou($cookie) 
{
    $token = db::table('votos')->where('token', $cookie)->count();
    
    if($token > 0)
    {
        return true;
    }else {
        return false;
    }
}


