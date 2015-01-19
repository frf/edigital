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
        $this->call('TabelaStatusChamadoSeeder');
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
                        'cat_chamado' => 'Suporte',
                    ));
            CatChamado::create(array(
                        'id' => 2,
                        'cat_chamado' => 'Dúvida',
                    ));
            CatChamado::create(array(
                        'id' => 3,
                        'cat_chamado' => 'Solicitação',
                    ));        
        }
    }
 
}
class TabelaStatusChamadoSeeder extends Seeder {
 
    public function run()
    {
        $chamados = StatusChamado::get();
 
        if($chamados->count() == 0) {
            StatusChamado::create(array(
                        'id' => 1,
                        'status_chamado' => 'Aberto',
                    ));
            StatusChamado::create(array(
                        'id' => 2,
                        'status_chamado' => 'Em Andamento',
                    ));
            StatusChamado::create(array(
                        'id' => 3,
                        'status_chamado' => 'Fechado',
                    ));        
        }
    }
 
}