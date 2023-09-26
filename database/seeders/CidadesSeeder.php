<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cidades')->insert([
        ['RA'=>'Água Quente (RA XXXV)'],
        ['RA'=>'Arapoanga (RA XXXIV)'],
        ['RA'=>'Águas Claras (RA XX)'],
        ['RA'=>'Arniqueira (RA XXXIII)'],
        ['RA'=>'Brazlândia (RA IV)'],
        ['RA'=>'Candangolândia (RA XIX)'],
        ['RA'=>'Ceilândia (RA IX)'],
        ['RA'=>'Cruzeiro (RA XI)'],
        ['RA'=>'Fercal (RA XXXI)'],
        ['RA'=>'Gama (RA II)'],
        ['RA'=>'Guará (RA X)'],
        ['RA'=>'Itapoã (RA XXVIII)'],
        ['RA'=>'Jardim Botânico (RA XXVII)'],
        ['RA'=>'Lago Norte (RA XVIII)'],
        ['RA'=>'Lago Sul (RA XVI)'],
        ['RA'=>'Núcleo Bandeirante (RA VIII)'],
        ['RA'=>'Paranoá (RA VII)'],
        ['RA'=>'Park Way (RA XXIV)'],
        ['RA'=>'Planaltina (RA VI)'],
        ['RA'=>'Plano Piloto (RA I)'],
        ['RA'=>'Recanto das Emas (XV)'],
        ['RA'=>'Riacho Fundo (RA XVII)'],
        ['RA'=>'Riacho Fundo II (RA XXI)'],
        ['RA'=>'Samambaia (RA XII)'],
        ['RA'=>'Santa Maria (RA XIII)'],
        ['RA'=>'São Sebastião (RA XIV)'],
        ['RA'=>'SCIA/Estrutural (RA XXV)'],
        ['RA'=>'SIA (RA XXIX)'],
        ['RA'=>'Sobradinho (RA V)'],
        ['RA'=>'Sobradinho II (RA XXVI)'],
        ['RA'=>'Sol Nascente e Pôr do Sol (RA XXXII)'],
        ['RA'=>'Sudoeste/Octogonal (RA XXII)'],
        ['RA'=>'Taguatinga (RA III)'],
        ['RA'=>'Varjão (RA XXIII)'],
        ['RA'=>'Vicente Pires (RA XXX)'],
        ]);

    }
}
