<?php

use Illuminate\Database\Seeder;
use App\Models\Apartment;
use App\User;
use Faker\Generator as Faker;
class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $addresses = [
            [
                'address'=>'via verdi 16 milano',
                'lat' =>'45.5258659',
                'long'=>'9.3376131',
                'description'=>"l posto perfetto per chi cerca pace e tranquillità e per gli amanti
                                della natura e degli spazi bellissimi. Questo esclusivo appartamento si trova
                                all'ultimo piano di un casale indipendente completamente ristrutturato.
                                Escursioni o sci … shopping o visite turistiche a Lucerna o
                                Interlaken … o semplicemente godersi il lago nei suoi colori scintillanti. La casa è circondata da innumerevoli opportunità per scoprire la Svizzera centrale. Il luogo per
                                una pausa, una vacanza o la luna di miele perfetta.",
                'title'=>"Stanza privata in casa - Host: Wendy"

            ],
            [
                'address'=>'via piave 12 milano',
                'lat' =>'45.4442769',
                'long'=>'9.0941081',
                'description'=>"La villa si trova piedi dans l'eau sul lago nel centro storico di Brienno, un piccolo villaggio
                                a 17 km a nord di Como e 7 km dall'autostrada
                                La proprietà è un'antica filanda di seta risalente al XVII secolo splendidamente ristrutturata.
                                I rivestimenti in pietra, gli alti soffitti a volta e l'antica ciminiera si alternano agli eleganti
                                interni di design chic industriale e alle opere d'arte contemporanea, in un perfetto e sofisticato mix.
                                Le grandi finestre offrono una vista strepitosa sul lago.",
                'title'=>"VILLA TORNO"

            ],
            [
                'address'=>'via montepiana 24 milano',
                'lat' =>'45.4300234',
                'long'=>'9.246355',
                "description"=>"Elementi è una proprietà contemporanea davvero unica e magnifica, che vanta una posizione drammatica nel
                                triangolo dei tre rami del Lago di Como, dove si trova al centro tra Bellagio, Menaggio e Varenna.
                                Nel 1922 la famiglia Cranchi avvia il suo primo cantiere nautico a Griante dove la famiglia costruisce
                                barche da quasi un secolo. Nel 2014 il cantiere ha subito una ristrutturazione completa di 3 anni
                                per diventare una villa di lusso di fascia alta che è stata ribattezzata Elementi. Le caratteristiche
                                tipiche del cantiere industriale sono state preservate e, unite all'incredibile design architettonico e
                                agli splendidi interni, Elementi è davvero unico nel suo genere sul Lago di Como.
                                L'indubbio carattere e il lusso di Elementi emanano sia dentro che fuori, e una volta arrivato è davvero
                                difficile andarsene. Con la sua posizione invidiabile proprio sulla riva del lago con decking ben rifinito
                                e darsena privata, gli ospiti apprezzeranno il lusso di esplorare e muoversi in barca. Una volta raggiunto
                                Elementi la propria auto può essere chiusa in sicurezza nel garage e gli ospiti possono staccare la spina,
                                rilassarsi e assaporare questa magica destinazione.
                                Con la sua fenomenale quantità di spazio, anche i gruppi più grandi avranno ancora il lusso di godere di
                                numerose aree soggiorno e relax, sia all'interno della villa stessa che all'esterno su uno dei tanti ponti,
                                a bordo piscina o sotto un gazebo con vista eccezionale sul lago e montagne. ",
                'title'=>"Villa sull'acqua e spiaggia privata"
            ],
            [
                'address'=>'via venezia 84 milano',
                'lat' =>'45.3882073',
                'long'=>'9.1589497',
                "description"=>"Incantevoli viste sul Lago di Como attendono in questa moderna villa
                                in collina nello storico comune di Sala Comacina. Ammira l'unica isola del lago e la
                                catena montuosa del Costone dalla piscina e dalla vasca idromassaggio del balcone.
                                Per dare un'occhiata più da vicino, dirigiti a 9 minuti giù per la collina fino al
                                Lido di Lenno, fai il check-in al beach club per cena e approfitta della lista dei vini
                                di classe mondiale.",
                'title'=>"Antica casa sul lungolago di Giuditta Pasta"
            ],
            [
                'address'=>'via Roma 12, Via Dieci Giugno, 29121 Piacenza PC, Italia',
                'lat' =>'45.0534182',
                'long'=>'9.6959195',
                "description"=>"Cottage con fantastica posizione in riva al mare.
                                Paesaggio meraviglioso, funghi e campi di bacche fuori dalla porta!
                                Posizione tranquilla e indisturbata con sole tutto il giorno. Canoa,
                                barca e motore sono disponibili per il noleggio.",
                "title" =>"Vissevillan: una casa accogliente tra lago e foresta"
            ],
            [
                'address'=>'Via Carlo Pisacane, 12, 16129 Genova GE, Italia',
                'lat' =>'44.4009751',
                'long'=>'8.9493835',
                "description"=>"Una bellissima baita proprio accanto all'acqua. A soli 35-40 minuti di auto da Oslo,
                                poi si ha un Eldorado all'aperto, con la possibilità di pagaiare, uscire in barca, nuotare,
                                fare passeggiate nel campo, andare a sciare e pattinare in inverno - o semplicemente sedersi
                                all'interno a divertirsi in salotto.",
                "title" => "Villa Damia, indipendente con accesso lago diretto"
            ],
            [
                'address'=>'Maddaloni, Caserta, Italia',
                'lat' =>'441.03578',
                'long'=>'14.3823',
                "description"=>"Ascolta la natura dell'alto lago di Como da questo attico all'ultimo piano in un'antica casa di pietra.
                                Dotato di ogni comfort, l'attico composto da tre camere da letto, due bagni con grande vasca e grandioso
                                soggiorno con grande camino, mantiene l'atmosfera ottocentesca della casa, un sapore di antica famiglia
                                piena di storia che si estende anche al parco che la circonda.Il terrazzo a uso esclusivo e il parco con
                                alberi secolari di un ettaro donano una splendida cornice al soggiorno.",
                "title" => "Rilassante, luminosa residenza merlata nel fascino del medioevo veneto"
            ],
            [
                'address'=>'Via Bagaro, 44121 Ferrara FE, Italia',
                'lat' =>'44.845835',
                'long'=>'11.6145778',
                "description"=>"Accoccolati sul divano morbido e neutro con una rilassante tazza di tè in una dimora zen post-e-beam presente
                                su Residence Magazine 2019. Il look minimalista è combinato con piastrelle lucide blu notte nel bagno della doccia deluxe e
                                altoparlanti in ogni stanza.",
                "title" =>"VILLA LA ROSSA"
            ],
            [
                'address'=>'Via Adua, Brindisi BR, Italia',
                'lat' =>'40.545865',
                'long'=>'17.9480126',
                "description"=>"Proprio in riva al lago si trova questo grazioso cottage rosso moderno.
                                Il piano terra aperto ha un camino, una cucina completamente attrezzata e un angolo accogliente dove
                                è possibile sedersi e ammirare la vista sul lago attraverso le finestre panoramiche. Due camere da letto
                                separate con 5 posti letto. Terrazza molto spaziosa con barbecue, grande sala da pranzo e possibilità di
                                godere del camino all'aperto sotto il cielo aperto!
                                NOTA - Le routine di pulizia e contatto sono totalmente in linea con le raccomandazioni sulla salute -
                                tutto per la tua sicurezza!",
                "title" =>"Elegante appartamento in una pregiata cornice lacustre"
            ],
            [
                'address'=>'Via Giacomo Puccini, 26013 Crema CR, Italia',
                'lat' =>'45.3773185',
                'long'=>'9.6892651',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],

            [
                'address'=>'Via Prati, 04018 Roccagorga LT, Italia',
                'lat' =>'41.5164652',
                'long'=>'13.1267695',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via La Cona, 07100 Sassari SS, Italia',
                'lat' =>'40.7262499',
                'long'=>'8.5613702',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Turritana, 07100 Sassari SS, Italia',
                'lat' =>'40.7264825',
                'long'=>'8.5580508',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Cagliari, 08033 Isili CA, Italia',
                'lat' =>'39.7374066',
                'long'=>'9.1149503',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Bellini, 10024 Moncalieri Torino, Italia',
                'lat' =>'45.0137201',
                'long'=>'7.6674693',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Zara, 84123 Salerno SA, Italia',
                'lat' =>'40.677788',
                'long'=>'14.7703607',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Michele Vernieri, 84125 Salerno SA, ',
                'lat' =>'40.6816788',
                'long'=>'14.7673861',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Pinto, 15057 Tortona AL, Italia',
                'lat' =>'44.8979367',
                'long'=>'8.8707767',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Pinto, 15057 Tortona AL, Italia',
                'lat' =>'44.8979367',
                'long'=>'8.8707767',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "MIRALAGO B&B A BELLAGIO camera doppia"
            ],
            [
                'address'=>'Via Larga, 13, 20122 Milano MI, Italia',
                'lat' =>'45.4615924',
                'long'=>'9.1926545',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "B&B Camera a Milano"
            ],
            [
                'address'=>'Via Giuseppe Mazzini, 20, 20123 Milano MI, Italia',
                'lat' =>'45.4617306',
                'long'=>'9.1881138',
                "description"=>"Concediti un po' di lusso affacciato sul pittoresco borgo di Sala Comacina,
                                situato sulla premier sponda centro-occidentale del Lago di Como.
                                Rilassatevi sul balcone a colazione o con un aperitivo a fine giornata.",
                "title" => "Hotel Mazzini"
            ],

        ];

        $userIds = User::pluck('id')->toArray();
        array_splice($userIds, 0, 1);
        for ($i=0; $i < count($addresses) ; $i++) {
            $newApartment = new Apartment;
            $newApartment->user_id = $faker->randomElement($userIds);
            $newApartment->n_rooms=$faker->numberBetween(1, 5);
            $newApartment->description= $addresses[$i]['description'];
            $newApartment->sqr_meters= $faker->numberBetween(10, 500);
            $newApartment->n_beds= $faker->numberBetween(1, 10);
            $newApartment->n_bathrooms= $faker->numberBetween(1, 5);
            $newApartment->title=$addresses[$i]['title'];
            $newApartment->is_visible= 1;
            $newApartment->address = $addresses[$i]['address'];
            $newApartment->lat = $addresses[$i]['lat'];
            $newApartment->long = $addresses[$i]['long'];
            $newApartment->price= $faker->numberBetween(2,1000);
            $newApartment->save();

        }
    }
}

