<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // inicializa tabla USERS
        DB::table("users")->insert(
            [
                "id"=> 1,
                "name" =>"admin",
                "email"=>"admin@admin.com",
                "email_verified_at"=> NULL,
                "password"=>'$2y$10$hhTW0KElMnPuQO9GFZT1yOIrXd6LI/KabIAMWv0kYNlql0pZtEMjS',
                "facebook" => "admin",
                "twitter"=>"admin",
                "instagram"=>"admin",
                "avatar"=>"userImage.png",
                "rol_id"=>2, 
                "created_at" =>NULL,
                "updated_at" =>NULL
            ]
        );

        // inicializa tabla PAIS
        DB::table("pais")->insert(
            [
                "id_pais"=> 1,
                "nombre_pais" => "Argentina",
                "created_at" =>NULL,
                "updated_at" =>NULL
            ]
        );

        // inicializa tabla PROVINCIAS
        factory(App\Provincia::class, 23)->create();

        // inicializa tabla DESTINOS
        factory(App\Destino::class, 20)->create();

        // inicializa tabla COMENTARIOS
        factory(App\Comentario::class, 10)->create();

        // inicializa tabla FAVORITOS
        factory(App\Favorito::class, 5)->create();

        // inicializa tabla MENSAJES
        factory(App\Mensaje::class, 5)->create();
    }
}
