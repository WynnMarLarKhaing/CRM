<?php

namespace App\Crm;

class Converter
{
	public function convertNums($input)
	{
		$nums = ["၀"=> 0, "၁" => 1,"၂" => 2,"၃" => 3,"၄" => 4];
        $result = "";
         
        for( $i = 0; $i <= mb_strlen( $input ); $i++ ) {
            $char = mb_substr(  $input , $i, 1 );

            if(array_key_exists($char, $nums)){
                $result .= $nums[$char];
            }else{
                $result .= $char;
            }
            
        }
        return $result;
	}
}