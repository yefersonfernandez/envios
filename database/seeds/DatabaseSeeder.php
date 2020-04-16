<?php
use Illuminate\Database\Seeder;
use App\Articulo;
use App\Ciudad;
use App\Cliente;
use App\DireccionEnvio;
use App\Pedido;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Ciudad::truncate();
        Cliente::truncate();
        Articulo::truncate();
        DireccionEnvio::truncate();
        Pedido::truncate();
        factory(Ciudad::class,10)->create();//200
        factory(Cliente::class,10)->create();//200
        factory(Articulo::class,10)->create();//200
        factory(DireccionEnvio::class,10)->create();
        factory(Pedido::class,10)->create();

    }
}