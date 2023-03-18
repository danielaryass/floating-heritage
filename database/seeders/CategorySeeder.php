<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name'           => 'Teater',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Film',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Tari',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Musik',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Fotografi',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Cerita',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Komik',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Photobook',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Lingkungan',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Masyarakat',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Usaha Pelaku Pesisir',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Edukasi',
                'user_id'        => 1,
            ],
            [
                'name'           => 'Hiburan',
                'user_id'        => 1,
            ],

            ];
        
        Category::insert($category);

    }
}
