<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            RolesTableSeeder::class,
            CentersTableSeeder::class,
            UsersTableSeeder::class,
            BasketTableSeeder::class,
            ProductsTableSeeder::class,
            OrdersTableSeeder::class,
            OrdersContentTableSeeder::class,
            MetaEventsTableSeeder::class,
            EventsTableSeeder::class,
            CategoriesTableSeeder::class,
            CommentsTableSeeder::class,
            IdeasTableSeeder::class,
            IdeasLikesTableSeeder::class,
            NotificationsTableSeeder::class,
            SubscribersTableSeeder::class,
            PicturesTableSeeder::class,
            PicturesLikesTableSeeder::class,
            CommentsLikesTableSeeder::class
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
