<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Sénart'],
            ['name' => 'Le Havre'],
            ['name' => 'Saint-Malo'],
            ['name' => 'Lyon'],
            ['name' => 'Mérignac'],
            ['name' => 'Montpellier'],
            ['name' => 'Nice'],
            ['name' => 'Aix-en-Provence'],
            ['name' => 'Sète'],
            ['name' => 'Saint-Ouen'],
            ['name' => 'Aubervilliers'],
            ['name' => 'Roubaix'],
            ['name' => 'Lille'],
            ['name' => 'Toulon'],
            ['name' => 'Châteauroux'],
            ['name' => 'Échirolles'],
            ['name' => 'Marseille'],
            ['name' => 'Strasbourg'],
            ['name' => 'Nancy'],
            ['name' => 'Saint-Étienne'],
            ['name' => 'Nantes'],
            ['name' => 'Clermont-Ferrand'],
            ['name' => 'Saint-Denis'],
            ['name' => 'Rennes'],
            ['name' => 'Grenoble'],
            ['name' => 'Angers'],
            ['name' => 'Bordeaux'],
            ['name' => 'Mulhouse'],
            ['name' => 'Caen'],
            ['name' => 'Brest'],
            ['name' => 'La Rochelle'],
            ['name' => 'Reims'],
            ['name' => 'Colombes'],
            ['name' => 'Tourcoing'],
            ['name' => 'Saint-Quentin'],
            ['name' => 'La Seyne-sur-Mer'],
            ['name' => 'Saint-Jean-de-Braye'],
            ['name' => 'Béziers'],
            ['name' => 'Chelles'],
            ['name' => 'Laval'],
            ['name' => 'Drancy'],
            ['name' => 'La Courneuve'],
            ['name' => 'L’Hay-les-Roses'],
            ['name' => 'Cesson-Sévigné'],
            ['name' => 'Mantes-la-Jolie'],
            ['name' => 'Bourg-en-Bresse'],
            ['name' => 'Cagnes-sur-Mer'],
            ['name' => 'Argenteuil'],
            ['name' => 'Antibes'],
            ['name' => 'Saint-Nazaire'],
            ['name' => 'Chalon-sur-Saône'],
            ['name' => 'Troyes'],
            ['name' => 'Pau'],
            ['name' => 'Le Blanc-Mesnil'],
            ['name' => 'Colmar'],
            ['name' => 'Évry-Courcouronnes'],
            ['name' => 'Issy-les-Moulineaux'],
            ['name' => 'Perpignan'],
            ['name' => 'Sarcelles'],
            ['name' => 'Chelles'],
            ['name' => 'Neuilly-sur-Seine'],
            ['name' => 'Charleville-Mézières'],
            ['name' => 'Vincennes'],
            ['name' => 'Vauvert'],
            ['name' => 'Bourg-en-Bresse'],
            ['name' => 'Cesson-Sévigné'],
            ['name' => 'Sélestat'],
            ['name' => 'Nanterre'],
            ['name' => 'Bobigny'],
            ['name' => 'La Ciotat'],
            ['name' => 'Montigny-le-Bretonneux'],
            ['name' => 'Val-de-Reuil'],
            ['name' => 'Rillieux-la-Pape'],
            ['name' => 'Sorgues'],
            ['name' => 'Rueil-Malmaison'],
            ['name' => 'Mérignac'],
            ['name' => 'Carcassonne'],
            ['name' => 'Les Sables-d\Olonne'], // Escaped single quote
            ['name' => 'Chalon-en-Champagne'],
            ['name' => 'Saint-Raphaël'],
            ['name' => 'Villers-sur-Mer'],
            ['name' => 'Saint-Étienne-du-Rouvray'],
            ['name' => 'Aubagne'],
            ['name' => 'Tassin-la-Demi-Lune'],
            ['name' => 'Plaisir'],
            ['name' => 'Saint-Sébastien-sur-Loire'],
            ['name' => 'Aubergenville'],
            ['name' => 'Albi'],
            ['name' => 'Calais'],
            ['name' => 'Montargis'],
            ['name' => 'Toulon'],
        ];

        DB::table('cities')->insert($cities);   
    }
}
