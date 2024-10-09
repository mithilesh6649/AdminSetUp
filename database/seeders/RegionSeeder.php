<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reference: https://en.wikipedia.org/wiki/Governorates_of_Jordan
        Region::truncate();

        //regions data
        $countryRegion = array(

            "Andorra" => array(
                "region1" => array(
                    "name" => "Andorra la Vella",
                    "latitude" => 42.5063,
                    "longitude" => 1.5218
                ),
                "region2" => array(
                    "name" => "Canillo",
                    "latitude" => 42.5716,
                    "longitude" => 1.6677
                ),
                "region3" => array(
                    "name" => "Encamp",
                    "latitude" => 42.5344,
                    "longitude" => 1.5832
                )
            ),
            "United Arab Emirates" => array(
                "region1" => array(
                    "name" => "Abu Dhabi",
                    "latitude" => 24.4539,
                    "longitude" => 54.3773
                ),
                "region2" => array(
                    "name" => "Dubai",
                    "latitude" => 25.2048,
                    "longitude" => 55.2708
                ),
                "region3" => array(
                    "name" => "Sharjah",
                    "latitude" => 25.3463,
                    "longitude" => 55.4209
                )
            ),
            "Afghanistan" => array(
                "region1" => array(
                    "name" => "Kabul",
                    "latitude" => 34.5553,
                    "longitude" => 69.2075
                ),
                "region2" => array(
                    "name" => "Kandahar",
                    "latitude" => 31.6100,
                    "longitude" => 65.6949
                ),
                "region3" => array(
                    "name" => "Herat",
                    "latitude" => 34.3529,
                    "longitude" => 62.2042
                )
            ),
            "Antigua and Barbuda" => array(
                "region1" => array(
                    "name" => "Saint John's",
                    "latitude" => 17.1274,
                    "longitude" => -61.8468
                ),
                "region2" => array(
                    "name" => "Saint Paul",
                    "latitude" => 17.1319,
                    "longitude" => -61.7922
                ),
                "region3" => array(
                    "name" => "Saint Mary",
                    "latitude" => 17.1274,
                    "longitude" => -61.8734
                )
            ),
            "Anguilla" => array(
                "region1" => array(
                    "name" => "The Valley",
                    "latitude" => 18.2170,
                    "longitude" => -63.0578
                ),
                "region2" => array(
                    "name" => "Blowing Point Village",
                    "latitude" => 18.1715,
                    "longitude" => -63.0652
                ),
                "region3" => array(
                    "name" => "Sandy Ground Village",
                    "latitude" => 18.2009,
                    "longitude" => -63.0736
                )
            ),

            "Albania" => array(
                "region1" => array(
                    "name" => "Tirana",
                    "latitude" => 41.3275,
                    "longitude" => 19.8187
                ),
                "region2" => array(
                    "name" => "Durrës",
                    "latitude" => 41.3231,
                    "longitude" => 19.4412
                ),
                "region3" => array(
                    "name" => "Vlorë",
                    "latitude" => 40.4681,
                    "longitude" => 19.4895
                )
            ),
            "Armenia" => array(
                "region1" => array(
                    "name" => "Yerevan",
                    "latitude" => 40.1776,
                    "longitude" => 44.5126
                ),
                "region2" => array(
                    "name" => "Gyumri",
                    "latitude" => 40.7884,
                    "longitude" => 43.8468
                ),
                "region3" => array(
                    "name" => "Vanadzor",
                    "latitude" => 40.8097,
                    "longitude" => 44.4977
                )
            ),
            "Netherlands Antilles" => array(
                "region1" => array(
                    "name" => "Curaçao",
                    "latitude" => 12.1696,
                    "longitude" => -68.9900
                ),
                "region2" => array(
                    "name" => "Bonaire",
                    "latitude" => 12.1784,
                    "longitude" => -68.2385
                ),
                "region3" => array(
                    "name" => "Sint Maarten",
                    "latitude" => 18.0425,
                    "longitude" => -63.0548
                )
            ),
            "Angola" => array(
                "region1" => array(
                    "name" => "Luanda",
                    "latitude" => -8.8399,
                    "longitude" => 13.2894
                ),
                "region2" => array(
                    "name" => "Huambo",
                    "latitude" => -12.7761,
                    "longitude" => 15.7392
                ),
                "region3" => array(
                    "name" => "Lobito",
                    "latitude" => -12.3644,
                    "longitude" => 13.5369
                )
            ),
            "Antarctica" => array(
                "region1" => array(
                    "name" => "McMurdo Station",
                    "latitude" => -77.8469,
                    "longitude" => 166.6683
                ),
                "region2" => array(
                    "name" => "Amundsen-Scott South Pole Station",
                    "latitude" => -90.0000,
                    "longitude" => 0.0000
                ),
                "region3" => array(
                    "name" => "Palmer Station",
                    "latitude" => -64.7746,
                    "longitude" => -64.0567
                )
            ),

            "Argentina" => array(
                "region1" => array(
                    "name" => "Buenos Aires",
                    "latitude" => -34.6037,
                    "longitude" => -58.3816
                ),
                "region2" => array(
                    "name" => "Córdoba",
                    "latitude" => -31.4201,
                    "longitude" => -64.1888
                ),
                "region3" => array(
                    "name" => "Mendoza",
                    "latitude" => -32.8895,
                    "longitude" => -68.8458
                )
            ),
            "American Samoa" => array(
                "region1" => array(
                    "name" => "Pago Pago",
                    "latitude" => -14.2750,
                    "longitude" => -170.7020
                ),
                "region2" => array(
                    "name" => "Tafuna",
                    "latitude" => -14.3368,
                    "longitude" => -170.7735
                ),
                "region3" => array(
                    "name" => "Leone",
                    "latitude" => -14.3583,
                    "longitude" => -170.7614
                )
            ),
            "Austria" => array(
                "region1" => array(
                    "name" => "Vienna",
                    "latitude" => 48.2082,
                    "longitude" => 16.3738
                ),
                "region2" => array(
                    "name" => "Salzburg",
                    "latitude" => 47.8095,
                    "longitude" => 13.0550
                ),
                "region3" => array(
                    "name" => "Graz",
                    "latitude" => 47.0707,
                    "longitude" => 15.4395
                )
            ),
            "Australia" => array(
                "region1" => array(
                    "name" => "Sydney",
                    "latitude" => -33.8651,
                    "longitude" => 151.2099
                ),
                "region2" => array(
                    "name" => "Melbourne",
                    "latitude" => -37.8136,
                    "longitude" => 144.9631
                ),
                "region3" => array(
                    "name" => "Brisbane",
                    "latitude" => -27.4698,
                    "longitude" => 153.0251
                )
            ),
            "Aruba" => array(
                "region1" => array(
                    "name" => "Oranjestad",
                    "latitude" => 12.5092,
                    "longitude" => -70.0086
                ),
                "region2" => array(
                    "name" => "Noord",
                    "latitude" => 12.5861,
                    "longitude" => -70.0451
                ),
                "region3" => array(
                    "name" => "Santa Cruz",
                    "latitude" => 12.5186,
                    "longitude" => -70.0317
                )
            ),
            "Azerbaijan" => array(
                "region1" => array(
                    "name" => "Baku",
                    "latitude" => 40.4093,
                    "longitude" => 49.8671
                ),
                "region2" => array(
                    "name" => "Ganja",
                    "latitude" => 40.6828,
                    "longitude" => 46.3606
                ),
                "region3" => array(
                    "name" => "Sumqayit",
                    "latitude" => 40.5858,
                    "longitude" => 49.6316
                )
            ),
            "Bosnia and Herzegovina" => array(
                "region1" => array(
                    "name" => "Sarajevo",
                    "latitude" => 43.8563,
                    "longitude" => 18.4131
                ),
                "region2" => array(
                    "name" => "Banja Luka",
                    "latitude" => 44.7758,
                    "longitude" => 17.1854
                ),
                "region3" => array(
                    "name" => "Tuzla",
                    "latitude" => 44.5380,
                    "longitude" => 18.6731
                )
            ),
            "Barbados" => array(
                "region1" => array(
                    "name" => "Bridgetown",
                    "latitude" => 13.0969,
                    "longitude" => -59.6145
                ),
                "region2" => array(
                    "name" => "Holetown",
                    "latitude" => 13.1909,
                    "longitude" => -59.6371
                ),
                "region3" => array(
                    "name" => "Speightstown",
                    "latitude" => 13.2566,
                    "longitude" => -59.6456
                )
            ),
            "Bangladesh" => array(
                "region1" => array(
                    "name" => "Dhaka",
                    "latitude" => 23.8103,
                    "longitude" => 90.4125
                ),
                "region2" => array(
                    "name" => "Chittagong",
                    "latitude" => 22.3569,
                    "longitude" => 91.7832
                ),
                "region3" => array(
                    "name" => "Khulna",
                    "latitude" => 22.8456,
                    "longitude" => 89.5403
                )
            ),

            "Belgium" => array(
                "region1" => array(
                    "name" => "Brussels",
                    "latitude" => 50.8503,
                    "longitude" => 4.3517
                ),
                "region2" => array(
                    "name" => "Antwerp",
                    "latitude" => 51.2199,
                    "longitude" => 4.4035
                ),
                "region3" => array(
                    "name" => "Ghent",
                    "latitude" => 51.0543,
                    "longitude" => 3.7174
                )
            ),
            "Burkina Faso" => array(
                "region1" => array(
                    "name" => "Ouagadougou",
                    "latitude" => 12.3714,
                    "longitude" => -1.5197
                ),
                "region2" => array(
                    "name" => "Bobo-Dioulasso",
                    "latitude" => 11.1771,
                    "longitude" => -4.2979
                ),
                "region3" => array(
                    "name" => "Koudougou",
                    "latitude" => 12.2494,
                    "longitude" => -2.3622
                )
            ),
            "Bahrain" => array(
                "region1" => array(
                    "name" => "Manama",
                    "latitude" => 26.2285,
                    "longitude" => 50.5860
                ),
                "region2" => array(
                    "name" => "Muharraq",
                    "latitude" => 26.2577,
                    "longitude" => 50.6116
                ),
                "region3" => array(
                    "name" => "Riffa",
                    "latitude" => 26.1309,
                    "longitude" => 50.5547
                )
            ),
            "Burundi" => array(
                "region1" => array(
                    "name" => "Bujumbura",
                    "latitude" => -3.3753,
                    "longitude" => 29.3599
                ),
                "region2" => array(
                    "name" => "Gitega",
                    "latitude" => -3.4359,
                    "longitude" => 29.9306
                ),
                "region3" => array(
                    "name" => "Ngozi",
                    "latitude" => -2.9150,
                    "longitude" => 29.8259
                )
            ),
            "Benin" => array(
                "region1" => array(
                    "name" => "Porto-Novo",
                    "latitude" => 6.4960,
                    "longitude" => 2.6287
                ),
                "region2" => array(
                    "name" => "Cotonou",
                    "latitude" => 6.3528,
                    "longitude" => 2.4347
                ),
                "region3" => array(
                    "name" => "Parakou",
                    "latitude" => 9.3554,
                    "longitude" => 2.6306
                )
            ),
            "Bermuda" => array(
                "region1" => array(
                    "name" => "Hamilton",
                    "latitude" => 32.2949,
                    "longitude" => -64.7830
                ),
                "region2" => array(
                    "name" => "St. George's",
                    "latitude" => 32.3804,
                    "longitude" => -64.6788
                ),
                "region3" => array(
                    "name" => "Somerset Village",
                    "latitude" => 32.2940,
                    "longitude" => -64.8743
                )
            ),
            "Brunei" => array(
                "region1" => array(
                    "name" => "Bandar Seri Begawan",
                    "latitude" => 4.9031,
                    "longitude" => 114.9398
                ),
                "region2" => array(
                    "name" => "Kuala Belait",
                    "latitude" => 4.5832,
                    "longitude" => 114.2202
                ),
                "region3" => array(
                    "name" => "Seria",
                    "latitude" => 4.6194,
                    "longitude" => 114.3325
                )
            ),
            "Bolivia" => array(
                "region1" => array(
                    "name" => "La Paz",
                    "latitude" => -16.5000,
                    "longitude" => -68.1500
                ),
                "region2" => array(
                    "name" => "Santa Cruz de la Sierra",
                    "latitude" => -17.7833,
                    "longitude" => -63.1667
                ),
                "region3" => array(
                    "name" => "Cochabamba",
                    "latitude" => -17.3833,
                    "longitude" => -66.1667
                )
            ),
            "Brazil" => array(
                "region1" => array(
                    "name" => "Brasília",
                    "latitude" => -15.7801,
                    "longitude" => -47.9292
                ),
                "region2" => array(
                    "name" => "São Paulo",
                    "latitude" => -23.5505,
                    "longitude" => -46.6333
                ),
                "region3" => array(
                    "name" => "Rio de Janeiro",
                    "latitude" => -22.9068,
                    "longitude" => -43.1729
                )
            ),
            "Bahamas" => array(
                "region1" => array(
                    "name" => "Nassau",
                    "latitude" => 25.0343,
                    "longitude" => -77.3963
                ),
                "region2" => array(
                    "name" => "Freeport",
                    "latitude" => 26.5333,
                    "longitude" => -78.6333
                ),
                "region3" => array(
                    "name" => "Marsh Harbour",
                    "latitude" => 26.5410,
                    "longitude" => -77.0636
                )
            ),
            "Bhutan" => array(
                "region1" => array(
                    "name" => "Thimphu",
                    "latitude" => 27.4728,
                    "longitude" => 89.6390
                ),
                "region2" => array(
                    "name" => "Phuntsholing",
                    "latitude" => 26.8516,
                    "longitude" => 89.3884
                ),
                "region3" => array(
                    "name" => "Paro",
                    "latitude" => 27.4333,
                    "longitude" => 89.4167
                )
            ),
            "Bouvet Island" => array(
                "region1" => array(
                    "name" => "Bouvet Island",
                    "latitude" => -54.4232,
                    "longitude" => 3.4139
                ),
                "region2" => array(
                    "name" => "Bouvetoya",
                    "latitude" => -54.4232,
                    "longitude" => 3.4139
                ),
                "region3" => array(
                    "name" => "Bouvet",
                    "latitude" => -54.4232,
                    "longitude" => 3.4139
                )
            ),
            "Botswana" => array(
                "region1" => array(
                    "name" => "Gaborone",
                    "latitude" => -24.6541,
                    "longitude" => 25.9089
                ),
                "region2" => array(
                    "name" => "Francistown",
                    "latitude" => -21.1699,
                    "longitude" => 27.5079
                ),
                "region3" => array(
                    "name" => "Maun",
                    "latitude" => -19.9889,
                    "longitude" => 23.4241
                )
            ),
            "Belarus" => array(
                "region1" => array(
                    "name" => "Minsk",
                    "latitude" => 53.9045,
                    "longitude" => 27.5615
                ),
                "region2" => array(
                    "name" => "Gomel",
                    "latitude" => 52.4458,
                    "longitude" => 30.9848
                ),
                "region3" => array(
                    "name" => "Brest",
                    "latitude" => 52.0976,
                    "longitude" => 23.7340
                )
            ),
            "Belize" => array(
                "region1" => array(
                    "name" => "Belize City",
                    "latitude" => 17.4987,
                    "longitude" => -88.1884
                ),
                "region2" => array(
                    "name" => "Belmopan",
                    "latitude" => 17.2500,
                    "longitude" => -88.7667
                ),
                "region3" => array(
                    "name" => "San Ignacio",
                    "latitude" => 17.1556,
                    "longitude" => -89.0690
                )
            ),
            "Canada" => array(
                "region1" => array(
                    "name" => "Ottawa",
                    "latitude" => 45.4215,
                    "longitude" => -75.6981
                ),
                "region2" => array(
                    "name" => "Toronto",
                    "latitude" => 43.6510,
                    "longitude" => -79.3470
                ),
                "region3" => array(
                    "name" => "Vancouver",
                    "latitude" => 49.2827,
                    "longitude" => -123.1207
                )
            ),
            "Cocos [Keeling] Islands" => array(
                "region1" => array(
                    "name" => "West Island",
                    "latitude" => -12.1886,
                    "longitude" => 96.8291
                ),
                "region2" => array(
                    "name" => "Direction Island",
                    "latitude" => -12.2283,
                    "longitude" => 96.8553
                ),
                "region3" => array(
                    "name" => "Home Island",
                    "latitude" => -12.1966,
                    "longitude" => 96.8329
                )
            ),
            "Congo [DRC]" => array(
                "region1" => array(
                    "name" => "Kinshasa",
                    "latitude" => -4.4419,
                    "longitude" => 15.2663
                ),
                "region2" => array(
                    "name" => "Lubumbashi",
                    "latitude" => -11.6584,
                    "longitude" => 27.5057
                ),
                "region3" => array(
                    "name" => "Mbuji-Mayi",
                    "latitude" => -6.1460,
                    "longitude" => 23.5967
                )
            ),
            "Central African Republic" => array(
                "region1" => array(
                    "name" => "Bangui",
                    "latitude" => 4.3947,
                    "longitude" => 18.5582
                ),
                "region2" => array(
                    "name" => "Bimbo",
                    "latitude" => 4.2567,
                    "longitude" => 18.4158
                ),
                "region3" => array(
                    "name" => "Berberati",
                    "latitude" => 4.2613,
                    "longitude" => 15.7908
                )
            ),
            "Congo [Republic]" => array(
                "region1" => array(
                    "name" => "Brazzaville",
                    "latitude" => -4.2634,
                    "longitude" => 15.2429
                ),
                "region2" => array(
                    "name" => "Pointe-Noire",
                    "latitude" => -4.7739,
                    "longitude" => 11.8661
                ),
                "region3" => array(
                    "name" => "Dolisie",
                    "latitude" => -4.2016,
                    "longitude" => 12.6692
                )
            ),
            "Switzerland" => array(
                "region1" => array(
                    "name" => "Zurich",
                    "latitude" => 47.3769,
                    "longitude" => 8.5417
                ),
                "region2" => array(
                    "name" => "Geneva",
                    "latitude" => 46.2044,
                    "longitude" => 6.1432
                ),
                "region3" => array(
                    "name" => "Bern",
                    "latitude" => 46.9480,
                    "longitude" => 7.4474
                )
            ),
            "Côte d'Ivoire" => array(
                "region1" => array(
                    "name" => "Abidjan",
                    "latitude" => 5.3599,
                    "longitude" => -4.0083
                ),
                "region2" => array(
                    "name" => "Bouaké",
                    "latitude" => 7.6869,
                    "longitude" => -5.0306
                ),
                "region3" => array(
                    "name" => "Yamoussoukro",
                    "latitude" => 6.8276,
                    "longitude" => -5.2893
                )
            ),
            "Cook Islands" => array(
                "region1" => array(
                    "name" => "Rarotonga",
                    "latitude" => -21.2295,
                    "longitude" => -159.7763
                ),
                "region2" => array(
                    "name" => "Aitutaki",
                    "latitude" => -18.8534,
                    "longitude" => -159.7295
                ),
                "region3" => array(
                    "name" => "Atiu",
                    "latitude" => -19.9896,
                    "longitude" => -158.2434
                )
            ),
            "Chile" => array(
                "region1" => array(
                    "name" => "Santiago",
                    "latitude" => -33.4489,
                    "longitude" => -70.6693
                ),
                "region2" => array(
                    "name" => "Valparaíso",
                    "latitude" => -33.0458,
                    "longitude" => -71.6197
                ),
                "region3" => array(
                    "name" => "Concepción",
                    "latitude" => -36.8261,
                    "longitude" => -73.0444
                )
            ),
            "Cameroon" => array(
                "region1" => array(
                    "name" => "Yaoundé",
                    "latitude" => 3.848,
                    "longitude" => 11.5021
                ),
                "region2" => array(
                    "name" => "Douala",
                    "latitude" => 4.0517,
                    "longitude" => 9.7679
                ),
                "region3" => array(
                    "name" => "Bamenda",
                    "latitude" => 5.9526,
                    "longitude" => 10.1574
                )
            ),
            "China" => array(
                "region1" => array(
                    "name" => "Beijing",
                    "latitude" => 39.9042,
                    "longitude" => 116.4074
                ),
                "region2" => array(
                    "name" => "Shanghai",
                    "latitude" => 31.2304,
                    "longitude" => 121.4737
                ),
                "region3" => array(
                    "name" => "Guangzhou",
                    "latitude" => 23.1291,
                    "longitude" => 113.2644
                )
            ),
            "Colombia" => array(
                "region1" => array(
                    "name" => "Bogotá",
                    "latitude" => 4.7109,
                    "longitude" => -74.0721
                ),
                "region2" => array(
                    "name" => "Medellín",
                    "latitude" => 6.2442,
                    "longitude" => -75.5812
                ),
                "region3" => array(
                    "name" => "Cali",
                    "latitude" => 3.4516,
                    "longitude" => -76.5320
                )
            ),
            "Costa Rica" => array(
                "region1" => array(
                    "name" => "San José",
                    "latitude" => 9.9281,
                    "longitude" => -84.0907
                ),
                "region2" => array(
                    "name" => "Liberia",
                    "latitude" => 10.6342,
                    "longitude" => -85.4406
                ),
                "region3" => array(
                    "name" => "Puntarenas",
                    "latitude" => 9.9766,
                    "longitude" => -84.8384
                )
            ),
            "Cuba" => array(
                "region1" => array(
                    "name" => "Havana",
                    "latitude" => 23.1136,
                    "longitude" => -82.3666
                ),
                "region2" => array(
                    "name" => "Santiago de Cuba",
                    "latitude" => 20.0144,
                    "longitude" => -75.8233
                ),
                "region3" => array(
                    "name" => "Camagüey",
                    "latitude" => 21.3926,
                    "longitude" => -77.9058
                )
            ),
            "Cape Verde" => array(
                "region1" => array(
                    "name" => "Praia",
                    "latitude" => 14.9195,
                    "longitude" => -23.5087
                ),
                "region2" => array(
                    "name" => "Mindelo",
                    "latitude" => 16.8901,
                    "longitude" => -24.9808
                ),
                "region3" => array(
                    "name" => "Sal Rei",
                    "latitude" => 16.1862,
                    "longitude" => -22.9099
                )
            ),
            "Christmas Island" => array(
                "region1" => array(
                    "name" => "Flying Fish Cove",
                    "latitude" => -10.4204,
                    "longitude" => 105.6796
                ),
                "region2" => array(
                    "name" => "Poon Saan",
                    "latitude" => -10.4576,
                    "longitude" => 105.6901
                ),
                "region3" => array(
                    "name" => "Drumsite",
                    "latitude" => -10.4768,
                    "longitude" => 105.6493
                )
            ),
            "Cyprus" => array(
                "region1" => array(
                    "name" => "Nicosia",
                    "latitude" => 35.1856,
                    "longitude" => 33.3823
                ),
                "region2" => array(
                    "name" => "Limassol",
                    "latitude" => 34.7071,
                    "longitude" => 33.0226
                ),
                "region3" => array(
                    "name" => "Larnaca",
                    "latitude" => 34.9164,
                    "longitude" => 33.6239
                )
            ),
            "Czech Republic" => array(
                "region1" => array(
                    "name" => "Prague",
                    "latitude" => 50.0755,
                    "longitude" => 14.4378
                ),
                "region2" => array(
                    "name" => "Brno",
                    "latitude" => 49.1951,
                    "longitude" => 16.6068
                ),
                "region3" => array(
                    "name" => "Ostrava",
                    "latitude" => 49.8209,
                    "longitude" => 18.2625
                )
            ),
            "Germany" => array(
                "region1" => array(
                    "name" => "Berlin",
                    "latitude" => 52.5200,
                    "longitude" => 13.4050
                ),
                "region2" => array(
                    "name" => "Munich",
                    "latitude" => 48.1351,
                    "longitude" => 11.5820
                ),
                "region3" => array(
                    "name" => "Hamburg",
                    "latitude" => 53.5511,
                    "longitude" => 9.9937
                )
            ),
            "Djibouti" => array(
                "region1" => array(
                    "name" => "Djibouti City",
                    "latitude" => 11.5913,
                    "longitude" => 43.1456
                ),
                "region2" => array(
                    "name" => "Ali Sabieh",
                    "latitude" => 11.1518,
                    "longitude" => 42.7126
                ),
                "region3" => array(
                    "name" => "Tadjourah",
                    "latitude" => 11.7859,
                    "longitude" => 42.8861
                )
            ),
            "Denmark" => array(
                "region1" => array(
                    "name" => "Copenhagen",
                    "latitude" => 55.6761,
                    "longitude" => 12.5683
                ),
                "region2" => array(
                    "name" => "Aarhus",
                    "latitude" => 56.1629,
                    "longitude" => 10.2039
                ),
                "region3" => array(
                    "name" => "Odense",
                    "latitude" => 55.3962,
                    "longitude" => 10.3906
                )
            ),
            "Dominica" => array(
                "region1" => array(
                    "name" => "Roseau",
                    "latitude" => 15.3010,
                    "longitude" => -61.3881
                ),
                "region2" => array(
                    "name" => "Portsmouth",
                    "latitude" => 15.5848,
                    "longitude" => -61.4647
                ),
                "region3" => array(
                    "name" => "Marigot",
                    "latitude" => 15.5425,
                    "longitude" => -61.3082
                )
            ),
            "Dominican Republic" => array(
                "region1" => array(
                    "name" => "Santo Domingo",
                    "latitude" => 18.4861,
                    "longitude" => -69.9312
                ),
                "region2" => array(
                    "name" => "Santiago de los Caballeros",
                    "latitude" => 19.4510,
                    "longitude" => -70.6884
                ),
                "region3" => array(
                    "name" => "Puerto Plata",
                    "latitude" => 19.7808,
                    "longitude" => -70.6871
                )
            ),
            "Algeria" => array(
                "region1" => array(
                    "name" => "Algiers",
                    "latitude" => 36.7538,
                    "longitude" => 3.0588
                ),
                "region2" => array(
                    "name" => "Oran",
                    "latitude" => 35.6967,
                    "longitude" => -0.6331
                ),
                "region3" => array(
                    "name" => "Constantine",
                    "latitude" => 36.3650,
                    "longitude" => 6.6147
                )
            ),
            "Ecuador" => array(
                "region1" => array(
                    "name" => "Quito",
                    "latitude" => -0.2295,
                    "longitude" => -78.5249
                ),
                "region2" => array(
                    "name" => "Guayaquil",
                    "latitude" => -2.1709,
                    "longitude" => -79.9224
                ),
                "region3" => array(
                    "name" => "Cuenca",
                    "latitude" => -2.9001,
                    "longitude" => -79.0059
                )
            ),
            "Estonia" => array(
                "region1" => array(
                    "name" => "Tallinn",
                    "latitude" => 59.4370,
                    "longitude" => 24.7536
                ),
                "region2" => array(
                    "name" => "Tartu",
                    "latitude" => 58.3781,
                    "longitude" => 26.7294
                ),
                "region3" => array(
                    "name" => "Pärnu",
                    "latitude" => 58.3854,
                    "longitude" => 24.4966
                )
            ),
            "Egypt" => array(
                "region1" => array(
                    "name" => "Cairo",
                    "latitude" => 30.0444,
                    "longitude" => 31.2357
                ),
                "region2" => array(
                    "name" => "Alexandria",
                    "latitude" => 31.2001,
                    "longitude" => 29.9187
                ),
                "region3" => array(
                    "name" => "Luxor",
                    "latitude" => 25.6872,
                    "longitude" => 32.6396
                )
            ),
            "Western Sahara" => array(
                "region1" => array(
                    "name" => "Laayoune",
                    "latitude" => 27.1253,
                    "longitude" => -13.1625
                ),
                "region2" => array(
                    "name" => "Dakhla",
                    "latitude" => 23.6848,
                    "longitude" => -15.9579
                ),
                "region3" => array(
                    "name" => "Smara",
                    "latitude" => 26.7384,
                    "longitude" => -11.6749
                )
            ),
            "Eritrea" => array(
                "region1" => array(
                    "name" => "Asmara",
                    "latitude" => 15.3229,
                    "longitude" => 38.9251
                ),
                "region2" => array(
                    "name" => "Massawa",
                    "latitude" => 15.6101,
                    "longitude" => 39.4629
                ),
                "region3" => array(
                    "name" => "Keren",
                    "latitude" => 15.7781,
                    "longitude" => 38.4510
                )
            ),
            "Spain" => array(
                "region1" => array(
                    "name" => "Madrid",
                    "latitude" => 40.4168,
                    "longitude" => -3.7038
                ),
                "region2" => array(
                    "name" => "Barcelona",
                    "latitude" => 41.3851,
                    "longitude" => 2.1734
                ),
                "region3" => array(
                    "name" => "Seville",
                    "latitude" => 37.3891,
                    "longitude" => -5.9845
                )
            ),
            "Ethiopia" => array(
                "region1" => array(
                    "name" => "Addis Ababa",
                    "latitude" => 9.1450,
                    "longitude" => 38.7813
                ),
                "region2" => array(
                    "name" => "Dire Dawa",
                    "latitude" => 9.5931,
                    "longitude" => 41.8661
                ),
                "region3" => array(
                    "name" => "Bahir Dar",
                    "latitude" => 11.6000,
                    "longitude" => 37.3833
                )
            ),
            "Finland" => array(
                "region1" => array(
                    "name" => "Helsinki",
                    "latitude" => 60.1699,
                    "longitude" => 24.9384
                ),
                "region2" => array(
                    "name" => "Tampere",
                    "latitude" => 61.4981,
                    "longitude" => 23.7610
                ),
                "region3" => array(
                    "name" => "Turku",
                    "latitude" => 60.4518,
                    "longitude" => 22.2666
                )
            ),
            "Fiji" => array(
                "region1" => array(
                    "name" => "Suva",
                    "latitude" => -18.1248,
                    "longitude" => 178.4500
                ),
                "region2" => array(
                    "name" => "Nadi",
                    "latitude" => -17.7588,
                    "longitude" => 177.4437
                ),
                "region3" => array(
                    "name" => "Lautoka",
                    "latitude" => -17.6167,
                    "longitude" => 177.4667
                )
            ),
            "Falkland Islands [Islas Malvinas]" => array(
                "region1" => array(
                    "name" => "Stanley",
                    "latitude" => -51.7000,
                    "longitude" => -57.8500
                ),
                "region2" => array(
                    "name" => "Mount Pleasant",
                    "latitude" => -51.8236,
                    "longitude" => -58.4507
                ),
                "region3" => array(
                    "name" => "Goose Green",
                    "latitude" => -51.6942,
                    "longitude" => -57.8695
                )
            ),
            "Micronesia" => array(
                "region1" => array(
                    "name" => "Palikir",
                    "latitude" => 6.9248,
                    "longitude" => 158.1617
                ),
                "region2" => array(
                    "name" => "Kolonia",
                    "latitude" => 6.9190,
                    "longitude" => 158.1616
                ),
                "region3" => array(
                    "name" => "Weno",
                    "latitude" => 7.4512,
                    "longitude" => 151.8469
                )
            ),
            "Faroe Islands" => array(
                "region1" => array(
                    "name" => "Tórshavn",
                    "latitude" => 62.0071,
                    "longitude" => -6.7714
                ),
                "region2" => array(
                    "name" => "Klaksvík",
                    "latitude" => 62.2266,
                    "longitude" => -6.5890
                ),
                "region3" => array(
                    "name" => "Runavík",
                    "latitude" => 62.0967,
                    "longitude" => -6.7532
                )
            ),
            "France" => array(
                "region1" => array(
                    "name" => "Paris",
                    "latitude" => 48.8566,
                    "longitude" => 2.3522
                ),
                "region2" => array(
                    "name" => "Marseille",
                    "latitude" => 43.2965,
                    "longitude" => 5.3698
                ),
                "region3" => array(
                    "name" => "Lyon",
                    "latitude" => 45.75,
                    "longitude" => 4.85
                )
            ),
            "Gabon" => array(
                "region1" => array(
                    "name" => "Libreville",
                    "latitude" => 0.4162,
                    "longitude" => 9.4673
                ),
                "region2" => array(
                    "name" => "Port-Gentil",
                    "latitude" => -0.7193,
                    "longitude" => 8.7815
                ),
                "region3" => array(
                    "name" => "Franceville",
                    "latitude" => -1.6333,
                    "longitude" => 13.5833
                )
            ),
            "United Kingdom" => array(
                "region1" => array(
                    "name" => "London",
                    "latitude" => 51.5074,
                    "longitude" => -0.1278
                ),
                "region2" => array(
                    "name" => "Manchester",
                    "latitude" => 53.4831,
                    "longitude" => -2.2360
                ),
                "region3" => array(
                    "name" => "Edinburgh",
                    "latitude" => 55.9533,
                    "longitude" => -3.1883
                )
            ),
            "Grenada" => array(
                "region1" => array(
                    "name" => "St. George's",
                    "latitude" => 12.0567,
                    "longitude" => -61.7486
                ),
                "region2" => array(
                    "name" => "Gouyave",
                    "latitude" => 12.1667,
                    "longitude" => -61.7333
                ),
                "region3" => array(
                    "name" => "Grenville",
                    "latitude" => 12.1167,
                    "longitude" => -61.6167
                )
            ),
            "Georgia" => array(
                "region1" => array(
                    "name" => "Tbilisi",
                    "latitude" => 41.7151,
                    "longitude" => 44.8271
                ),
                "region2" => array(
                    "name" => "Batumi",
                    "latitude" => 41.6416,
                    "longitude" => 41.6369
                ),
                "region3" => array(
                    "name" => "Kutaisi",
                    "latitude" => 42.6986,
                    "longitude" => 42.7075
                )
            ),
            "French Guiana" => array(
                "region1" => array(
                    "name" => "Cayenne",
                    "latitude" => 4.9225,
                    "longitude" => -52.3135
                ),
                "region2" => array(
                    "name" => "Saint-Laurent-du-Maroni",
                    "latitude" => 5.4988,
                    "longitude" => -54.0325
                ),
                "region3" => array(
                    "name" => "Kourou",
                    "latitude" => 5.1554,
                    "longitude" => -52.6476
                )
            ),
            "Guernsey" => array(
                "region1" => array(
                    "name" => "St. Peter Port",
                    "latitude" => 49.4583,
                    "longitude" => -2.5352
                ),
                "region2" => array(
                    "name" => "St. Sampson",
                    "latitude" => 49.4700,
                    "longitude" => -2.5350
                ),
                "region3" => array(
                    "name" => "St. Martin",
                    "latitude" => 49.4440,
                    "longitude" => -2.5361
                )
            ),
            "Ghana" => array(
                "region1" => array(
                    "name" => "Accra",
                    "latitude" => 5.6037,
                    "longitude" => -0.1870
                ),
                "region2" => array(
                    "name" => "Kumasi",
                    "latitude" => 6.6885,
                    "longitude" => -1.6244
                ),
                "region3" => array(
                    "name" => "Tamale",
                    "latitude" => 9.4117,
                    "longitude" => -0.8255
                )
            ),
            "Gibraltar" => array(
                "region1" => array(
                    "name" => "Gibraltar",
                    "latitude" => 36.1377,
                    "longitude" => -5.3453
                ),
                "region2" => array(
                    "name" => "Westside",
                    "latitude" => 36.1500,
                    "longitude" => -5.3667
                ),
                "region3" => array(
                    "name" => "South District",
                    "latitude" => 36.1061,
                    "longitude" => -5.3440
                )
            ),
            "Greenland" => array(
                "region1" => array(
                    "name" => "Nuuk",
                    "latitude" => 64.1836,
                    "longitude" => -51.7214
                ),
                "region2" => array(
                    "name" => "Ilulissat",
                    "latitude" => 69.2167,
                    "longitude" => -51.1000
                ),
                "region3" => array(
                    "name" => "Sisimiut",
                    "latitude" => 66.9408,
                    "longitude" => -53.6739
                )
            ),
            "Gambia" => array(
                "region1" => array(
                    "name" => "Banjul",
                    "latitude" => 13.4551,
                    "longitude" => -16.5860
                ),
                "region2" => array(
                    "name" => "Serekunda",
                    "latitude" => 13.4414,
                    "longitude" => -16.6781
                ),
                "region3" => array(
                    "name" => "Brikama",
                    "latitude" => 13.2783,
                    "longitude" => -16.6575
                )
            ),
            "Guinea" => array(
                "region1" => array(
                    "name" => "Conakry",
                    "latitude" => 9.6412,
                    "longitude" => -13.5784
                ),
                "region2" => array(
                    "name" => "Nzérékoré",
                    "latitude" => 7.7571,
                    "longitude" => -8.8189
                ),
                "region3" => array(
                    "name" => "Kindia",
                    "latitude" => 10.0600,
                    "longitude" => -12.8690
                )
            ),
            "Guadeloupe" => array(
                "region1" => array(
                    "name" => "Basse-Terre",
                    "latitude" => 16.0143,
                    "longitude" => -61.7428
                ),
                "region2" => array(
                    "name" => "Pointe-à-Pitre",
                    "latitude" => 16.2415,
                    "longitude" => -61.5335
                ),
                "region3" => array(
                    "name" => "Le Gosier",
                    "latitude" => 16.2167,
                    "longitude" => -61.5000
                )
            ),
            "Equatorial Guinea" => array(
                "region1" => array(
                    "name" => "Malabo",
                    "latitude" => 3.7523,
                    "longitude" => 8.7758
                ),
                "region2" => array(
                    "name" => "Bata",
                    "latitude" => 1.8607,
                    "longitude" => 9.7659
                ),
                "region3" => array(
                    "name" => "Ebebiyín",
                    "latitude" => 2.1511,
                    "longitude" => 11.3308
                )
            ),
            "Greece" => array(
                "region1" => array(
                    "name" => "Athens",
                    "latitude" => 37.9838,
                    "longitude" => 23.7275
                ),
                "region2" => array(
                    "name" => "Thessaloniki",
                    "latitude" => 40.6401,
                    "longitude" => 22.9444
                ),
                "region3" => array(
                    "name" => "Patras",
                    "latitude" => 38.2466,
                    "longitude" => 21.7346
                )
            ),
            "South Georgia and the South Sandwich Islands" => array(
                "region1" => array(
                    "name" => "Grytviken",
                    "latitude" => -54.2811,
                    "longitude" => -36.5088
                ),
                "region2" => array(
                    "name" => "King Edward Point",
                    "latitude" => -54.2833,
                    "longitude" => -36.5000
                ),
                "region3" => array(
                    "name" => "Stromness",
                    "latitude" => -54.1613,
                    "longitude" => -36.6815
                )
            ),
            "Guatemala" => array(
                "region1" => array(
                    "name" => "Guatemala City",
                    "latitude" => 14.6349,
                    "longitude" => -90.5069
                ),
                "region2" => array(
                    "name" => "Quetzaltenango",
                    "latitude" => 14.8347,
                    "longitude" => -91.5189
                ),
                "region3" => array(
                    "name" => "Escuintla",
                    "latitude" => 14.3050,
                    "longitude" => -90.7850
                )
            ),
            "Guam" => array(
                "region1" => array(
                    "name" => "Hagåtña",
                    "latitude" => 13.4756,
                    "longitude" => 144.7472
                ),
                "region2" => array(
                    "name" => "Tamuning",
                    "latitude" => 13.5024,
                    "longitude" => 144.8058
                ),
                "region3" => array(
                    "name" => "Dededo",
                    "latitude" => 13.5156,
                    "longitude" => 144.8325
                )
            ),
            "Guinea-Bissau" => array(
                "region1" => array(
                    "name" => "Bissau",
                    "latitude" => 11.8636,
                    "longitude" => -15.5977
                ),
                "region2" => array(
                    "name" => "Bafatá",
                    "latitude" => 12.1690,
                    "longitude" => -14.6464
                ),
                "region3" => array(
                    "name" => "Gabú",
                    "latitude" => 12.2833,
                    "longitude" => -14.2167
                )
            ),
            "Guyana" => array(
                "region1" => array(
                    "name" => "Georgetown",
                    "latitude" => 6.8013,
                    "longitude" => -58.1552
                ),
                "region2" => array(
                    "name" => "Linden",
                    "latitude" => 6.0000,
                    "longitude" => -58.3000
                ),
                "region3" => array(
                    "name" => "New Amsterdam",
                    "latitude" => 6.2500,
                    "longitude" => -57.5167
                )
            ),
            "Gaza Strip" => array(
                "region1" => array(
                    "name" => "Gaza City",
                    "latitude" => 31.5204,
                    "longitude" => 34.4660
                ),
                "region2" => array(
                    "name" => "Khan Yunis",
                    "latitude" => 31.3441,
                    "longitude" => 34.3114
                ),
                "region3" => array(
                    "name" => "Rafah",
                    "latitude" => 31.2956,
                    "longitude" => 34.2408
                )
            ),
            "Hong Kong" => array(
                "region1" => array(
                    "name" => "Hong Kong",
                    "latitude" => 22.3193,
                    "longitude" => 114.1694
                ),
                "region2" => array(
                    "name" => "Kowloon",
                    "latitude" => 22.3186,
                    "longitude" => 114.1796
                ),
                "region3" => array(
                    "name" => "Tsuen Wan",
                    "latitude" => 22.3709,
                    "longitude" => 114.1044
                )
            ),
            "Heard Island and McDonald Islands" => array(
                "region1" => array(
                    "name" => "Atlas Cove",
                    "latitude" => -53.1053,
                    "longitude" => 73.5122
                ),
                "region2" => array(
                    "name" => "Cape Arkona",
                    "latitude" => -53.3828,
                    "longitude" => 73.4306
                ),
                "region3" => array(
                    "name" => "Long Beach",
                    "latitude" => -53.0683,
                    "longitude" => 73.5542
                )
            ),
            "Honduras" => array(
                "region1" => array(
                    "name" => "Tegucigalpa",
                    "latitude" => 14.0818,
                    "longitude" => -87.2068
                ),
                "region2" => array(
                    "name" => "San Pedro Sula",
                    "latitude" => 15.5049,
                    "longitude" => -88.0250
                ),
                "region3" => array(
                    "name" => "La Ceiba",
                    "latitude" => 15.7597,
                    "longitude" => -86.7822
                )
            ),
            "Croatia" => array(
                "region1" => array(
                    "name" => "Zagreb",
                    "latitude" => 45.8150,
                    "longitude" => 15.9819
                ),
                "region2" => array(
                    "name" => "Split",
                    "latitude" => 43.5081,
                    "longitude" => 16.4402
                ),
                "region3" => array(
                    "name" => "Rijeka",
                    "latitude" => 45.3289,
                    "longitude" => 14.4360
                )
            ),
            "Haiti" => array(
                "region1" => array(
                    "name" => "Port-au-Prince",
                    "latitude" => 18.5944,
                    "longitude" => -72.3074
                ),
                "region2" => array(
                    "name" => "Cap-Haïtien",
                    "latitude" => 19.7542,
                    "longitude" => -72.2044
                ),
                "region3" => array(
                    "name" => "Gonaïves",
                    "latitude" => 19.4500,
                    "longitude" => -72.6833
                )
            ),
            "Hungary" => array(
                "region1" => array(
                    "name" => "Budapest",
                    "latitude" => 47.4979,
                    "longitude" => 19.0402
                ),
                "region2" => array(
                    "name" => "Debrecen",
                    "latitude" => 47.5316,
                    "longitude" => 21.6273
                ),
                "region3" => array(
                    "name" => "Szeged",
                    "latitude" => 46.2530,
                    "longitude" => 20.1414
                )
            ),
            "Indonesia" => array(
                "region1" => array(
                    "name" => "Jakarta",
                    "latitude" => -6.2146,
                    "longitude" => 106.8451
                ),
                "region2" => array(
                    "name" => "Surabaya",
                    "latitude" => -7.2575,
                    "longitude" => 112.7521
                ),
                "region3" => array(
                    "name" => "Medan",
                    "latitude" => 3.5952,
                    "longitude" => 98.6730
                )
            ),
            "Ireland" => array(
                "region1" => array(
                    "name" => "Dublin",
                    "latitude" => 53.3498,
                    "longitude" => -6.2603
                ),
                "region2" => array(
                    "name" => "Cork",
                    "latitude" => 51.8969,
                    "longitude" => -8.4863
                ),
                "region3" => array(
                    "name" => "Galway",
                    "latitude" => 53.2707,
                    "longitude" => -9.0568
                )
            ),
            "Israel" => array(
                "region1" => array(
                    "name" => "Jerusalem",
                    "latitude" => 31.7683,
                    "longitude" => 35.2137
                ),
                "region2" => array(
                    "name" => "Tel Aviv",
                    "latitude" => 32.0853,
                    "longitude" => 34.7818
                ),
                "region3" => array(
                    "name" => "Haifa",
                    "latitude" => 32.7940,
                    "longitude" => 34.9896
                )
            ),
            "Isle of Man" => array(
                "region1" => array(
                    "name" => "Douglas",
                    "latitude" => 54.2361,
                    "longitude" => -4.5481
                ),
                "region2" => array(
                    "name" => "Ramsey",
                    "latitude" => 54.3253,
                    "longitude" => -4.3962
                ),
                "region3" => array(
                    "name" => "Peel",
                    "latitude" => 54.2272,
                    "longitude" => -4.6975
                )
            ),
            "India" => array(
                "region1" => array(
                    "name" => "New Delhi",
                    "latitude" => 28.6139,
                    "longitude" => 77.2090
                ),
                "region2" => array(
                    "name" => "Mumbai",
                    "latitude" => 19.0760,
                    "longitude" => 72.8777
                ),
                "region3" => array(
                    "name" => "Kolkata",
                    "latitude" => 22.5726,
                    "longitude" => 88.3639
                )
            ),
            "British Indian Ocean Territory" => array(
                "region1" => array(
                    "name" => "Diego Garcia",
                    "latitude" => -7.3133,
                    "longitude" => 72.4116
                ),
                "region2" => array(
                    "name" => "Peros Banhos",
                    "latitude" => -5.3353,
                    "longitude" => 72.3847
                ),
                "region3" => array(
                    "name" => "Boddam",
                    "latitude" => -7.4256,
                    "longitude" => 72.5281
                )
            ),
            "Iraq" => array(
                "region1" => array(
                    "name" => "Baghdad",
                    "latitude" => 33.3152,
                    "longitude" => 44.3661
                ),
                "region2" => array(
                    "name" => "Basra",
                    "latitude" => 30.5085,
                    "longitude" => 47.7836
                ),
                "region3" => array(
                    "name" => "Erbil",
                    "latitude" => 36.1911,
                    "longitude" => 44.0096
                )
            ),
            "Iran" => array(
                "region1" => array(
                    "name" => "Tehran",
                    "latitude" => 35.6892,
                    "longitude" => 51.3890
                ),
                "region2" => array(
                    "name" => "Mashhad",
                    "latitude" => 36.2605,
                    "longitude" => 59.6168
                ),
                "region3" => array(
                    "name" => "Isfahan",
                    "latitude" => 32.6546,
                    "longitude" => 51.6677
                )
            ),
            "Iceland" => array(
                "region1" => array(
                    "name" => "Reykjavík",
                    "latitude" => 64.1466,
                    "longitude" => -21.9426
                ),
                "region2" => array(
                    "name" => "Akureyri",
                    "latitude" => 65.6840,
                    "longitude" => -18.1128
                ),
                "region3" => array(
                    "name" => "Hafnarfjörður",
                    "latitude" => 64.0671,
                    "longitude" => -21.9406
                )
            ),
            "Italy" => array(
                "region1" => array(
                    "name" => "Rome",
                    "latitude" => 41.9028,
                    "longitude" => 12.4964
                ),
                "region2" => array(
                    "name" => "Milan",
                    "latitude" => 45.4642,
                    "longitude" => 9.1900
                ),
                "region3" => array(
                    "name" => "Naples",
                    "latitude" => 40.8522,
                    "longitude" => 14.2681
                )
            ),
            "Jersey" => array(
                "region1" => array(
                    "name" => "Saint Helier",
                    "latitude" => 49.1836,
                    "longitude" => -2.1061
                ),
                "region2" => array(
                    "name" => "Saint Saviour",
                    "latitude" => 49.2030,
                    "longitude" => -2.1460
                ),
                "region3" => array(
                    "name" => "Grouville",
                    "latitude" => 49.1805,
                    "longitude" => -2.0291
                )
            ),
            "Jamaica" => array(
                "region1" => array(
                    "name" => "Kingston",
                    "latitude" => 17.9710,
                    "longitude" => -76.7924
                ),
                "region2" => array(
                    "name" => "Montego Bay",
                    "latitude" => 18.4861,
                    "longitude" => -77.8946
                ),
                "region3" => array(
                    "name" => "Spanish Town",
                    "latitude" => 17.9859,
                    "longitude" => -76.8480
                )
            ),
            "Jordan" => array(
                "region1" => array(
                    "region" => "North Region",
                    "name" => "Amman",
                    "latitude" => 31.974855606420313,
                    "longitude" => 35.92123511500221
                ),
                "region2" => array(
                    "region" => "Central Region",
                    "name" => "Karak",
                    "latitude" => 31.188200932780383,
                    "longitude" => 35.70728017125596
                ),
                "region3" => array(
                    "region" => "South Region",
                    "name" => "Irbid",
                    "latitude" => 32.558744720387324,
                    "longitude" => 35.84706520668394
                )
            ),
            "Kenya" => array(
                "region1" => array(
                    "name" => "Nairobi",
                    "latitude" => -1.2864,
                    "longitude" => 36.8172
                ),
                "region2" => array(
                    "name" => "Mombasa",
                    "latitude" => -4.0435,
                    "longitude" => 39.6682
                ),
                "region3" => array(
                    "name" => "Nakuru",
                    "latitude" => -0.3031,
                    "longitude" => 36.0800
                )
            ),
            "Kyrgyzstan" => array(
                "region1" => array(
                    "name" => "Bishkek",
                    "latitude" => 42.8746,
                    "longitude" => 74.5698
                ),
                "region2" => array(
                    "name" => "Osh",
                    "latitude" => 40.5394,
                    "longitude" => 72.8000
                ),
                "region3" => array(
                    "name" => "Jalal-Abad",
                    "latitude" => 40.9329,
                    "longitude" => 73.0028
                )
            ),
            "Cambodia" => array(
                "region1" => array(
                    "name" => "Phnom Penh",
                    "latitude" => 11.5564,
                    "longitude" => 104.9282
                ),
                "region2" => array(
                    "name" => "Siem Reap",
                    "latitude" => 13.3671,
                    "longitude" => 103.8448
                ),
                "region3" => array(
                    "name" => "Battambang",
                    "latitude" => 13.0957,
                    "longitude" => 103.2022
                )
            ),
            "Kiribati" => array(
                "region1" => array(
                    "name" => "Tarawa",
                    "latitude" => 1.3278,
                    "longitude" => 172.9767
                ),
                "region2" => array(
                    "name" => "Christmas Island",
                    "latitude" => 1.9805,
                    "longitude" => -157.3282
                ),
                "region3" => array(
                    "name" => "Banaba",
                    "latitude" => -0.8777,
                    "longitude" => 169.5422
                )
            ),
            "Comoros" => array(
                "region1" => array(
                    "name" => "Moroni",
                    "latitude" => -11.7172,
                    "longitude" => 43.2479
                ),
                "region2" => array(
                    "name" => "Mutsamudu",
                    "latitude" => -12.1667,
                    "longitude" => 44.3994
                ),
                "region3" => array(
                    "name" => "Fomboni",
                    "latitude" => -12.2806,
                    "longitude" => 43.7447
                )
            ),
            "Saint Kitts and Nevis" => array(
                "region1" => array(
                    "name" => "Basseterre",
                    "latitude" => 17.3026,
                    "longitude" => -62.7177
                ),
                "region2" => array(
                    "name" => "Charlestown",
                    "latitude" => 17.1376,
                    "longitude" => -62.6039
                ),
                "region3" => array(
                    "name" => "Cayon",
                    "latitude" => 17.3223,
                    "longitude" => -62.7603
                )
            ),
            "North Korea" => array(
                "region1" => array(
                    "name" => "Pyongyang",
                    "latitude" => 39.0392,
                    "longitude" => 125.7625
                ),
                "region2" => array(
                    "name" => "Hamhung",
                    "latitude" => 39.9167,
                    "longitude" => 127.5361
                ),
                "region3" => array(
                    "name" => "Chongjin",
                    "latitude" => 41.8000,
                    "longitude" => 129.7831
                )
            ),
            "South Korea" => array(
                "region1" => array(
                    "name" => "Seoul",
                    "latitude" => 37.5665,
                    "longitude" => 126.9780
                ),
                "region2" => array(
                    "name" => "Busan",
                    "latitude" => 35.1796,
                    "longitude" => 129.0756
                ),
                "region3" => array(
                    "name" => "Incheon",
                    "latitude" => 37.4563,
                    "longitude" => 126.7052
                )
            ),
            "Kuwait" => array(
                "region1" => array(
                    "name" => "Kuwait City",
                    "latitude" => 29.3759,
                    "longitude" => 47.9774
                ),
                "region2" => array(
                    "name" => "Jabriya",
                    "latitude" => 29.3261,
                    "longitude" => 48.0353
                ),
                "region3" => array(
                    "name" => "Mangaf",
                    "latitude" => 29.0911,
                    "longitude" => 48.1336
                )
            ),
            "Cayman Islands" => array(
                "region1" => array(
                    "name" => "George Town",
                    "latitude" => 19.3022,
                    "longitude" => -81.3867
                ),
                "region2" => array(
                    "name" => "West Bay",
                    "latitude" => 19.3667,
                    "longitude" => -81.4406
                ),
                "region3" => array(
                    "name" => "Bodden Town",
                    "latitude" => 19.2833,
                    "longitude" => -81.2500
                )
            ),
            "Kazakhstan" => array(
                "region1" => array(
                    "name" => "Astana",
                    "latitude" => 51.1694,
                    "longitude" => 71.4491
                ),
                "region2" => array(
                    "name" => "Almaty",
                    "latitude" => 43.2220,
                    "longitude" => 76.8512
                ),
                "region3" => array(
                    "name" => "Karagandy",
                    "latitude" => 49.8026,
                    "longitude" => 73.0877
                )
            ),
            "Laos" => array(
                "region1" => array(
                    "name" => "Vientiane",
                    "latitude" => 17.9757,
                    "longitude" => 102.6331
                ),
                "region2" => array(
                    "name" => "Luang Prabang",
                    "latitude" => 19.8833,
                    "longitude" => 102.1333
                ),
                "region3" => array(
                    "name" => "Pakse",
                    "latitude" => 15.1200,
                    "longitude" => 105.8019
                )
            ),
            "Lebanon" => array(
                "region1" => array(
                    "name" => "Beirut",
                    "latitude" => 33.8938,
                    "longitude" => 35.5018
                ),
                "region2" => array(
                    "name" => "Tripoli",
                    "latitude" => 34.4367,
                    "longitude" => 35.8497
                ),
                "region3" => array(
                    "name" => "Sidon",
                    "latitude" => 33.5621,
                    "longitude" => 35.3753
                )
            ),
            "Saint Lucia" => array(
                "region1" => array(
                    "name" => "Castries",
                    "latitude" => 14.0101,
                    "longitude" => -60.9875
                ),
                "region2" => array(
                    "name" => "Gros Islet",
                    "latitude" => 14.0746,
                    "longitude" => -60.9522
                ),
                "region3" => array(
                    "name" => "Vieux Fort",
                    "latitude" => 13.7317,
                    "longitude" => -60.9528
                )
            ),
            "Liechtenstein" => array(
                "region1" => array(
                    "name" => "Vaduz",
                    "latitude" => 47.1410,
                    "longitude" => 9.5215
                ),
                "region2" => array(
                    "name" => "Schaan",
                    "latitude" => 47.1667,
                    "longitude" => 9.5094
                ),
                "region3" => array(
                    "name" => "Triesen",
                    "latitude" => 47.0915,
                    "longitude" => 9.5253
                )
            ),
            "Sri Lanka" => array(
                "region1" => array(
                    "name" => "Colombo",
                    "latitude" => 6.9271,
                    "longitude" => 79.8612
                ),
                "region2" => array(
                    "name" => "Kandy",
                    "latitude" => 7.2906,
                    "longitude" => 80.6337
                ),
                "region3" => array(
                    "name" => "Galle",
                    "latitude" => 6.0326,
                    "longitude" => 80.2170
                )
            ),
            "Liberia" => array(
                "region1" => array(
                    "name" => "Monrovia",
                    "latitude" => 6.3005,
                    "longitude" => -10.7969
                ),
                "region2" => array(
                    "name" => "Gbarnga",
                    "latitude" => 6.9950,
                    "longitude" => -9.4722
                ),
                "region3" => array(
                    "name" => "Bensonville",
                    "latitude" => 6.4453,
                    "longitude" => -10.6141
                )
            ),
            "Lesotho" => array(
                "region1" => array(
                    "name" => "Maseru",
                    "latitude" => -29.3122,
                    "longitude" => 27.4789
                ),
                "region2" => array(
                    "name" => "Mafeteng",
                    "latitude" => -29.8232,
                    "longitude" => 27.2379
                ),
                "region3" => array(
                    "name" => "Leribe",
                    "latitude" => -28.8742,
                    "longitude" => 28.0426
                )
            ),
            "Lithuania" => array(
                "region1" => array(
                    "name" => "Vilnius",
                    "latitude" => 54.6872,
                    "longitude" => 25.2797
                ),
                "region2" => array(
                    "name" => "Kaunas",
                    "latitude" => 54.8985,
                    "longitude" => 23.9036
                ),
                "region3" => array(
                    "name" => "Klaipeda",
                    "latitude" => 55.7108,
                    "longitude" => 21.1329
                )
            ),
            "Luxembourg" => array(
                "region1" => array(
                    "name" => "Luxembourg City",
                    "latitude" => 49.6117,
                    "longitude" => 6.1319
                ),
                "region2" => array(
                    "name" => "Esch-sur-Alzette",
                    "latitude" => 49.4958,
                    "longitude" => 5.9806
                ),
                "region3" => array(
                    "name" => "Dudelange",
                    "latitude" => 49.4839,
                    "longitude" => 6.0806
                )
            ),
            "Latvia" => array(
                "region1" => array(
                    "name" => "Riga",
                    "latitude" => 56.9496,
                    "longitude" => 24.1052
                ),
                "region2" => array(
                    "name" => "Daugavpils",
                    "latitude" => 55.8754,
                    "longitude" => 26.5364
                ),
                "region3" => array(
                    "name" => "Liepaja",
                    "latitude" => 56.5178,
                    "longitude" => 21.0104
                )
            ),
            "Libya" => array(
                "region1" => array(
                    "name" => "Tripoli",
                    "latitude" => 32.8867,
                    "longitude" => 13.1900
                ),
                "region2" => array(
                    "name" => "Benghazi",
                    "latitude" => 32.1167,
                    "longitude" => 20.0667
                ),
                "region3" => array(
                    "name" => "Misrata",
                    "latitude" => 32.3744,
                    "longitude" => 15.0876
                )
            ),
            "Morocco" => array(
                "region1" => array(
                    "name" => "Rabat",
                    "latitude" => 34.0209,
                    "longitude" => -6.8411
                ),
                "region2" => array(
                    "name" => "Casablanca",
                    "latitude" => 33.5731,
                    "longitude" => -7.5898
                ),
                "region3" => array(
                    "name" => "Marrakech",
                    "latitude" => 31.6295,
                    "longitude" => -7.9811
                )
            ),
            "Monaco" => array(
                "region1" => array(
                    "name" => "Monaco",
                    "latitude" => 43.7319,
                    "longitude" => 7.4197
                ),
                "region2" => array(
                    "name" => "Monte Carlo",
                    "latitude" => 43.7405,
                    "longitude" => 7.4270
                ),
                "region3" => array(
                    "name" => "La Condamine",
                    "latitude" => 43.7347,
                    "longitude" => 7.4223
                )
            ),
            "Moldova" => array(
                "region1" => array(
                    "name" => "Chisinau",
                    "latitude" => 47.0105,
                    "longitude" => 28.8638
                ),
                "region2" => array(
                    "name" => "Tiraspol",
                    "latitude" => 46.8406,
                    "longitude" => 29.6339
                ),
                "region3" => array(
                    "name" => "Balti",
                    "latitude" => 47.7636,
                    "longitude" => 27.9195
                )
            ),
            "Montenegro" => array(
                "region1" => array(
                    "name" => "Podgorica",
                    "latitude" => 42.4426,
                    "longitude" => 19.2686
                ),
                "region2" => array(
                    "name" => "Niksic",
                    "latitude" => 42.7731,
                    "longitude" => 18.9447
                ),
                "region3" => array(
                    "name" => "Herceg Novi",
                    "latitude" => 42.4531,
                    "longitude" => 18.5375
                )
            ),
            "Madagascar" => array(
                "region1" => array(
                    "name" => "Antananarivo",
                    "latitude" => -18.8792,
                    "longitude" => 47.5079
                ),
                "region2" => array(
                    "name" => "Toamasina",
                    "latitude" => -18.1516,
                    "longitude" => 49.4029
                ),
                "region3" => array(
                    "name" => "Antsirabe",
                    "latitude" => -19.8743,
                    "longitude" => 47.0299
                )
            ),
            "Marshall Islands" => array(
                "region1" => array(
                    "name" => "Majuro",
                    "latitude" => 7.0897,
                    "longitude" => 171.3803
                ),
                "region2" => array(
                    "name" => "Ebeye",
                    "latitude" => 9.3900,
                    "longitude" => 167.4700
                ),
                "region3" => array(
                    "name" => "Wotje",
                    "latitude" => 9.4419,
                    "longitude" => 170.2072
                )
            ),
            "Macedonia [FYROM]" => array(
                "region1" => array(
                    "name" => "Skopje",
                    "latitude" => 41.9965,
                    "longitude" => 21.4314
                ),
                "region2" => array(
                    "name" => "Bitola",
                    "latitude" => 41.0306,
                    "longitude" => 21.3369
                ),
                "region3" => array(
                    "name" => "Ohrid",
                    "latitude" => 41.1172,
                    "longitude" => 20.8017
                )
            ),
            "Mali" => array(
                "region1" => array(
                    "name" => "Bamako",
                    "latitude" => 12.6392,
                    "longitude" => -8.0029
                ),
                "region2" => array(
                    "name" => "Sikasso",
                    "latitude" => 11.3192,
                    "longitude" => -5.6800
                ),
                "region3" => array(
                    "name" => "Timbuktu",
                    "latitude" => 16.7666,
                    "longitude" => -3.0026
                )
            ),
            "Myanmar [Burma]" => array(
                "region1" => array(
                    "name" => "Naypyidaw",
                    "latitude" => 19.7633,
                    "longitude" => 96.0785
                ),
                "region2" => array(
                    "name" => "Yangon",
                    "latitude" => 16.8661,
                    "longitude" => 96.1951
                ),
                "region3" => array(
                    "name" => "Mandalay",
                    "latitude" => 21.9750,
                    "longitude" => 96.0836
                )
            ),
            "Mongolia" => array(
                "region1" => array(
                    "name" => "Ulaanbaatar",
                    "latitude" => 47.9186,
                    "longitude" => 106.9175
                ),
                "region2" => array(
                    "name" => "Darkhan",
                    "latitude" => 49.4642,
                    "longitude" => 105.9744
                ),
                "region3" => array(
                    "name" => "Erdenet",
                    "latitude" => 49.0314,
                    "longitude" => 104.0777
                )
            ),
            "Macau" => array(
                "region1" => array(
                    "name" => "Macau",
                    "latitude" => 22.1987,
                    "longitude" => 113.5439
                ),
                "region2" => array(
                    "name" => "Taipa",
                    "latitude" => 22.1578,
                    "longitude" => 113.5602
                ),
                "region3" => array(
                    "name" => "Coloane",
                    "latitude" => 22.1221,
                    "longitude" => 113.5700
                )
            ),
            "Northern Mariana Islands" => array(
                "region1" => array(
                    "name" => "Saipan",
                    "latitude" => 15.2120,
                    "longitude" => 145.7546
                ),
                "region2" => array(
                    "name" => "Tinian",
                    "latitude" => 14.9967,
                    "longitude" => 145.6197
                ),
                "region3" => array(
                    "name" => "Rota",
                    "latitude" => 14.1667,
                    "longitude" => 145.1833
                )
            ),
            "Martinique" => array(
                "region1" => array(
                    "name" => "Fort-de-France",
                    "latitude" => 14.6104,
                    "longitude" => -61.0800
                ),
                "region2" => array(
                    "name" => "Le Lamentin",
                    "latitude" => 14.6091,
                    "longitude" => -61.0012
                ),
                "region3" => array(
                    "name" => "Sainte-Marie",
                    "latitude" => 14.8059,
                    "longitude" => -61.0495
                )
            ),
            "Mauritania" => array(
                "region1" => array(
                    "name" => "Nouakchott",
                    "latitude" => 18.0791,
                    "longitude" => -15.9663
                ),
                "region2" => array(
                    "name" => "Nouadhibou",
                    "latitude" => 20.9053,
                    "longitude" => -17.0426
                ),
                "region3" => array(
                    "name" => "Kaedi",
                    "latitude" => 16.1524,
                    "longitude" => -13.5070
                )
            ),
            "Montserrat" => array(
                "region1" => array(
                    "name" => "Plymouth",
                    "latitude" => 16.7056,
                    "longitude" => -62.2159
                ),
                "region2" => array(
                    "name" => "Brades",
                    "latitude" => 16.7916,
                    "longitude" => -62.2067
                ),
                "region3" => array(
                    "name" => "Little Bay",
                    "latitude" => 16.7925,
                    "longitude" => -62.2022
                )
            ),
            "Malta" => array(
                "region1" => array(
                    "name" => "Valletta",
                    "latitude" => 35.8989,
                    "longitude" => 14.5146
                ),
                "region2" => array(
                    "name" => "Birkirkara",
                    "latitude" => 35.8978,
                    "longitude" => 14.4611
                ),
                "region3" => array(
                    "name" => "Mosta",
                    "latitude" => 35.9094,
                    "longitude" => 14.4233
                )
            ),
            "Mauritius" => array(
                "region1" => array(
                    "name" => "Port Louis",
                    "latitude" => -20.1600,
                    "longitude" => 57.4989
                ),
                "region2" => array(
                    "name" => "Beau Bassin-Rose Hill",
                    "latitude" => -20.2264,
                    "longitude" => 57.4614
                ),
                "region3" => array(
                    "name" => "Vacoas-Phoenix",
                    "latitude" => -20.2981,
                    "longitude" => 57.4781
                )
            ),
            "Maldives" => array(
                "region1" => array(
                    "name" => "Male",
                    "latitude" => 4.1755,
                    "longitude" => 73.5093
                ),
                "region2" => array(
                    "name" => "Hithadhoo",
                    "latitude" => -0.6000,
                    "longitude" => 73.0833
                ),
                "region3" => array(
                    "name" => "Kulhudhuffushi",
                    "latitude" => 6.6228,
                    "longitude" => 73.0700
                )
            ),
            "Malawi" => array(
                "region1" => array(
                    "name" => "Lilongwe",
                    "latitude" => -13.9762,
                    "longitude" => 33.7741
                ),
                "region2" => array(
                    "name" => "Blantyre",
                    "latitude" => -15.7667,
                    "longitude" => 35.0167
                ),
                "region3" => array(
                    "name" => "Mzuzu",
                    "latitude" => -11.4653,
                    "longitude" => 34.0209
                )
            ),
            "Mexico" => array(
                "region1" => array(
                    "name" => "Mexico City",
                    "latitude" => 19.4326,
                    "longitude" => -99.1332
                ),
                "region2" => array(
                    "name" => "Cancun",
                    "latitude" => 21.1619,
                    "longitude" => -86.8515
                ),
                "region3" => array(
                    "name" => "Guadalajara",
                    "latitude" => 20.6597,
                    "longitude" => -103.3496
                )
            ),
            "Malaysia" => array(
                "region1" => array(
                    "name" => "Kuala Lumpur",
                    "latitude" => 3.1390,
                    "longitude" => 101.6869
                ),
                "region2" => array(
                    "name" => "Penang",
                    "latitude" => 5.4164,
                    "longitude" => 100.3327
                ),
                "region3" => array(
                    "name" => "Johor Bahru",
                    "latitude" => 1.4927,
                    "longitude" => 103.7414
                )
            ),
            "Mozambique" => array(
                "region1" => array(
                    "name" => "Maputo",
                    "latitude" => -25.9667,
                    "longitude" => 32.5833
                ),
                "region2" => array(
                    "name" => "Beira",
                    "latitude" => -19.8436,
                    "longitude" => 34.8389
                ),
                "region3" => array(
                    "name" => "Nampula",
                    "latitude" => -15.1197,
                    "longitude" => 39.2647
                )
            ),
            "Namibia" => array(
                "region1" => array(
                    "name" => "Windhoek",
                    "latitude" => -22.5597,
                    "longitude" => 17.0832
                ),
                "region2" => array(
                    "name" => "Swakopmund",
                    "latitude" => -22.6792,
                    "longitude" => 14.5272
                ),
                "region3" => array(
                    "name" => "Walvis Bay",
                    "latitude" => -22.9583,
                    "longitude" => 14.5053
                )
            ),
            "New Caledonia" => array(
                "region1" => array(
                    "name" => "Noumea",
                    "latitude" => -22.2747,
                    "longitude" => 166.4250
                ),
                "region2" => array(
                    "name" => "Mont-Dore",
                    "latitude" => -22.2539,
                    "longitude" => 166.4939
                ),
                "region3" => array(
                    "name" => "Dumbéa",
                    "latitude" => -22.1417,
                    "longitude" => 166.4722
                )
            ),
            "Niger" => array(
                "region1" => array(
                    "name" => "Niamey",
                    "latitude" => 13.5127,
                    "longitude" => 2.1128
                ),
                "region2" => array(
                    "name" => "Zinder",
                    "latitude" => 13.8011,
                    "longitude" => 8.9844
                ),
                "region3" => array(
                    "name" => "Maradi",
                    "latitude" => 13.4917,
                    "longitude" => 7.0969
                )
            ),
            "Norfolk Island" => array(
                "region1" => array(
                    "name" => "Kingston",
                    "latitude" => -29.0564,
                    "longitude" => 167.9616
                ),
                "region2" => array(
                    "name" => "Burnt Pine",
                    "latitude" => -29.0467,
                    "longitude" => 167.9542
                ),
                "region3" => array(
                    "name" => "Cascade",
                    "latitude" => -29.0528,
                    "longitude" => 167.9617
                )
            ),
            "Nigeria" => array(
                "region1" => array(
                    "name" => "Lagos",
                    "latitude" => 6.5244,
                    "longitude" => 3.3792
                ),
                "region2" => array(
                    "name" => "Abuja",
                    "latitude" => 9.0579,
                    "longitude" => 7.4951
                ),
                "region3" => array(
                    "name" => "Kano",
                    "latitude" => 12.0024,
                    "longitude" => 8.5132
                )
            ),
            "Nicaragua" => array(
                "region1" => array(
                    "name" => "Managua",
                    "latitude" => 12.1140,
                    "longitude" => -86.2362
                ),
                "region2" => array(
                    "name" => "León",
                    "latitude" => 12.5092,
                    "longitude" => -86.6611
                ),
                "region3" => array(
                    "name" => "Masaya",
                    "latitude" => 11.9680,
                    "longitude" => -86.0949
                )
            ),
            "Netherlands" => array(
                "region1" => array(
                    "name" => "Amsterdam",
                    "latitude" => 52.3676,
                    "longitude" => 4.9041
                ),
                "region2" => array(
                    "name" => "Rotterdam",
                    "latitude" => 51.9225,
                    "longitude" => 4.47917
                ),
                "region3" => array(
                    "name" => "The Hague",
                    "latitude" => 52.0705,
                    "longitude" => 4.3007
                )
            ),
            "Norway" => array(
                "region1" => array(
                    "name" => "Oslo",
                    "latitude" => 59.9139,
                    "longitude" => 10.7522
                ),
                "region2" => array(
                    "name" => "Bergen",
                    "latitude" => 60.3913,
                    "longitude" => 5.3221
                ),
                "region3" => array(
                    "name" => "Trondheim",
                    "latitude" => 63.4305,
                    "longitude" => 10.3951
                )
            ),
            "Nepal" => array(
                "region1" => array(
                    "name" => "Kathmandu",
                    "latitude" => 27.7172,
                    "longitude" => 85.3240
                ),
                "region2" => array(
                    "name" => "Pokhara",
                    "latitude" => 28.2096,
                    "longitude" => 83.9856
                ),
                "region3" => array(
                    "name" => "Biratnagar",
                    "latitude" => 26.4574,
                    "longitude" => 87.2696
                )
            ),
            "Nauru" => array(
                "region1" => array(
                    "name" => "Yaren",
                    "latitude" => -0.5467,
                    "longitude" => 166.9186
                ),
                "region2" => array(
                    "name" => "Aiwo",
                    "latitude" => -0.5403,
                    "longitude" => 166.9114
                ),
                "region3" => array(
                    "name" => "Meneng",
                    "latitude" => -0.5389,
                    "longitude" => 166.9412
                )
            ),
            "Niue" => array(
                "region1" => array(
                    "name" => "Alofi",
                    "latitude" => -19.0595,
                    "longitude" => -169.9187
                ),
                "region2" => array(
                    "name" => "Avatele",
                    "latitude" => -19.0950,
                    "longitude" => -169.8822
                ),
                "region3" => array(
                    "name" => "Hikutavake",
                    "latitude" => -19.0400,
                    "longitude" => -169.8478
                )
            ),
            "New Zealand" => array(
                "region1" => array(
                    "name" => "Auckland",
                    "latitude" => -36.8485,
                    "longitude" => 174.7633
                ),
                "region2" => array(
                    "name" => "Wellington",
                    "latitude" => -41.2865,
                    "longitude" => 174.7762
                ),
                "region3" => array(
                    "name" => "Christchurch",
                    "latitude" => -43.5321,
                    "longitude" => 172.6362
                )
            ),
            "Oman" => array(
                "region1" => array(
                    "name" => "Muscat",
                    "latitude" => 23.6105,
                    "longitude" => 58.5400
                ),
                "region2" => array(
                    "name" => "Salalah",
                    "latitude" => 17.0157,
                    "longitude" => 54.0924
                ),
                "region3" => array(
                    "name" => "Sohar",
                    "latitude" => 24.3620,
                    "longitude" => 56.7468
                )
            ),
            "Panama" => array(
                "region1" => array(
                    "name" => "Panama City",
                    "latitude" => 8.9833,
                    "longitude" => -79.5167
                ),
                "region2" => array(
                    "name" => "Colon",
                    "latitude" => 9.3592,
                    "longitude" => -79.9014
                ),
                "region3" => array(
                    "name" => "David",
                    "latitude" => 8.4226,
                    "longitude" => -82.4304
                )
            ),
            "Peru" => array(
                "region1" => array(
                    "name" => "Lima",
                    "latitude" => -12.0464,
                    "longitude" => -77.0428
                ),
                "region2" => array(
                    "name" => "Cusco",
                    "latitude" => -13.5319,
                    "longitude" => -71.9675
                ),
                "region3" => array(
                    "name" => "Arequipa",
                    "latitude" => -16.4090,
                    "longitude" => -71.5375
                )
            ),
            "French Polynesia" => array(
                "region1" => array(
                    "name" => "Papeete",
                    "latitude" => -17.5350,
                    "longitude" => -149.5667
                ),
                "region2" => array(
                    "name" => "Faaa",
                    "latitude" => -17.5494,
                    "longitude" => -149.6072
                ),
                "region3" => array(
                    "name" => "Punaauia",
                    "latitude" => -17.6286,
                    "longitude" => -149.6127
                )
            ),
            "Papua New Guinea" => array(
                "region1" => array(
                    "name" => "Port Moresby",
                    "latitude" => -9.4438,
                    "longitude" => 147.1803
                ),
                "region2" => array(
                    "name" => "Lae",
                    "latitude" => -6.7221,
                    "longitude" => 146.9906
                ),
                "region3" => array(
                    "name" => "Mount Hagen",
                    "latitude" => -5.8552,
                    "longitude" => 144.2185
                )
            ),
            "Philippines" => array(
                "region1" => array(
                    "name" => "Manila",
                    "latitude" => 14.5995,
                    "longitude" => 120.9842
                ),
                "region2" => array(
                    "name" => "Cebu City",
                    "latitude" => 10.3157,
                    "longitude" => 123.8854
                ),
                "region3" => array(
                    "name" => "Davao City",
                    "latitude" => 7.1907,
                    "longitude" => 125.4553
                )
            ),
            "Pakistan" => array(
                "region1" => array(
                    "name" => "Karachi",
                    "latitude" => 24.8615,
                    "longitude" => 67.0099
                ),
                "region2" => array(
                    "name" => "Lahore",
                    "latitude" => 31.5204,
                    "longitude" => 74.3587
                ),
                "region3" => array(
                    "name" => "Islamabad",
                    "latitude" => 33.6844,
                    "longitude" => 73.0479
                )
            ),
            "Poland" => array(
                "region1" => array(
                    "name" => "Warsaw",
                    "latitude" => 52.2297,
                    "longitude" => 21.0122
                ),
                "region2" => array(
                    "name" => "Kraków",
                    "latitude" => 50.0647,
                    "longitude" => 19.9450
                ),
                "region3" => array(
                    "name" => "Wrocław",
                    "latitude" => 51.1079,
                    "longitude" => 17.0385
                )
            ),
            "Saint Pierre and Miquelon" => array(
                "region1" => array(
                    "name" => "Saint-Pierre",
                    "latitude" => 46.7791,
                    "longitude" => -56.1779
                ),
                "region2" => array(
                    "name" => "Miquelon",
                    "latitude" => 47.0963,
                    "longitude" => -56.3816
                ),
                "region3" => array(
                    "name" => "Langlade",
                    "latitude" => 47.9075,
                    "longitude" => -56.3025
                )
            ),
            "Pitcairn Islands" => array(
                "region1" => array(
                    "name" => "Adamstown",
                    "latitude" => -25.0661,
                    "longitude" => -130.1000
                ),
                "region2" => array(
                    "name" => "Henderson",
                    "latitude" => -24.3500,
                    "longitude" => -128.3167
                ),
                "region3" => array(
                    "name" => "Ducie",
                    "latitude" => -24.7000,
                    "longitude" => -124.8000
                )
            ),
            "Puerto Rico" => array(
                "region1" => array(
                    "name" => "San Juan",
                    "latitude" => 18.4655,
                    "longitude" => -66.1057
                ),
                "region2" => array(
                    "name" => "Bayamón",
                    "latitude" => 18.3983,
                    "longitude" => -66.1558
                ),
                "region3" => array(
                    "name" => "Ponce",
                    "latitude" => 18.0111,
                    "longitude" => -66.6141
                )
            ),
            "Palestinian Territories" => array(
                "region1" => array(
                    "name" => "Ramallah",
                    "latitude" => 31.9067,
                    "longitude" => 35.2065
                ),
                "region2" => array(
                    "name" => "Gaza City",
                    "latitude" => 31.5017,
                    "longitude" => 34.4668
                ),
                "region3" => array(
                    "name" => "Hebron",
                    "latitude" => 31.5325,
                    "longitude" => 35.1003
                )
            ),
            "Portugal" => array(
                "region1" => array(
                    "name" => "Lisbon",
                    "latitude" => 38.7223,
                    "longitude" => -9.1393
                ),
                "region2" => array(
                    "name" => "Porto",
                    "latitude" => 41.1496,
                    "longitude" => -8.6109
                ),
                "region3" => array(
                    "name" => "Faro",
                    "latitude" => 37.0194,
                    "longitude" => -7.9322
                )
            ),
            "Palau" => array(
                "region1" => array(
                    "name" => "Ngerulmud",
                    "latitude" => 7.5000,
                    "longitude" => 134.6242
                ),
                "region2" => array(
                    "name" => "Koror",
                    "latitude" => 7.3381,
                    "longitude" => 134.4691
                ),
                "region3" => array(
                    "name" => "Peleliu",
                    "latitude" => 7.0076,
                    "longitude" => 134.2536
                )
            ),
            "Paraguay" => array(
                "region1" => array(
                    "name" => "Asunción",
                    "latitude" => -25.2637,
                    "longitude" => -57.5759
                ),
                "region2" => array(
                    "name" => "Ciudad del Este",
                    "latitude" => -25.5167,
                    "longitude" => -54.6167
                ),
                "region3" => array(
                    "name" => "San Lorenzo",
                    "latitude" => -25.3333,
                    "longitude" => -57.5333
                )
            ),
            "Qatar" => array(
                "region1" => array(
                    "name" => "Doha",
                    "latitude" => 25.2867,
                    "longitude" => 51.5333
                ),
                "region2" => array(
                    "name" => "Al Rayyan",
                    "latitude" => 25.2919,
                    "longitude" => 51.4244
                ),
                "region3" => array(
                    "name" => "Umm Salal",
                    "latitude" => 25.4305,
                    "longitude" => 51.4488
                )
            ),
            "Réunion" => array(
                "region1" => array(
                    "name" => "Saint-Denis",
                    "latitude" => -20.8789,
                    "longitude" => 55.4486
                ),
                "region2" => array(
                    "name" => "Saint-Paul",
                    "latitude" => -21.0096,
                    "longitude" => 55.2707
                ),
                "region3" => array(
                    "name" => "Saint-Pierre",
                    "latitude" => -21.3392,
                    "longitude" => 55.4778
                )
            ),
            "Romania" => array(
                "region1" => array(
                    "name" => "Bucharest",
                    "latitude" => 44.4268,
                    "longitude" => 26.1025
                ),
                "region2" => array(
                    "name" => "Cluj-Napoca",
                    "latitude" => 46.7712,
                    "longitude" => 23.6236
                ),
                "region3" => array(
                    "name" => "Timișoara",
                    "latitude" => 45.7489,
                    "longitude" => 21.2087
                )
            ),
            "Serbia" => array(
                "region1" => array(
                    "name" => "Belgrade",
                    "latitude" => 44.7866,
                    "longitude" => 20.4489
                ),
                "region2" => array(
                    "name" => "Novi Sad",
                    "latitude" => 45.2671,
                    "longitude" => 19.8335
                ),
                "region3" => array(
                    "name" => "Niš",
                    "latitude" => 43.3194,
                    "longitude" => 21.8963
                )
            ),
            "Russia" => array(
                "region1" => array(
                    "name" => "Moscow",
                    "latitude" => 55.7512,
                    "longitude" => 37.6184
                ),
                "region2" => array(
                    "name" => "Saint Petersburg",
                    "latitude" => 59.9343,
                    "longitude" => 30.3351
                ),
                "region3" => array(
                    "name" => "Novosibirsk",
                    "latitude" => 55.0084,
                    "longitude" => 82.9357
                )
            ),
            "Rwanda" => array(
                "region1" => array(
                    "name" => "Kigali",
                    "latitude" => -1.9706,
                    "longitude" => 30.1044
                ),
                "region2" => array(
                    "name" => "Butare",
                    "latitude" => -2.6051,
                    "longitude" => 29.7390
                ),
                "region3" => array(
                    "name" => "Gitarama",
                    "latitude" => -2.0733,
                    "longitude" => 29.7561
                )
            ),
            "Saudi Arabia" => array(
                "region1" => array(
                    "name" => "Riyadh",
                    "latitude" => 24.7136,
                    "longitude" => 46.6753
                ),
                "region2" => array(
                    "name" => "Jeddah",
                    "latitude" => 21.5433,
                    "longitude" => 39.1728
                ),
                "region3" => array(
                    "name" => "Mecca",
                    "latitude" => 21.3891,
                    "longitude" => 39.8579
                )
            ),
            "Solomon Islands" => array(
                "region1" => array(
                    "name" => "Honiara",
                    "latitude" => -9.4438,
                    "longitude" => 159.9490
                ),
                "region2" => array(
                    "name" => "Auki",
                    "latitude" => -8.7674,
                    "longitude" => 160.7049
                ),
                "region3" => array(
                    "name" => "Gizo",
                    "latitude" => -8.1059,
                    "longitude" => 156.8419
                )
            ),
            "Seychelles" => array(
                "region1" => array(
                    "name" => "Victoria",
                    "latitude" => -4.6182,
                    "longitude" => 55.4513
                ),
                "region2" => array(
                    "name" => "Anse Boileau",
                    "latitude" => -4.7325,
                    "longitude" => 55.5060
                ),
                "region3" => array(
                    "name" => "Bel Ombre",
                    "latitude" => -4.6073,
                    "longitude" => 55.4445
                )
            ),
            "Sudan" => array(
                "region1" => array(
                    "name" => "Khartoum",
                    "latitude" => 15.5007,
                    "longitude" => 32.5599
                ),
                "region2" => array(
                    "name" => "Omdurman",
                    "latitude" => 15.6312,
                    "longitude" => 32.5341
                ),
                "region3" => array(
                    "name" => "Port Sudan",
                    "latitude" => 19.5906,
                    "longitude" => 37.2191
                )
            ),
            "Sweden" => array(
                "region1" => array(
                    "name" => "Stockholm",
                    "latitude" => 59.3293,
                    "longitude" => 18.0686
                ),
                "region2" => array(
                    "name" => "Gothenburg",
                    "latitude" => 57.7089,
                    "longitude" => 11.9746
                ),
                "region3" => array(
                    "name" => "Malmö",
                    "latitude" => 55.6049,
                    "longitude" => 13.0038
                )
            ),
            "Singapore" => array(
                "region1" => array(
                    "name" => "Singapore City",
                    "latitude" => 1.3521,
                    "longitude" => 103.8198
                ),
                "region2" => array(
                    "name" => "Jurong West",
                    "latitude" => 1.3392,
                    "longitude" => 103.7073
                ),
                "region3" => array(
                    "name" => "Tampines",
                    "latitude" => 1.3546,
                    "longitude" => 103.9439
                )
            ),
            "Saint Helena" => array(
                "region1" => array(
                    "name" => "Jamestown",
                    "latitude" => -15.9380,
                    "longitude" => -5.7168
                ),
                "region2" => array(
                    "name" => "Longwood",
                    "latitude" => -15.9551,
                    "longitude" => -5.7008
                ),
                "region3" => array(
                    "name" => "Half Tree Hollow",
                    "latitude" => -15.9524,
                    "longitude" => -5.7035
                )
            ),
            "Slovenia" => array(
                "region1" => array(
                    "name" => "Ljubljana",
                    "latitude" => 46.0569,
                    "longitude" => 14.5058
                ),
                "region2" => array(
                    "name" => "Maribor",
                    "latitude" => 46.5547,
                    "longitude" => 15.6466
                ),
                "region3" => array(
                    "name" => "Celje",
                    "latitude" => 46.2312,
                    "longitude" => 15.2600
                )
            ),
            "Svalbard and Jan Mayen" => array(
                "region1" => array(
                    "name" => "Longyearbyen",
                    "latitude" => 78.2232,
                    "longitude" => 15.6267
                ),
                "region2" => array(
                    "name" => "Barentsburg",
                    "latitude" => 78.0648,
                    "longitude" => 14.2321
                ),
                "region3" => array(
                    "name" => "Ny-Ålesund",
                    "latitude" => 78.9270,
                    "longitude" => 11.9388
                )
            ),
            "Slovakia" => array(
                "region1" => array(
                    "name" => "Bratislava",
                    "latitude" => 48.1486,
                    "longitude" => 17.1077
                ),
                "region2" => array(
                    "name" => "Košice",
                    "latitude" => 48.7164,
                    "longitude" => 21.2611
                ),
                "region3" => array(
                    "name" => "Prešov",
                    "latitude" => 48.9973,
                    "longitude" => 21.2330
                )
            ),
            "Sierra Leone" => array(
                "region1" => array(
                    "name" => "Freetown",
                    "latitude" => 8.4653,
                    "longitude" => -13.2317
                ),
                "region2" => array(
                    "name" => "Bo",
                    "latitude" => 7.9644,
                    "longitude" => -11.7386
                ),
                "region3" => array(
                    "name" => "Kenema",
                    "latitude" => 7.8788,
                    "longitude" => -11.1876
                )
            ),
            "San Marino" => array(
                "region1" => array(
                    "name" => "City of San Marino",
                    "latitude" => 43.9424,
                    "longitude" => 12.4578
                ),
                "region2" => array(
                    "name" => "Borgo Maggiore",
                    "latitude" => 43.9336,
                    "longitude" => 12.4485
                ),
                "region3" => array(
                    "name" => "Serravalle",
                    "latitude" => 43.9606,
                    "longitude" => 12.4572
                )
            ),
            "Senegal" => array(
                "region1" => array(
                    "name" => "Dakar",
                    "latitude" => 14.7167,
                    "longitude" => -17.4677
                ),
                "region2" => array(
                    "name" => "Thiès",
                    "latitude" => 14.7966,
                    "longitude" => -16.9260
                ),
                "region3" => array(
                    "name" => "Kaolack",
                    "latitude" => 14.1490,
                    "longitude" => -16.0727
                )
            ),
            "Somalia" => array(
                "region1" => array(
                    "name" => "Mogadishu",
                    "latitude" => 2.0469,
                    "longitude" => 45.3182
                ),
                "region2" => array(
                    "name" => "Hargeisa",
                    "latitude" => 9.5593,
                    "longitude" => 44.0649
                ),
                "region3" => array(
                    "name" => "Bosaso",
                    "latitude" => 11.2842,
                    "longitude" => 49.1816
                )
            ),
            "Suriname" => array(
                "region1" => array(
                    "name" => "Paramaribo",
                    "latitude" => 5.8520,
                    "longitude" => -55.2038
                ),
                "region2" => array(
                    "name" => "Lelydorp",
                    "latitude" => 5.6987,
                    "longitude" => -55.2290
                ),
                "region3" => array(
                    "name" => "Nieuw Nickerie",
                    "latitude" => 5.9503,
                    "longitude" => -56.9894
                )
            ),
            "São Tomé and Príncipe" => array(
                "region1" => array(
                    "name" => "São Tomé",
                    "latitude" => 0.1864,
                    "longitude" => 6.6131
                ),
                "region2" => array(
                    "name" => "Trindade",
                    "latitude" => 0.2971,
                    "longitude" => 6.6464
                ),
                "region3" => array(
                    "name" => "Neves",
                    "latitude" => 0.3586,
                    "longitude" => 6.6797
                )
            ),
            "El Salvador" => array(
                "region1" => array(
                    "name" => "San Salvador",
                    "latitude" => 13.6929,
                    "longitude" => -89.2182
                ),
                "region2" => array(
                    "name" => "Santa Ana",
                    "latitude" => 13.9940,
                    "longitude" => -89.5590
                ),
                "region3" => array(
                    "name" => "San Miguel",
                    "latitude" => 13.4836,
                    "longitude" => -88.1786
                )
            ),
            "Syria" => array(
                "region1" => array(
                    "name" => "Damascus",
                    "latitude" => 33.5138,
                    "longitude" => 36.2765
                ),
                "region2" => array(
                    "name" => "Aleppo",
                    "latitude" => 36.2021,
                    "longitude" => 37.1343
                ),
                "region3" => array(
                    "name" => "Homs",
                    "latitude" => 34.7326,
                    "longitude" => 36.7136
                )
            ),
            "Swaziland" => array(
                "region1" => array(
                    "name" => "Mbabane",
                    "latitude" => -26.3054,
                    "longitude" => 31.1367
                ),
                "region2" => array(
                    "name" => "Manzini",
                    "latitude" => -26.4959,
                    "longitude" => 31.3883
                ),
                "region3" => array(
                    "name" => "Big Bend",
                    "latitude" => -26.8149,
                    "longitude" => 31.9433
                )
            ),
            "Turks and Caicos Islands" => array(
                "region1" => array(
                    "name" => "Cockburn Town",
                    "latitude" => 21.4675,
                    "longitude" => -71.1389
                ),
                "region2" => array(
                    "name" => "South Caicos",
                    "latitude" => 21.5175,
                    "longitude" => -71.5292
                ),
                "region3" => array(
                    "name" => "Grand Turk",
                    "latitude" => 21.4636,
                    "longitude" => -71.1336
                )
            ),
            "Chad" => array(
                "region1" => array(
                    "name" => "N'Djamena",
                    "latitude" => 12.1340,
                    "longitude" => 15.0557
                ),
                "region2" => array(
                    "name" => "Moundou",
                    "latitude" => 8.5654,
                    "longitude" => 16.0803
                ),
                "region3" => array(
                    "name" => "Sarh",
                    "latitude" => 9.1434,
                    "longitude" => 18.3923
                )
            ),
            "French Southern Territories" => array(
                "region1" => array(
                    "name" => "Port-aux-Français",
                    "latitude" => -49.3474,
                    "longitude" => 70.2197
                ),
                "region2" => array(
                    "name" => "Île Amsterdam",
                    "latitude" => -37.8333,
                    "longitude" => 77.5667
                ),
                "region3" => array(
                    "name" => "Île Saint-Paul",
                    "latitude" => -38.7200,
                    "longitude" => 77.5356
                )
            ),
            "Togo" => array(
                "region1" => array(
                    "name" => "Lomé",
                    "latitude" => 6.1378,
                    "longitude" => 1.2124
                ),
                "region2" => array(
                    "name" => "Sokodé",
                    "latitude" => 8.9833,
                    "longitude" => 1.1333
                ),
                "region3" => array(
                    "name" => "Kara",
                    "latitude" => 9.5511,
                    "longitude" => 1.1861
                )
            ),
            "Thailand" => array(
                "region1" => array(
                    "name" => "Bangkok",
                    "latitude" => 13.7563,
                    "longitude" => 100.5018
                ),
                "region2" => array(
                    "name" => "Chiang Mai",
                    "latitude" => 18.7883,
                    "longitude" => 98.9856
                ),
                "region3" => array(
                    "name" => "Phuket",
                    "latitude" => 7.8804,
                    "longitude" => 98.3923
                )
            ),
            "Tajikistan" => array(
                "region1" => array(
                    "name" => "Dushanbe",
                    "latitude" => 38.5737,
                    "longitude" => 68.7738
                ),
                "region2" => array(
                    "name" => "Khujand",
                    "latitude" => 40.2842,
                    "longitude" => 69.6340
                ),
                "region3" => array(
                    "name" => "Kulyab",
                    "latitude" => 37.9997,
                    "longitude" => 69.7989
                )
            ),
            "Tokelau" => array(
                "region1" => array(
                    "name" => "Fakaofo",
                    "latitude" => -9.3811,
                    "longitude" => -171.2394
                ),
                "region2" => array(
                    "name" => "Nukunonu",
                    "latitude" => -9.2027,
                    "longitude" => -171.8233
                ),
                "region3" => array(
                    "name" => "Atafu",
                    "latitude" => -9.5611,
                    "longitude" => -172.4146
                )
            ),
            "Timor-Leste" => array(
                "region1" => array(
                    "name" => "Dili",
                    "latitude" => -8.5569,
                    "longitude" => 125.5600
                ),
                "region2" => array(
                    "name" => "Baucau",
                    "latitude" => -8.4683,
                    "longitude" => 126.4499
                ),
                "region3" => array(
                    "name" => "Maliana",
                    "latitude" => -8.9936,
                    "longitude" => 125.2216
                )
            ),
            "Turkmenistan" => array(
                "region1" => array(
                    "name" => "Ashgabat",
                    "latitude" => 37.9601,
                    "longitude" => 58.3261
                ),
                "region2" => array(
                    "name" => "Turkmenabat",
                    "latitude" => 39.0732,
                    "longitude" => 63.5772
                ),
                "region3" => array(
                    "name" => "Daşoguz",
                    "latitude" => 41.8390,
                    "longitude" => 59.9256
                )
            ),
            "Tunisia" => array(
                "region1" => array(
                    "name" => "Tunis",
                    "latitude" => 36.8065,
                    "longitude" => 10.1815
                ),
                "region2" => array(
                    "name" => "Sfax",
                    "latitude" => 34.7391,
                    "longitude" => 10.7604
                ),
                "region3" => array(
                    "name" => "Sousse",
                    "latitude" => 35.8292,
                    "longitude" => 10.6370
                )
            ),
            "Tonga" => array(
                "region1" => array(
                    "name" => "Nukuʻalofa",
                    "latitude" => -21.1360,
                    "longitude" => -175.2160
                ),
                "region2" => array(
                    "name" => "Neiafu",
                    "latitude" => -18.6500,
                    "longitude" => -173.9833
                ),
                "region3" => array(
                    "name" => "Haveluloto",
                    "latitude" => -21.2000,
                    "longitude" => -175.1333
                )
            ),
            "Turkey" => array(
                "region1" => array(
                    "name" => "Ankara",
                    "latitude" => 39.9334,
                    "longitude" => 32.8597
                ),
                "region2" => array(
                    "name" => "Istanbul",
                    "latitude" => 41.0082,
                    "longitude" => 28.9784
                ),
                "region3" => array(
                    "name" => "Izmir",
                    "latitude" => 38.4192,
                    "longitude" => 27.1287
                )
            ),
            "Trinidad and Tobago" => array(
                "region1" => array(
                    "name" => "Port of Spain",
                    "latitude" => 10.6596,
                    "longitude" => -61.4789
                ),
                "region2" => array(
                    "name" => "Chaguanas",
                    "latitude" => 10.5167,
                    "longitude" => -61.4167
                ),
                "region3" => array(
                    "name" => "San Fernando",
                    "latitude" => 10.2803,
                    "longitude" => -61.4547
                )
            ),
            "Tuvalu" => array(
                "region1" => array(
                    "name" => "Funafuti",
                    "latitude" => -8.5219,
                    "longitude" => 179.1962
                ),
                "region2" => array(
                    "name" => "Fongafale",
                    "latitude" => -8.5167,
                    "longitude" => 179.2167
                ),
                "region3" => array(
                    "name" => "Nanumanga",
                    "latitude" => -6.2833,
                    "longitude" => 176.3500
                )
            ),
            "Taiwan" => array(
                "region1" => array(
                    "name" => "Taipei",
                    "latitude" => 25.0330,
                    "longitude" => 121.5654
                ),
                "region2" => array(
                    "name" => "Kaohsiung",
                    "latitude" => 22.6273,
                    "longitude" => 120.3014
                ),
                "region3" => array(
                    "name" => "Taichung",
                    "latitude" => 24.1477,
                    "longitude" => 120.6736
                )
            ),
            "Tanzania" => array(
                "region1" => array(
                    "name" => "Dodoma",
                    "latitude" => -6.1670,
                    "longitude" => 35.7497
                ),
                "region2" => array(
                    "name" => "Dar es Salaam",
                    "latitude" => -6.7924,
                    "longitude" => 39.2083
                ),
                "region3" => array(
                    "name" => "Mwanza",
                    "latitude" => -2.5164,
                    "longitude" => 32.9090
                )
            ),
            "Ukraine" => array(
                "region1" => array(
                    "name" => "Kyiv",
                    "latitude" => 50.4501,
                    "longitude" => 30.5234
                ),
                "region2" => array(
                    "name" => "Kharkiv",
                    "latitude" => 49.9935,
                    "longitude" => 36.2304
                ),
                "region3" => array(
                    "name" => "Odessa",
                    "latitude" => 46.4694,
                    "longitude" => 30.7409
                )
            ),
            "Uganda" => array(
                "region1" => array(
                    "name" => "Kampala",
                    "latitude" => 0.3476,
                    "longitude" => 32.5825
                ),
                "region2" => array(
                    "name" => "Jinja",
                    "latitude" => 0.4244,
                    "longitude" => 33.2041
                ),
                "region3" => array(
                    "name" => "Gulu",
                    "latitude" => 2.7797,
                    "longitude" => 32.2821
                )
            ),
            "U.S. Minor Outlying Islands" => array(
                "region1" => array(
                    "name" => "Johnston Atoll",
                    "latitude" => 16.7290,
                    "longitude" => -169.5350
                ),
                "region2" => array(
                    "name" => "Midway Atoll",
                    "latitude" => 28.2014,
                    "longitude" => -177.3816
                ),
                "region3" => array(
                    "name" => "Wake Island",
                    "latitude" => 19.2911,
                    "longitude" => 166.6183
                )
            ),
            "United States" => array(
                "region1" => array(
                    "name" => "New York",
                    "latitude" => 40.7128,
                    "longitude" => -74.0060
                ),
                "region2" => array(
                    "name" => "Los Angeles",
                    "latitude" => 34.0522,
                    "longitude" => -118.2437
                ),
                "region3" => array(
                    "name" => "Chicago",
                    "latitude" => 41.8781,
                    "longitude" => -87.6298
                )
            ),
            "Uruguay" => array(
                "region1" => array(
                    "name" => "Montevideo",
                    "latitude" => -34.9011,
                    "longitude" => -56.1645
                ),
                "region2" => array(
                    "name" => "Salto",
                    "latitude" => -31.3896,
                    "longitude" => -57.9616
                ),
                "region3" => array(
                    "name" => "Paysandú",
                    "latitude" => -32.3214,
                    "longitude" => -58.0756
                )
            ),
            "Uzbekistan" => array(
                "region1" => array(
                    "name" => "Tashkent",
                    "latitude" => 41.2995,
                    "longitude" => 69.2401
                ),
                "region2" => array(
                    "name" => "Samarkand",
                    "latitude" => 39.6270,
                    "longitude" => 66.9749
                ),
                "region3" => array(
                    "name" => "Bukhara",
                    "latitude" => 39.7686,
                    "longitude" => 64.4556
                )
            ),
            "Vatican City" => array(
                "region1" => array(
                    "name" => "Vatican City",
                    "latitude" => 41.9029,
                    "longitude" => 12.4534
                ),
                "region2" => array(
                    "name" => "N/A",
                    "latitude" => null,
                    "longitude" => null
                ),
                "region3" => array(
                    "name" => "N/A",
                    "latitude" => null,
                    "longitude" => null
                )
            ),
            "Saint Vincent and the Grenadines" => array(
                "region1" => array(
                    "name" => "Kingstown",
                    "latitude" => 13.1601,
                    "longitude" => -61.2241
                ),
                "region2" => array(
                    "name" => "Bequia",
                    "latitude" => 13.0034,
                    "longitude" => -61.2322
                ),
                "region3" => array(
                    "name" => "Mustique",
                    "latitude" => 12.8917,
                    "longitude" => -61.1800
                )
            ),
            "Venezuela" => array(
                "region1" => array(
                    "name" => "Caracas",
                    "latitude" => 10.4806,
                    "longitude" => -66.9036
                ),
                "region2" => array(
                    "name" => "Maracaibo",
                    "latitude" => 10.6483,
                    "longitude" => -71.6146
                ),
                "region3" => array(
                    "name" => "Valencia",
                    "latitude" => 10.1620,
                    "longitude" => -68.0072
                )
            ),
            "British Virgin Islands" => array(
                "region1" => array(
                    "name" => "Road Town",
                    "latitude" => 18.4261,
                    "longitude" => -64.6200
                ),
                "region2" => array(
                    "name" => "Virgin Gorda",
                    "latitude" => 18.4983,
                    "longitude" => -64.3558
                ),
                "region3" => array(
                    "name" => "Jost Van Dyke",
                    "latitude" => 18.4464,
                    "longitude" => -64.7264
                )
            ),
            "U.S. Virgin Islands" => array(
                "region1" => array(
                    "name" => "Saint Thomas",
                    "latitude" => 18.3400,
                    "longitude" => -64.9307
                ),
                "region2" => array(
                    "name" => "Saint Croix",
                    "latitude" => 17.7366,
                    "longitude" => -64.7736
                ),
                "region3" => array(
                    "name" => "Saint John",
                    "latitude" => 18.3333,
                    "longitude" => -64.7333
                )
            ),
            "Vietnam" => array(
                "region1" => array(
                    "name" => "Ho Chi Minh City",
                    "latitude" => 10.8231,
                    "longitude" => 106.6297
                ),
                "region2" => array(
                    "name" => "Hanoi",
                    "latitude" => 21.0285,
                    "longitude" => 105.8542
                ),
                "region3" => array(
                    "name" => "Da Nang",
                    "latitude" => 16.0544,
                    "longitude" => 108.2022
                )
            ),
            "Vanuatu" => array(
                "region1" => array(
                    "name" => "Port Vila",
                    "latitude" => -17.7333,
                    "longitude" => 168.3167
                ),
                "region2" => array(
                    "name" => "Luganville",
                    "latitude" => -15.5127,
                    "longitude" => 167.1766
                ),
                "region3" => array(
                    "name" => "Norsup",
                    "latitude" => -16.0792,
                    "longitude" => 167.4016
                )
            ),
            "Wallis and Futuna" => array(
                "region1" => array(
                    "name" => "Mata-Utu",
                    "latitude" => -13.2816,
                    "longitude" => -176.1736
                ),
                "region2" => array(
                    "name" => "N/A",
                    "latitude" => null,
                    "longitude" => null
                ),
                "region3" => array(
                    "name" => "N/A",
                    "latitude" => null,
                    "longitude" => null
                )
            ),
            "Samoa" => array(
                "region1" => array(
                    "name" => "Apia",
                    "latitude" => -13.8333,
                    "longitude" => -171.7667
                ),
                "region2" => array(
                    "name" => "Vaitele",
                    "latitude" => -13.8189,
                    "longitude" => -171.7928
                ),
                "region3" => array(
                    "name" => "Faleula",
                    "latitude" => -13.8519,
                    "longitude" => -171.8733
                )
            ),
            "Kosovo" => array(
                "region1" => array(
                    "name" => "Pristina",
                    "latitude" => 42.6629,
                    "longitude" => 21.1655
                ),
                "region2" => array(
                    "name" => "Prizren",
                    "latitude" => 42.2139,
                    "longitude" => 20.7397
                ),
                "region3" => array(
                    "name" => "Gjilan",
                    "latitude" => 42.4689,
                    "longitude" => 21.4633
                )
            ),
            "Yemen" => array(
                "region1" => array(
                    "name" => "Sana'a",
                    "latitude" => 15.3694,
                    "longitude" => 44.1910
                ),
                "region2" => array(
                    "name" => "Aden",
                    "latitude" => 12.8000,
                    "longitude" => 45.0389
                ),
                "region3" => array(
                    "name" => "Taiz",
                    "latitude" => 13.5795,
                    "longitude" => 44.0209
                )
            ),
            "Mayotte" => array(
                "region1" => array(
                    "name" => "Mamoudzou",
                    "latitude" => -12.7871,
                    "longitude" => 45.2750
                ),
                "region2" => array(
                    "name" => "Dzaoudzi",
                    "latitude" => -12.7902,
                    "longitude" => 45.2759
                ),
                "region3" => array(
                    "name" => "Koungou",
                    "latitude" => -12.7276,
                    "longitude" => 45.1902
                )
            ),
            "South Africa" => array(
                "region1" => array(
                    "name" => "Cape Town",
                    "latitude" => -33.9249,
                    "longitude" => 18.4241
                ),
                "region2" => array(
                    "name" => "Johannesburg",
                    "latitude" => -26.2041,
                    "longitude" => 28.0473
                ),
                "region3" => array(
                    "name" => "Durban",
                    "latitude" => -29.8587,
                    "longitude" => 31.0218
                )
            ),
            "Zambia" => array(
                "region1" => array(
                    "name" => "Lusaka",
                    "latitude" => -15.4089,
                    "longitude" => 28.2871
                ),
                "region2" => array(
                    "name" => "Ndola",
                    "latitude" => -12.9587,
                    "longitude" => 28.6366
                ),
                "region3" => array(
                    "name" => "Kitwe",
                    "latitude" => -12.7962,
                    "longitude" => 28.2472
                )
            ),
            "Zimbabwe" => array(
                "region1" => array(
                    "name" => "Harare",
                    "latitude" => -17.8292,
                    "longitude" => 31.0522
                ),
                "region2" => array(
                    "name" => "Bulawayo",
                    "latitude" => -20.1500,
                    "longitude" => 28.5833
                ),
                "region3" => array(
                    "name" => "Chitungwiza",
                    "latitude" => -18.0127,
                    "longitude" => 31.0756
                )
            ),
             "South Sudan" => array(
                "region1" => array(
                    "name" => "Bahr el Ghazal",
                    "latitude" => 15.5007,
                    "longitude" => 32.5599
                ),
                "region2" => array(
                    "name" => "Equatoria",
                    "latitude" => 15.6312,
                    "longitude" => 32.5341
                ),
                "region3" => array(
                    "name" => "Greater Upper Nile",
                    "latitude" => 19.5906,
                    "longitude" => 37.2191
                )
            ),

        );

        foreach ($countryRegion as $country_name => $regions) {
            $country = Country::where('country_name', $country_name)->first();
            echo $country_name . " ID=" . $country->id . ":\n";

            if ($country->id) {
                foreach ($regions as $region => $data) {
                    $region = [
                        "country_id" => $country->id,
                        "region" =>  $data['name'],
                        "city" => $data['name'],
                        "lat" => $data['latitude'],
                        "long" => $data['longitude'],
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now(),
                    ];
                    Region::create($region);
                }
            }
        }
    }
}
