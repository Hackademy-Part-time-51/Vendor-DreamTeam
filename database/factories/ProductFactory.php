<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $json = Storage::disk('public')->get('comuni.json');
        $comuni = json_decode($json);
        $i = fake()->numberBetween(0, count($comuni) - 1);

        $products = [
            'Clothing' => [
                ['Maglione in lana', 'Maglione caldo in lana merino, taglia M'],
                ['Pantaloni cargo', 'Pantaloni cargo resistenti in cotone']
            ],
            'Shoes' => [
                ['Scarpe da ginnastica', 'Scarpe sportive con ammortizzazione'],
                ['Sandali estivi', 'Sandali comodi per la spiaggia']
            ],
            'Bags Accessories' => [
                ['Borsa da viaggio', 'Borsa capiente con ruote'],
                ['Cintura in pelle', 'Cintura elegante per abiti formali']
            ],
            'Electronics' => [
                ['Smartphone ricondizionato', 'Smartphone in ottime condizioni con garanzia'],
                ['Monitor 24"', 'Monitor Full HD per ufficio']
            ],
            'Books Magazines' => [
                ['Enciclopedia medica', 'Edizione aggiornata 2024'],
                ['Guida viaggi Europa', 'Mappa dettagliata con itinerari']
            ],
            'Home Kitchen' => [
                ['Set di coltelli', '6 pezzi in acciaio inox'],
                ['Macchina per caffè', 'Caffè espresso professionale']
            ],
            'Sports Free Time' => [
                ['Set pesi 20kg', 'Manubri regolabili in ghisa'],
                ['Zaino da trekking', 'Zaino ergonomico 40L']
            ],
            'Jewelry Watches' => [
                ['Orecchini d\'argento', 'Purezza 925 con pietre'],
                ['Bracciale rigido', 'Bracciale in acciaio chirurgico']
            ],
            'DoItYourself Gardening' => [
                ['Tosaerba elettrico', 'Potenza 1500W, leggero'],
                ['Sega a batteria', 'Kit completo con batteria']
            ],
            'Informatics' => [
                ['Webcam HD', 'Risoluzione 1080p con microfono'],
                ['HDD Esterno 1TB', 'USB 3.0, compatibile con PC e Mac']
            ],
            'Cars Motorcycles' => [
                ['Kit pulizia auto', 'Cera e prodotti professionali'],
                ['Navigatore satellitare', 'Aggiornamenti mappe gratuiti']
            ]
        ];

        $category = Category::inRandomOrder()->first() ?? Category::factory()->create();
        $categoryProducts = $products[$category->name] ?? [['Prodotto generico', 'Descrizione generica']];

        $randomProduct = $this->faker->randomElement($categoryProducts);

        return [
            'title' => $randomProduct[0],
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'description' => $randomProduct[1],
            'category_id' => $category->id,
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'is_accepted' => $this->faker->randomElement([1, 0, null]),
            'city' => $comuni[$i]->denominazione_ita,
            'latitudine' => $comuni[$i]->lat,
            'longitudine' => $comuni[$i]->lon
        ];
    }
}
