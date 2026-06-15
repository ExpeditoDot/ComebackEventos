<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Eventos;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{

    public function run(): void
    {
        Eventos::create([
            'Nome' => 'Festival de Rock de Verão',
            'Local' => 'Estádio Municipal',
            'Data' => '2026-07-15 18:00:00',
            'PrecoIngresso' => 150.00,
            'descricao' => 'O maior festival de rock do ano, contando com a presença de bandas nacionais e internacionais, praça de alimentação e acampamento.',
            'image' => null,
        ]);

        Eventos::create([
            'Nome' => 'Workshop de Programação Web com Laravel',
            'Local' => 'Centro Tecnológico Alfa',
            'Data' => '2026-08-20 09:00:00',
            'PrecoIngresso' => 49.90,
            'descricao' => 'Aprenda a construir aplicações modernas do zero usando o ecossistema Laravel. Inclui certificado de participação e material de apoio.',
            'image' => null,
        ]);

        Eventos::create([
            'Nome' => 'Peça de Teatro: A Comédia da Vida',
            'Local' => 'Teatro Central',
            'Data' => '2026-06-30 20:30:00',
            'PrecoIngresso' => 35.00,
            'descricao' => 'Uma comédia hilária para toda a família que aborda as situações mais absurdas e engraçadas do nosso cotidiano.',
            'image' => null,
        ]);

        Eventos::create([
            'Nome' => 'Maratona da Cidade 2026',
            'Local' => 'Avenida Beira Mar (Largada)',
            'Data' => '2026-09-05 06:00:00',
            'PrecoIngresso' => 0.00, // Gratuito
            'descricao' => 'Venha correr pela saúde! Circuito de 5km, 10km e 21km. Inscrições gratuitas, mas com entrega opcional de 1kg de alimento.',
            'image' => null, // Exemplo usando o ->nullable() que você definiu
        ]);

        Eventos::create([
            'Nome' => 'Feira Gastronômica Internacional',
            'Local' => 'Parque das Nações',
            'Data' => '2026-10-12 12:00:00',
            'PrecoIngresso' => 15.50,
            'descricao' => 'Experimente pratos típicos de mais de 20 países em um único lugar. O evento conta com chefs renomados e shows ao vivo.',
            'image' => null,
        ]);
    }
}
