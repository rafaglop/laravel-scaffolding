<?php

namespace App\Http\Controllers;

use Storage;
use Str;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function getData()
     {
 
         $json = '[
            {
              "full_name": "Ajana Akdi Nisserim",
              "position": "Administración Comercial",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "924 37 86 31",
              "mobile": 628554289,
              "ext": 3016,
              "email": "AdmonComercial@apis.es"
            },
            {
              "full_name": "Alcauce Díaz, José Luis",
              "position": "Key Account Manager",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "924 37 86 31",
              "mobile": 608128724,
              "ext": 3013,
              "email": "jose-luis.alcauce@apis.es"
            },
            {
              "full_name": "Almendro Merino, Francisco José",
              "position": "Reponsable de Almacén PT",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": 619285298,
              "ext": 3047,
              "email": "francisco.almendro@apis.es"
            },
            {
              "full_name": "Alonso Alonso, Ana Belén",
              "position": "Administración Montijo",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": 691227683,
              "ext": 3053,
              "email": "almacenesmontijo@apis.es"
            },
            {
              "full_name": "Bernabeu Cortijo, María del Pilar",
              "position": "Administración ",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "924 37 86 31",
              "mobile": 605418447,
              "ext": 3022,
              "email": "pilar.bernabeu@apis.es"
            },
            {
              "full_name": "Blanco Cortés, Juan Francisco",
              "position": "Consejero Delegado",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "924 37 86 31",
              "mobile": null,
              "ext": null,
              "email": "jblanco@acopaex.es"
            },
            {
              "full_name": "Bo Rodríguez, José Antonio",
              "position": "Key Account Manager",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "924 37 86 31",
              "mobile": 611487708,
              "ext": 3031,
              "email": "jose-antonio.bo@apis.es"
            },
            {
              "full_name": "Calamonte Gragera, Silvia",
              "position": "Técnico Planta Piloto",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "924 37 86 31",
              "mobile": 661404335,
              "ext": 3027,
              "email": "silvia.calamonte@apis.es"
            },
            {
              "full_name": "Calero Lazado, Patricia",
              "position": "Export Department\nDepartamento de Exportación",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "924 37 86 31",
              "mobile": 605418188,
              "ext": 3046,
              "email": "patricia.calero@apis.es"
            },
            {
              "full_name": "Carmona Cardenal, Pedro",
              "position": "Coor. Mto./Almacén Repuestos",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": 616936149,
              "ext": 3048,
              "email": "pedro.carmona@apis.es"
            },
            {
              "full_name": "Coria Paardo, Antonio Luis",
              "position": "Director de Planta",
              "office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA",
              "phone": "924 37 86 31",
              "mobile": 699419911,
              "ext": 3034,
              "email": "antonio.coria@apis.es"
            },
            {
              "full_name": "Delgado Sánchez, Antonio",
              "position": "Encargado",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": 620294847,
              "ext": 3044,
              "email": "antonio.delgado@apis.es"
            },
            {
              "full_name": "Díaz Dávida, María Teresa",
              "position": "Técnico de Calidad I+D",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": null,
              "ext": null,
              "email": "teresa.diaz@apis.es"
            },
            {
              "full_name": "Díaz Díaz, María",
              "position": "International Business Manager",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "924 37 86 31",
              "mobile": 692968381,
              "ext": 3002,
              "email": "maria.diaz@apis.es"
            },
            {
              "full_name": "Doblado Pacheco, María",
              "position": "Técnico   ",
              "office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA",
              "phone": "924 37 86 31",
              "mobile": null,
              "ext": null,
              "email": "maria.doblado@apis.es"
            },
            {
              "full_name": "Fernández Chamizo, Crisanta",
              "position": "Técnico de Sistemas",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "924 37 86 31",
              "mobile": 691274412,
              "ext": 3017,
              "email": "crisanta@apis.es"
            },
            {
              "full_name": "Fernández López, Eduardo José",
              "position": "Director General",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "924 37 86 31",
              "mobile": 661350100,
              "ext": 3043,
              "email": "eduardo.fernandez@apis.es"
            },
            {
              "full_name": "Gajardo Barrena, Jacinto",
              "position": "Reponsable de Almacén PT",
              "office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA",
              "phone": "924 37 86 31",
              "mobile": 609809576,
              "ext": 3033,
              "email": "jacinto.gajardo@apis.es"
            },
            {
              "full_name": "Gallego Torres, Natividad",
              "position": "Auxiliar de Laboratorio",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": null,
              "ext": null,
              "email": "natividad.gallego@apis.es"
            },
            {
              "full_name": "García Díaz, Francisco",
              "position": "Encargado",
              "office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA",
              "phone": "924 37 86 31",
              "mobile": 659846820,
              "ext": 3001,
              "email": "francisco.garcia@apis.es"
            },
            {
              "full_name": "GarcíaGarcía, Juana María",
              "position": "Auxiliar de Laboratorio",
              "office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA",
              "phone": "925 37 86 31",
              "mobile": 605463081,
              "ext": 3006,
              "email": "juani.garcia@apis.es"
            },
            {
              "full_name": "García Temprano, Guillermo",
              "position": "Director Financiero",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "926 37 86 31",
              "mobile": 659846860,
              "ext": 3004,
              "email": "guillermo.garcia@apis.es"
            },
            {
              "full_name": "María del Carmen, Garrido Macías",
              "position": "Administracion",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "927 37 86 31",
              "mobile": 680409511,
              "ext": 3023,
              "email": "maria-carmen.garrido@apis.es"
            },
            {
              "full_name": "Gayo Bayón, José Manuel",
              "position": "Key Account Manager",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "928 37 86 31",
              "mobile": 648402830,
              "ext": 3041,
              "email": "jose-manuel.gayo@apis.es"
            },
            {
              "full_name": "González Gragera, Demetrio",
              "position": "Fabrica Montijo",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "929 37 86 31",
              "mobile": 606316465,
              "ext": 3011,
              "email": "porteriamontijo@apis.es"
            },
            {
              "full_name": "González Gutiérrez,María de la Luz",
              "position": "Administración Comercial",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "930 37 86 31",
              "mobile": 675634208,
              "ext": 3037,
              "email": "maria-luz.gonzalez@apis.es"
            },
            {
              "full_name": "González Rodríges, Miguel María",
              "position": "Director de Planta",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": 660997782,
              "ext": 3049,
              "email": "miguel.gonzalez@apis.es"
            },
            {
              "full_name": "Guerrero Bote, Juan José",
              "position": "Marketing & Communication Director",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "929 37 86 31",
              "mobile": 628324624,
              "ext": 3028,
              "email": "juan-jose.guerrero@apis.es"
            },
            {
              "full_name": "Jiménez Van Kuijk, Patricia Carolina",
              "position": "Key Account Manager",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "929 37 86 31",
              "mobile": 699442460,
              "ext": 3040,
              "email": "patricia.vankuijk@apis.es"
            },
            {
              "full_name": "López Talán, María Isabel",
              "position": "Responsable de RRHH",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "924 45 50 00",
              "mobile": 675634207,
              "ext": 3038,
              "email": "maria-isabel.lopez@apis.es"
            },
            {
              "full_name": "Martínez Moreno, Almudena",
              "position": "Técnico de Calidad I+D",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "925 45 50 00",
              "mobile": 625031374,
              "ext": 3042,
              "email": "almudena.martinez@apis.es"
            },
            {
              "full_name": "Mata Ballesteros, María Belén",
              "position": "Customer Service Coordinator\n",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "924 37 86 31",
              "mobile": 665655387,
              "ext": 3039,
              "email": "belen.mata@apis.es"
            },
            {
              "full_name": "Moreno González, Herminia",
              "position": "CQuality and R&D General Coordinator\nCoord. General de Calidad · I+D",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "925 37 86 31",
              "mobile": 659846907,
              "ext": 3026,
              "email": "herminia.moreno@apis.es"
            },
            {
              "full_name": "Muriel López, Francisco",
              "position": "Almacen de Materias Primas",
              "office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA",
              "phone": "926 37 86 31",
              "mobile": 699092740,
              "ext": 3010,
              "email": "francisco.muriel@apis.es"
            },
            {
              "full_name": "ParedesRodríguez, Anselmo",
              "position": "Encargado",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "925 45 50 00",
              "mobile": 629438843,
              "ext": 3045,
              "email": "anselmo.paredes@apis.es"
            },
            {
              "full_name": "Peguero Corchero, Vicente J.",
              "position": "Encargado",
              "office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA",
              "phone": "930 37 86 31",
              "mobile": 659846901,
              "ext": 3005,
              "email": "vicente.peguero@apis.es"
            },
            {
              "full_name": "Pérez Moreno, Francisco Javier",
              "position": "Administración Montijo",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "925 45 50 00",
              "mobile": 691274867,
              "ext": 3035,
              "email": "javier.moreno@apis.es"
            },
            {
              "full_name": "Prior Rodríguez, Sonia",
              "position": "Administración Logística",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "930 37 86 31",
              "mobile": 625083970,
              "ext": 3020,
              "email": "sonia.prior@apis.es"
            },
            {
              "full_name": "Porrino Ordóñez, Natalia",
              "position": "Marketing & Communication",
              "office": "CARNES Y VEGETALES S.L. MERIDA COMERCIAL",
              "phone": "930 37 86 31",
              "mobile": 605460015,
              "ext": 3009,
              "email": "natalia.porrino@apis.es"
            },
            {
              "full_name": "Puerto Cerrato, Eusebio",
              "position": "Técnico de Planificación",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "930 37 86 31",
              "mobile": 628901515,
              "ext": 3012,
              "email": "Eusebio.Puerto@apis.es"
            },
            {
              "full_name": "Ramos Picón, Raquel",
              "position": "Técnico de Recursos Humanos",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "925 45 50 00",
              "mobile": 696041399,
              "ext": 3019,
              "email": "raquel.ramos@apis.es"
            },
            {
              "full_name": "Rico Tena, Ana María",
              "position": "Administración Mérida",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "930 37 86 31",
              "mobile": 665655170,
              "ext": 3021,
              "email": "ana-maria.rico@apis.es"
            },
            {
              "full_name": "Riola Macías, Juan",
              "position": "Responsable de Proyectos",
              "office": "CARNES Y VEGETALES S.L MONTIJO",
              "phone": "925 45 50 00",
              "mobile": 657164007,
              "ext": 3025,
              "email": "juan.riola@apis.es"
            },
            {
              "full_name": "Serrano Mordillo, Elena",
              "position": "Administración ",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "930 37 86 31",
              "mobile": 618458837,
              "ext": 3018,
              "email": "Elena.serrano@apis.es"
            },
            {
              "full_name": "Simón Obregón, María Eulalia",
              "position": "Administración Mérida",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "930 37 86 31",
              "mobile": 659362215,
              "ext": 3032,
              "email": "maria-eulalia.simon@apis.es"
            },
            {
              "full_name": "Valiente Jiménez, Ana Isabel",
              "position": "Control Industrial y Comercial",
              "office": "CARNES Y VEGETALES S.L. MERIDA  CENTRAL",
              "phone": "930 37 86 31",
              "mobile": 676850164,
              "ext": 3015,
              "email": "ana-isabel.valiente@apis.es"
            }
           ]';
 
         return json_decode($json);
     }
     
    public function index()
    {
        $data = $this->getData();

        /*
            +"fullname": "Coria Pardo, Antonio Luis"
            +"fullname2": "CORIA PARDO,  ANTONIO LUIS"
            +"surname": "CORIA PARDO"
            +"name": " ANTONIO LUIS"
            +"position": "Director de Planta"
            +"office": "CARNES Y VEGETALES S.L MÉRIDA FÁBRICA"
            +"phone": "924 37 86 31"
            +"mobile": 699419911
            +"ext": 3034
            +"email": "antonio.coria@apis.es"
        */

        foreach($data as $item){

            $tmp = explode(",", $item->full_name);
            $item->name = $tmp[0];
            $item->surname = isset($tmp[1]) ? $tmp[1] : '';

            if(strpos($item->office, 'MONTIJO') == false){
                $item->address1 = 'Pol. Ind. El Prado, C/Sevilla, s/n.';
                $item->address2 = 'Parcelas  1 y 2 · 06800 Mérida (Badajoz) · España';
            }else{

                $item->address1 = 'Carretera de la Estación, sn, 06480';
                $item->address2 = 'Montijo, Badajoz · España';
            }

            $render = view('mail.signature', compact('item'))->render();
            $render=str_replace("\r\n","",$render);
            $render=str_replace("\r\t","",$render);

            $filename = Str::slug($item->full_name).'.html';
            Storage::disk('signatures')->put($filename, $render);

        }

        return true;
    }

}
