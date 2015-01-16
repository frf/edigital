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
        $this->call('TabelaCatChamadoSeeder');
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

class TabelaCatChamadoSeeder extends Seeder {
 
    public function run()
    {
        $chamados = CatChamado::get();
 
        if($chamados->count() == 0) {
            CatChamado::create(array(
                        'id' => 1,
                        'cat_chamado' => 'Aberto',
                    ));
            CatChamado::create(array(
                        'id' => 2,
                        'cat_chamado' => 'Em Andamento',
                    ));
            CatChamado::create(array(
                        'id' => 3,
                        'cat_chamado' => 'Fechado',
                    ));        
        }
    }
 
}
