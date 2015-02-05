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
 
        
        DB::table('cliente_pgtos')->delete();
        DB::table('produtos')->delete();
        DB::table('moeda')->delete();
        DB::table('mensagens')->delete();
        DB::table('categorias')->delete();
        DB::table('chamados')->delete();
        DB::table('usuarios')->delete();
        DB::table('cliente')->delete();
       
        DB::statement("ALTER SEQUENCE cliente_id_seq MINVALUE 0;");
        DB::statement("select setval('public.cliente_id_seq', 0, true);");
        
        DB::statement("ALTER SEQUENCE categorias_id_seq MINVALUE 0;");
        DB::statement("select setval('public.categorias_id_seq', 0, true);");
        
        DB::statement("ALTER SEQUENCE moeda_id_seq MINVALUE 0;");
        DB::statement("select setval('public.moeda_id_seq', 0, true);");
        
        DB::statement("ALTER SEQUENCE produtos_id_seq MINVALUE 0;");
        DB::statement("select setval('public.produtos_id_seq', 0, true);");
        
        DB::statement("ALTER SEQUENCE usuarios_id_seq MINVALUE 0;");
        DB::statement("select setval('public.usuarios_id_seq', 0, true);");
        
        $this->call('TabelaClienteSeeder');
        $this->call('TabelaCategoriaSeeder');
        $this->call('TabelaUsuarioClienteSeeder');
        $this->call('TabelaUsuarioSeeder');
        $this->call('TabelaMoedaSeeder');
        $this->call('TabelaProdutoSeeder');
        $this->call('TabelaPgtoSeeder');
        $this->call('TabelaCatChamadoSeeder');
        $this->call('TabelaStatusChamadoSeeder');
    }
 
}

 

class TabelaClienteSeeder extends Seeder {
 
    public function run()
    {
        $clientes = ClienteQuery::create()->find();
 
        if($clientes->count() == 0) {
            $oCliente =  new Cliente();
            $oCliente->setNome("FSI Tecnologia");
            $oCliente->setAtivo(true);
            $oCliente->setEmail('contato@fsitecnologia.com.br');
            $oCliente->save();            
        }
    } 
}

class TabelaUsuarioClienteSeeder extends Seeder {
 
    public function run()
    {
        $usuarios = Usuario::get();
        Usuario::create(array(            
            'email' => 'cliente@cliente.com.br',
            'senha' => Hash::make('cliente'),
            'nome'  => 'Cliente',
            'tipo'  => 'cliente',
            'idcliente' => 1
        ));
    }
 
}
class TabelaUsuarioSeeder extends Seeder {
 
    public function run()
    {
        $usuarios = Usuario::get();
 
            Usuario::create(array(
                'email' => 'admin@edigital.com.br',
                'senha' => Hash::make('admin'),
                'nome'  => 'Administrador',
                'tipo'  => 'admin'
            ));
       
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
class TabelaCategoriaSeeder extends Seeder {
 
    public function run()
    {
         $categoria = CategoriasQuery::create()->find();
 
        if($categoria->count() == 0) {
            $oCat =  new Categorias();
            $oCat->setIdCliente(1);
            $oCat->setNomecategoria("Suporte");
            $oCat->save();
            $oCat =  new Categorias();
            $oCat->setIdCliente(1);
            $oCat->setNomecategoria("Boleto");
            $oCat->save();
            $oCat =  new Categorias();
            $oCat->setIdCliente(1);
            $oCat->setNomecategoria("INSS");
            $oCat->save();
            $oCat =  new Categorias();
            $oCat->setIdCliente(1);
            $oCat->setNomecategoria("IRPF");
            $oCat->save();
            $oCat =  new Categorias();
            $oCat->setIdCliente(1);
            $oCat->setNomecategoria("Tabelas");
            $oCat->save();
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
class TabelaMoedaSeeder extends Seeder {
 
    public function run()
    {
        $clientes = MoedaQuery::create()->find();
 
        if($clientes->count() == 0) {
            $oCliente =  new Moeda();
            $oCliente->setSimbolo("R$");
            $oCliente->setSigla("BRL");
            $oCliente->save();           
            
            $oCliente =  new Moeda();
            $oCliente->setSimbolo("$");
            $oCliente->setSigla("USD");
            
            $oCliente->save();            
        }
    } 
}
class TabelaProdutoSeeder extends Seeder {
 
    public function run()
    {
        $clientes = ProdutosQuery::create()->find();
 
        if($clientes->count() == 0) {
            $oCliente =  new Produtos();
            $oCliente->setNome("Visita técnica sem contrato");
            $oCliente->setValor(180);
            $oCliente->setIdMoeda(1);
            $oCliente->save();            
        }
    } 
}
class TabelaPgtoSeeder extends Seeder {
 
    public function run()
    {
        $clientes = ClientePgtosQuery::create()->find();
 
        if($clientes->count() == 0) {
            $oCliente =  new ClientePgtos();
            $oCliente->setValor(180);
            $oCliente->setIdcliente(1);
            $oCliente->setIdproduto(1);
            $oCliente->setIdMoeda(1);
            $oCliente->save();            
            
            $oCliente =  new ClientePgtos();
            $oCliente->setDescricao("Remocao de mouse");
            $oCliente->setValor(111);
            $oCliente->setIdcliente(1);
            $oCliente->setIdproduto(null);
            $oCliente->setIdMoeda(1);
            $oCliente->save();            
        }
    } 
}