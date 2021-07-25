<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class Travel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('travels')->insert(
            [
                'name'=>'Sapa-Garden-Thiên đường sống ảo giữa lòng phố núi(Khách sạn 4 sao)',
                'start_place' =>'Nơi khởi hành :Hà Nội',
                'from_date' =>'2021-06-10',
                'to_date' =>'2021-06-12',
                'price' =>'200000',        
                'status' =>'Còn chổ', 
                'transport' =>'Số chổ còn nhận:4',
                'type' =>'Cao cấp',
                'image' =>'http://lynluxurytravel.com/wp-content/uploads/2018/12/tf_161004114252_892046.jpg',       
            ],
            [
                'name'=>'Sapa-Garden-Thiên đường sống ảo giữa lòng phố núi(Khách sạn 4 sao)',
                'start_place' =>'Nơi khởi hành :Hà Nội',
                'from_date' =>'2021-06-10',
                'to_date' =>'2021-06-12',
                'price' =>'200000',        
                'status' =>'Còn chổ', 
                'transport' =>'Số chổ còn nhận:4',
                'type' =>'Cao cấp',
                'image' =>'https://cdn.yeudulich.com/940x630/media/attraction/attraction/VNMVLO05.jpg',       
            ],
            );
    }
}
