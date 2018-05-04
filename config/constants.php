<?php


return [
    
	'comission_type' => [
        'F' => 'Fixed Amount Comission',
        'P'=> 'Fixed Percentage Comission',
        'RF' => 'Range Comission'
    ],
	
	'book_condition' => [
	
        'BN'=> 'Brand New',
        'LN'=> 'Like New',
		'VG'=> 'Very Good',
		'G'=> 'Good',
		'A'=> 'Acceptable'
	],
	
	'order_type' => [
	
	'P'=>'Pending',
	'C'=>'InProcess',
    'D'=>'Delivered',
	'R'=>'Rejected',
	'H'=>'Hold'	
	
	],
	
	'cur_symbol' => [
	
	 'cs'=>'INR'
	
	]

];


/* Call this function 

$book_condition = Config::get('constants.book_condition'); 
$order_type = Config::get('constants.order_type'); 
$comission_type = Config::get('constants.comission_type'); 

*/

?>