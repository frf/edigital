<?php

class DatabaseSeeder extends Seeder {
 
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
 
        $this->call('TabelaUsuarioSeeder');
    }
 
}
 
class TabelaUsuarioSeeder extends Seeder {
 
    public function run()
    {
        $usuarios = Usuario::get();
 
        if($usuarios->count() == 0) {
            Usuario::create(array(
                'email' => 'admin@edigital.com.br',
                'senha' => Hash::make('admin'),
                'nome'  => 'Administrador',
                'tipo'  => 'admin'
            ));
        }
    }
 
}
