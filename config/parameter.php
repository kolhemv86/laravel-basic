<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Common Array Values
    |--------------------------------------------------------------------------
    |
    */

        'fuel_type'   => [
            'diesel'  => 'Diesel',
            'petrol' => 'Petrol',
        ],
        'transmission_type'  => [
            'manual'  => 'Manual',
            'auto' => 'Auto',
        ],
        'sale_mode' => [
            'wholesale'  => 'Wholesale',
            'retail' => 'Retail',
            'oss' => 'OSS',
        ],
        'vehicle_status' => [
            'active'  => 'ACTIVE',
            'pending' => 'PENDING',
            'sold' => 'SOLD',
        ],
		'power_window' => [
            'manual'  => 'Manual',
            'auto' => 'Auto',
           
        ],
		'power_door_lock' => [
            'manual'  => 'Manual',
            'auto' => 'Auto',
           
        ],
		 
		'inspection_status' => [
            'Pending'  => 'Pending',
            'Approved' => 'Approve',
			'Rejected' => 'Reject',
           
        ],
        'expense_type' => [
            'PURCHASE'  => 'PURCHASE',
            'SHOP' => 'SHOP',
            'DETAIL' => 'DETAIL',
            'FINANCE' => 'FINANCE',
            'PACK' => 'PACK',
            'OTHER' => 'OTHER',
            'DELIVERY' => 'DELIVERY',
        ],
        'expence_status' =>[
            'CREATED' => 'CREATED',
            'APPROVED' => 'APPROVED',
            'REJECTED' => 'REJECTED',
        ],        
        'account_type' =>[
            'CHECKING' => 'CHECKING',
            'CREDIT CARD' =>'CREDIT CARD',
            'CASH' => 'CASH',
            'CREDIT ACCOUNT' => 'CREDIT ACCOUNT',
            'PETTY CASH' => 'PETTY CASH',
            'OTHER' => 'OTHER',
        ]
        
		
];
