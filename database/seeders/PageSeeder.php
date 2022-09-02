<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Hakkımızda','Kariyer','Vizyonumuz','Misyonumuz'];
        $count=0;
        foreach($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>str_slug($page),
                'image'=>'https://btm.istanbul/storage/uploads/news/2111/conversions/B2B-nedir-3-large.jpg',
                'content'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                 Nunc tincidunt orci quis sapien scelerisque, at sollicitudin massa aliquam. 
                 Sed vel enim facilisis, ullamcorper nisl eget, aliquam erat. Integer varius 
                 ipsum at quam interdum, ac malesuada felis laoreet. Maecenas risus leo, congue
                 non elementum ut, viverra in velit. Sed ac tellus quis velit vehicula iaculis. 
                 Ut sit amet pharetra dolor. Nunc fermentum eleifend sem vitae consequat. Nunc 
                 nec sapien sapien. Sed velit nunc, ultrices non arcu at, malesuada commodo sem.
                 Nunc sagittis feugiat purus id gravida. Nam ultricies sapien id justo vulputate, 
                 sed finibus ante dictum. Phasellus egestas tempus quam, ac feugiat ex iaculis eget. 
                 Nunc ac quam at nisl ultrices pretium et vel quam. Vivamus dolor felis, molestie ut nibh vitae, sagittis imperdiet risus.',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
