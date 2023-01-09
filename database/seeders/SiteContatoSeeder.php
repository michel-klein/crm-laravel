<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Sistema SG';
        // $contato->telefone = '(12) 34567-9823';
        // $contato->email = 'contato@sistemasg.com.br';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Bem-vindo ao sistema SG';
        // $contato->save();

        SiteContato::factory()->count(100)->create();
    }
}
