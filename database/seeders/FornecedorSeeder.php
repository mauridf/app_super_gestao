<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor Teste';
        $fornecedor->site = 'www.fornecedorteste.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'fornecedor_teste@fornecedor.com';
        $fornecedor->save();

        //utilizando o create (lembrar do fillable)
        Fornecedor::create([
            'nome' => 'Fornecedor Teste 2',
            'site' => 'www.fornecedorteste2.org.br',
            'uf' => 'RS',
            'email' => 'fornecedor_teste_2@gmail.com'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor Teste 3',
            'site' => 'www.fornecedorteste3.org.br',
            'uf' => 'SP',
            'email' => 'fornecedor_teste_3@gmail.com'
        ]);
    }
}
