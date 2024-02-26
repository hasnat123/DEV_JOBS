<?php

    namespace App\Models;

    class Test
    {
      public static function all()
      {
        return 
        [
            [
                'id' => 1,
                'title' => 'Listing One',
                'desc' => 'Lorem Ipsum Dolor.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'desc' => 'Lorem Ipsum Dolor.'
            ]
        ];
      }
      
      public static function find($id)
      {
        $listings = self::all();

        foreach($listings as $listing)
        {
            if ($listing['id'] == $id)
            {
                return $listing;
            }
        }
      }
    }
?>