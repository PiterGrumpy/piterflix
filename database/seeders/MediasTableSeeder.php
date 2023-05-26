<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediasTableSeeder extends Seeder
{
    public function run()
    {
        // peliculas
        Media::create([
            'tipo' => 'pelicula',
            'titulo' => 'El Padrino',
            'titulo_original' => 'The Godfather',
            'idioma_original' => 'Inglés',
            'duracion' => 175,
            'anoEstreno' => 1972,
            'descripcion' => 'El patriarca de una poderosa familia de la mafia transferirá el control de su imperio a su hijo menor.',
            'id_productora' => 1,
            'id_api' => 238,
            'imagen' => 'https://www.themoviedb.org/t/p/original/tmU7GeKVybMWFButWEGl2M4GeiP.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/ApiEfzSkrqS4m1L5a2GwWXzIiAs.jpg',
            'video' => 'v72XprPxy3E'
        ]);
        Media::create([
            'tipo' => 'pelicula',
            'titulo' => 'El Padrino: Parte II',
            'titulo_original' => 'The Godfather: Part II',
            'idioma_original' => 'Inglés',
            'duracion' => 202,
            'anoEstreno' => 1974,
            'descripcion' => 'La historia de la familia Corleone continúa, esta vez contando la vida del joven Vito Corleone en su ascenso al poder.',
            'id_productora' => 1,
            'id_api' => 240,
            'imagen' => 'https://www.themoviedb.org/t/p/original/kGzFbGhp99zva6oZODW5atUtnqi.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/mbry0W5PRylSUHsYzdiY2FSJwze.jpg',
            'video' => 'rMT8b3MJ-RI'

        ]);
        
        
        Media::create([
            'tipo' => 'pelicula',
            'titulo' => 'El Señor de los Anillos: El Retorno del Rey',
            'titulo_original' => 'The Lord of the Rings: The Return of the King',
            'idioma_original' => 'Inglés',
            'duracion' => 201,
            'anoEstreno' => 2003,
            'descripcion' => 'Frodo y Sam continúan su camino hacia Mordor para destruir el Anillo Único, mientras que Aragorn lidera la batalla final contra Sauron para decidir el destino de la Tierra Media.',
            'id_productora' => 2,
            'id_api' => 122,
            'imagen' => 'https://www.themoviedb.org/t/p/original/lXhgCODAbBXL5buk9yEmTpOoOgR.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/mWuFbQrXyLk2kMBKF9TUPtDwuPx.jpg',
            'video' => 'h-9RYiqyqjk'
        ]);
        
     
        Media::create([
            'tipo' => 'pelicula',
            'titulo' => 'El Curioso Caso de Benjamin Button',
            'titulo_original' => 'The Curious Case of Benjamin Button',
            'idioma_original' => 'Inglés',
            'duracion' => 166,
            'anoEstreno' => 2008,
            'descripcion' => 'Un hombre nace anciano y va rejuveneciendo a medida que pasa el tiempo, viviendo una vida inusual que lo lleva a encontrar el amor y la pérdida en el camino.',
            'id_productora' => 3,
            'id_api' => 4922,
            'imagen' => 'https://www.themoviedb.org/t/p/original/2fswjyrY3GEzeoVn6mF8pNeNcgf.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/tq8yOj5fu4aLVdMUbibm9GEkmuN.jpg',
            'video' => 'iH6FdW39Hag'
        ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' => 'El club de la lucha',
                'titulo_original' => 'Fight Club',
                'idioma_original' => 'Inglés',
                'duracion' => 139,
                'anoEstreno' => 1999,
                'descripcion' => 'Un hombre aburrido y desilusionado encuentra una nueva forma de vida a través de un club de lucha clandestino.',
                'id_productora' => 3,
                'id_api' => 550,
                'imagen' => 'https://www.themoviedb.org/t/p/original/hZkgoQYus5vegHoetLkCJzb17zJ.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/1yWmCAIGSVNuTOGyz9F48W9g1Ux.jpg',
                'video' => 'r5KDiUNZv4w'
            ]);
            
            Media::create([
                'tipo' => 'pelicula',
                'titulo' => 'El gran Lebowski',
                'titulo_original' => 'The Big Lebowski',
                'idioma_original' => 'Inglés',
                'duracion' => 117,
                'anoEstreno' => 1998,
                'descripcion' => 'Un perdedor sin preocupaciones se ve arrastrado a un mundo de intriga, secuestro y nihilistas cuando confunden su identidad con la de un millonario con el mismo nombre.',
                'id_productora' => 4,
                'id_api' => 115,
                'imagen' => 'https://www.themoviedb.org/t/p/original/wlpjRBQdRSVdu2a8icYZaIp2xmt.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/EJFkJD9BH400jfzKz3W5xLYHQa.jpg',
                'video' => 'AkA69XT7Lq0'

            ]);
            
            Media::create([
                'tipo' => 'pelicula',
                'titulo' => 'Regreso al futuro',
                'titulo_original' => 'Back to the Future',
                'idioma_original' => 'Inglés',
                'duracion' => 116,
                'anoEstreno' => 1985,
                'descripcion' => 'Un adolescente es enviado accidentalmente al pasado en una máquina del tiempo creada por su excéntrico amigo inventor y debe asegurarse de que sus padres se conozcan para poder volver al presente.',
                'id_productora' => 5,
                'id_api' => 105,
                'imagen' => 'https://www.themoviedb.org/t/p/original/5bzPWQ2dFUl2aZKkp7ILJVVkRed.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/ldJzO9D40mCVeDaZQ1986t8rguZ.jpg',
                'video' => 'FgFwuhHFpbA'
            ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' => 'The Dark Knight',
                'titulo_original' => 'The Dark Knight',
                'idioma_original' => 'Inglés',
                'duracion' => 152,
                'anoEstreno' => 2008,
                'descripcion' => 'El caballero de la noche, Batman, debe enfrentar su mayor desafío cuando un nuevo criminal, el Joker, aparece en la ciudad de Gotham sembrando el caos y la destrucción.',
                'id_productora' => 3,
                'id_api' => 155,
                'imagen' => 'https://www.themoviedb.org/t/p/original/pbEkjhdfP7yuDcMB78YEZwgD4IN.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/8QDQExnfNFOtabLDKqfDQuHDsIg.jpg',
                'video' => '9MEuGQtM9wA'
            ]);
            
            Media::create([
                'tipo' => 'pelicula',
                'titulo' => 'Forrest Gump',
                'titulo_original' => 'Forrest Gump',
                'idioma_original' => 'Inglés',
                'duracion' => 142,
                'anoEstreno' => 1994,
                'descripcion' => 'La historia de Forrest Gump, un hombre con discapacidad intelectual que, a pesar de sus limitaciones, logra ser parte de importantes eventos históricos en Estados Unidos y vivir grandes aventuras.',
                'id_productora' => 4,
                'id_api' => 13,
                'imagen' => 'https://www.themoviedb.org/t/p/original/3h1JZGDhZ8nzxdgvkxha0qBqi05.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/azV6hV99lYkdhydsQbJCI6FqMl4.jpg',
                'video' => 'Cyh1LpxnaxI'
            ]);
            
            Media::create([
                'tipo' => 'pelicula',
                'titulo' => 'La La Land',
                'titulo_original' => 'La La Land',
                'idioma_original' => 'Inglés',
                'duracion' => 128,
                'anoEstreno' => 2016,
                'descripcion' => 'Mia, una aspirante a actriz, y Sebastian, un músico de jazz, se enamoran en Los Ángeles mientras persiguen sus sueños de fama y fortuna.',
                'id_productora' => 3,
                'id_api' => 313369,
                'imagen' => 'https://www.themoviedb.org/t/p/original/qJeU7KM4nT2C1WpOrwPcSDGFUWE.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/7pFsAaJmiOppVHcldBzg8JKBHwe.jpg',
                'video' => 'IHbHn5SLhZo'
            ]);
            //
            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Ant-Man y la Avispa: Quantumanía',
                'titulo_original' =>'Ant-Man and the Wasp: Quantumania',
                'idioma_original' =>'Inglés',
                'duracion' => 125,
                'anoEstreno' =>'2023',
                'descripcion' =>"La pareja de superhéroes Scott Lang y Hope van Dyne regresa para continuar sus aventuras como Ant-Man y la Avispa. Los dos, junto a los padres de Hope, Hank Pym y Janet van Dyne y la hija de Scott, Cassie Lang, se dedican a explorar el Mundo Cuántico, interactuando con nuevas y extrañas criaturas y embarcándose en una aventura que les llevará más allá de los límites de lo que creían posible.",
                'id_productora' => 4,
                'id_api' =>'640146',
                'imagen' => 'https://www.themoviedb.org/t/p/original/3CxUndGhUcZdt1Zggjdb2HkLLQX.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/jTNYlTEijZ6c8Mn4gvINOeB2HWM.jpg',
                'video' => 'BaLJ044I2HI'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'¡Shazam! La furia de los dioses',
                'titulo_original' =>'Shazam! Fury of the Gods',
                'idioma_original' =>'Inglés',
                'duracion' => 130,
                'anoEstreno' =>'2023',
                'descripcion' =>"Billy Batson y sus hermanos adoptivos, que se transforman en superhéroes al decir '¡Shazam!', se ven obligados a volver a la acción y luchar contra las Hijas de Atlas, a quienes deben evitar que use un arma que podría destruir el mundo.",
                'id_productora' => 6,
                'id_api' =>'594767',
                'imagen' => 'https://www.themoviedb.org/t/p/original/nDxJJyA5giRhXx96q1sWbOUjMBI.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/igFLHxab9zG0M89OmEpnOM6TPXn.jpg',
                'video' => 'B_DpkUSH2Mk'
                ]);
            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Ghosting',
                'titulo_original' =>'Ghosted',
                'idioma_original' =>'Inglés',
                'duracion' => 140,
                'anoEstreno' =>'2023',
                'descripcion' =>"Cole, un tipo campechano, se enamora perdidamente de la enigmática Sadie, quien, para su enorme sorpresa, resulta ser una agente secreta. Antes de que pueda surgir una segunda cita, los dos deben embarcarse en una aventura internacional para salvar el mundo.",
                'id_productora' => 8,
                'id_api' =>'868759',
                'imagen' => 'https://www.themoviedb.org/t/p/original/b9UCfDzwiWw7mIFsIQR9ZJUeh7q.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/zSw2JeQ03GivcS4VKJmWK5sYi1F.jpg',
                'video' => 'WhhCp-QkukI'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Súper Mario Bros. La película',
                'titulo_original' =>'The Super Mario Bros. Movie',
                'idioma_original' =>'Inglés',
                'duracion' => 120,
                'anoEstreno' =>'2023',
                'descripcion' =>"Mientras trabajan en una avería subterránea, los fontaneros de Brooklyn, Mario y su hermano Luigi, viajan por una misteriosa tubería hasta un nuevo mundo mágico. Pero, cuando los hermanos se separan, Mario deberá emprender una épica misión para encontrar a Luigi.",
                'id_productora' => 9,
                'id_api' =>'502356',
                'imagen' => 'https://www.themoviedb.org/t/p/original/9n2tJBplPbgR2ca05hS5CKXwP2c.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/zNKs1T0VZuJiVuhuL5GSCNkGdxf.jpg',
                'video' => '_1f2RLdxQfA'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Siete reyes deben morir',
                'titulo_original' =>'The Last Kingdom: Seven Kings Must Die',
                'idioma_original' =>'Inglés',
                'duracion' => 135,
                'anoEstreno' =>'2023',
                'descripcion' =>"Tras la muerte del rey Eduardo, Uhtred de Bebbanburg y sus camaradas se aventuran a través de un reino fracturado con la esperanza de unir por fin a Inglaterra.",
                'id_productora' => 3,
                'id_api' =>'948713',
                'imagen' => 'https://www.themoviedb.org/t/p/original/xwA90BwZXTh8ke3CVsQlj8EOkFr.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/55PJNDJbD4Q9jFO4vaCnNl9dYEv.jpg',
                'video' => 'dlUdP2Oq6to'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Scream VI',
                'titulo_original' =>'Scream VI',
                'idioma_original' =>'Inglés',
                'duracion' => 110,
                'anoEstreno' =>'2023',
                'descripcion' =>"Tras los últimos asesinatos de Ghostface, los cuatro supervivientes abandonan Woodsboro para dar comienzo a un nuevo capítulo.",
                'id_productora' => 2,
                'id_api' =>'934433',
                'imagen' => 'https://www.themoviedb.org/t/p/original/44immBwzhDVyjn87b3x3l9mlhAD.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/dvvfHkEinSUWUPtJeWvxOx5hozm.jpg',
                'video' => 'ECc_KdCZ8-I'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'El exorcista del papa',
                'titulo_original' =>"The Pope's Exorcist",
                'idioma_original' =>'Inglés',
                'duracion' => 150,
                'anoEstreno' =>'2023',
                'descripcion' =>"Película sobre Gabriele Amorth, un sacerdote que ejerció como exorcista principal del Vaticano, realizando más de cien mil exorcismos a lo largo de su vida. Amorth escribió dos libros de memorias donde detalló sus experiencias luchando contra Satanás.",
                'id_productora' => 5,
                'id_api' =>'758323',
                'imagen' => 'https://www.themoviedb.org/t/p/original/hiHGRbyTcbZoLsYYkO4QiCLYe34.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/qcknZEeD71byJ3XSalDDZ5iHpNr.jpg',
                'video' => 'a-Cx7IE04sA'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Creed III',
                'titulo_original' =>'Creed III',
                'idioma_original' =>'Inglés',
                'duracion' => 120,
                'anoEstreno' =>'2023',
                'descripcion' =>"Después de dominar el mundo del boxeo, Adonis Creed ha prosperado tanto en su carrera como en su vida familiar. Cuando un amigo de la infancia y ex prodigio de boxeo, Damien Anderson, resurge después de cumplir una larga sentencia en prisión, está ansioso por demostrar que merece su disparo en el ring. El enfrentamiento entre los antiguos amigos es más que una pelea. Para resolver el puntaje, Adonis debe poner su futuro en la línea para luchar contra Damien, un luchador que no tiene nada que perder.",
                'id_productora' => 7,
                'id_api' =>'677179',
                'imagen' => 'https://www.themoviedb.org/t/p/original/5i6SjyDbDWqyun8klUuCxrlFbyw.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/fcFMd3HdyX7r5gtFwVnn2qr5Yhq.jpg',
                'video' => 'IeZ5xDv3w6A'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Criminales a la vista',
                'titulo_original' =>'Murder Mystery 2',
                'idioma_original' =>'Inglés',
                'duracion' => 120,
                'anoEstreno' =>'2023',
                'descripcion' =>"Nick y Audrey Spitz, ahora detectives a tiempo completo que tratan de hacer despegar su agencia de detectives privados, se ven inmersos en un conflicto internacional cuando su amigo, el maharajá, es secuestrado en mitad de su fastuosa boda.",
                'id_productora' => 1,
                'id_api' =>'638974',
                'imagen' => 'https://www.themoviedb.org/t/p/original/bT3IpP7OopgiVuy6HCPOWLuaFAd.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/3jce1QvM2sma0TKYckNmIKzjhHC.jpg',
                'video' => 'LM2F56uK0fs'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Adrenalina',
                'titulo_original' =>'Adrenaline',
                'idioma_original' =>'Inglés',
                'duracion' => 125,
                'anoEstreno' =>'2022',
                'descripcion' =>"Una agente del FBI de vacaciones en Europa del Este con su familia ve cómo su vida da un vuelco cuando asesinan a su marido y secuestran a su hija. Desesperada, tendrá que formar equipo con un criminal al que ha detenido para salvar a su hija antes de que sea demasiado tarde.",
                'id_productora' => 6,
                'id_api' =>'1048300',
                'imagen' => 'https://www.themoviedb.org/t/p/original/nDmPjKLqLwWyd4Ssti8HCdhW5cZ.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/qVzRt8c2v4gGBYsnaflXVVeQ9Lh.jpg',
                'video' => 'o7nUU7qCYVE'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'John Wick 4',
                'titulo_original' =>'John Wick: Chapter 4',
                'idioma_original' =>'Inglés',
                'duracion' => 120,
                'anoEstreno' =>'2023',
                'descripcion' =>"John Wick descubre un camino para derrotar a la Alta Mesa. Pero para poder ganar su libertad, Wick deberá enfrentarse a un nuevo rival con poderosas alianzas en todo el mundo, capaz de convertir a viejos amigos en enemigos.",
                'id_productora' => 10,
                'id_api' =>'603692',
                'imagen' => 'https://www.themoviedb.org/t/p/original/h8gHn0OzBoaefsYseUByqsmEDMY.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/gh2bmprLtUQ8oXCSluzfqaicyrm.jpg',
                'video' => 'L0anWmmd8TI'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'El Gato con Botas: El último deseo',
                'titulo_original' =>'Puss in Boots: The Last Wish',
                'idioma_original' =>'Inglés',
                'duracion' => 130,
                'anoEstreno' =>'2022',
                'descripcion' =>"El Gato con Botas se embarca en un viaje épico para encontrar al mítico Último Deseo y recuperar sus nueve vidas.",
                'id_productora' => 4,
                'id_api' =>'315162',
                'imagen' => 'https://www.themoviedb.org/t/p/original/jr8tSoJGj33XLgFBy6lmZhpGQNu.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/lyP4WNmUiiOgl4g2z7ywE0z6SGF.jpg',
                'video' => 'QaiUm8jNiCk'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Oso vicioso',
                'titulo_original' =>'Cocaine Bear',
                'idioma_original' =>'Inglés',
                'duracion' => 125,
                'anoEstreno' =>'2023',
                'descripcion' =>"Inspirado en hechos reales ocurridos en Kentucky en 1985, durante los cuales un oso negro de 175 libras ingirió 88 libras de cocaína pura.",
                'id_productora' => 2,
                'id_api' =>'804150',
                'imagen' => 'https://www.themoviedb.org/t/p/original/a2tys4sD7xzVaogPntGsT1ypVoT.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/xNaMZMtGUPPmjYU5h5iqVxvcSe.jpg',
                'video' => 'CvYGl5BESEI'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>"De Piraten van Hiernaast II: De Ninja's van de Overkant",
                'titulo_original' =>"De Piraten van Hiernaast II: De Ninja's van de Overkant",
                'idioma_original' =>'Holandés',
                'duracion' => 130,
                'anoEstreno' =>'2022',
                'descripcion' =>"Los Piratas se sienten como en casa en Sandborough, pero el ambiente se enfría cuando los Ninjas vienen a vivir a la calle. ¡Después de todo, los piratas y los ninjas son enemigos jurados! Mientras el capitán pirata Hector Blunderbuss lucha por deshacerse de sus nuevos vecinos, su hijo Billy y su hija ninja Yuka se hacen amigos. Los Piratas desafían a los Ninjas a la batalla final en el hexatlón anual del pueblo. ¿Quién ganará el partido? Los ninjas son más rápidos y ágiles, por supuesto, pero los piratas son los mejores tramposos de los siete mares...",
                'id_productora' => 8,
                'id_api' =>'946310',
                'imagen' => 'https://www.themoviedb.org/t/p/original/tFaC1Fb1sv1dALB0i9Avi76MHmn.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/7AELgsqhyytLJnrYkl4nYkkJIwG.jpg',
                'video' => 'wgyWDK2Gycc'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'La niña de la comunión',
                'titulo_original' =>'La niña de la comunión',
                'idioma_original' =>'Inglés',
                'duracion' => 120,
                'anoEstreno' =>'2023',
                'descripcion' =>"Finales de los 80, en un pueblo no determinado. Sara (Carla Campra) acaba de llegar al pueblo y no encuentra su lugar en ese espacio cerrado. Su mejor amiga es Rebe (Aina Quiñones), mucho más extrovertida. Una noche van a una discoteca, toman drogas y durante el trayecto a casa encontrarán una muñeca vestida de comunión. A partir de ese momento, comenzará la pesadilla.",
                'id_productora' => 9,
                'id_api' =>'1008005',
                'imagen' => 'https://www.themoviedb.org/t/p/original/54IXMMEQKlkPXHqPExWy98UBmtE.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/sGSzha9K65abyvzBwXXnSV2sHWV.jpg',
                'video' => 'Xr91d6IKN-I'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Posesión infernal: El despertar',
                'titulo_original' =>'Evil Dead Rise',
                'idioma_original' =>'Inglés',
                'duracion' => 115,
                'anoEstreno' =>'2023',
                'descripcion' =>"Historia de dos hermanas separadas cuyo reencuentro se ve interrumpido por el surgimiento de demonios poseedores de carne, empujándolos a una batalla por la supervivencia mientras se enfrentan a la versión de familia más aterradora que se pueda imaginar. Secuela de la trilgía original de 'Evil Dead'.",
                'id_productora' => 2,
                'id_api' =>'713704',
                'imagen' => 'https://www.themoviedb.org/t/p/original/7bWxAsNPv9CXHOhZbJVlj2KxgfP.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/ioMtng0qHbwNjR1fuxYZsRf1kjm.jpg',
                'video' => 'eLCU4sXpbl8'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'65',
                'titulo_original' =>'65',
                'idioma_original' =>'Inglés',
                'duracion' => 130,
                'anoEstreno' =>'2023',
                'descripcion' =>"Después de un catastrófico accidente en un planeta desconocido, el piloto Mills descubre rápidamente que realmente está varado en la Tierra… hace 65 millones de años. Ahora, con solo una oportunidad de rescate, Mills y la otra única superviviente, Koa, deberán abrirse camino a través del desconocido territorio plagado con peligrosas criaturas prehistóricas en una épica lucha por sobrevivir.",
                'id_productora' => 5,
                'id_api' =>'700391',
                'imagen' => 'https://www.themoviedb.org/t/p/original/eEF40Xk2twM3WjRNZftfo771gjv.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/dhqu9rInT9IOa2w0TU22YMEgGus.jpg',
                'video' => 'YeKgkbYSUhA'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Gangs of Lagos',
                'titulo_original' =>'Gangs of Lagos',
                'idioma_original' =>'Inglés',
                'duracion' => 110,
                'anoEstreno' =>'2023',
                'descripcion' =>"Un grupo de amigos tienen que navegar hacia su propio destino, creciendo en las bulliciosas calles y el vecindario de Isale Eko, Lagos.",
                'id_productora' => 3,
                'id_api' =>'1104040',
                'imagen' => 'https://www.themoviedb.org/t/p/original/rPSJAElGxOTko1zK6uIlYnTMFxN.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/nGwFsB6EXUCr21wzPgtP5juZPSv.jpg',
                'video' => '1UMJdCZtYz0'
                ]);

            Media::create([
                'tipo' => 'pelicula',
                'titulo' =>'Attack on Titan',
                'titulo_original' =>'Attack on Titan',
                'idioma_original' =>'Inglés',
                'duracion' => 120,
                'anoEstreno' =>'2022',
                'descripcion' =>"A medida que se agota el agua viable en la Tierra, se envía una misión a la luna Titán de Saturno para recuperar reservas sostenibles de H2O de sus habitantes alienígenas. Pero justo cuando los humanos adquieren el preciado recurso, son atacados por los titanes rebeldes, quienes no confían en que los terrícolas se vayan en paz.",
                'id_productora' => 6,
                'id_api' =>'1033219',
                'imagen' => 'https://www.themoviedb.org/t/p/original/eNJhWy7xFzR74SYaSJHqJZuroDm.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/qNz4l8UgTkD8rlqiKZ556pCJ9iO.jpg',
                'video' => 'MNcYI5U_w-g'
                ]);


            // series
        Media::create([
            'tipo' => 'serie',
            'titulo' => 'Juego de Tronos',
            'titulo_original' => 'Game of Thrones',
            'idioma_original' => 'Inglés',
            'duracion' => 60,
            'anoEstreno' => 2011,
            'descripcion' => 'En una tierra donde el verano puede durar décadas y el invierno toda una vida, los problemas acechan.',
            'id_productora' => 3,
            'id_api' => 1399,
            'imagen' => 'https://www.themoviedb.org/t/p/original/2OMB0ynKlyIenMJWI2Dy9IWT4c.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/z9gCSwIObDOD2BEtmUwfasar3xs.jpg',
            'video' => 'EhuKM_mcGhA'
        ]);
        Media::create([
            'tipo' => 'serie',
            'titulo' => 'Breaking Bad',
            'titulo_original' => 'Breaking Bad',
            'idioma_original' => 'Inglés',
            'duracion' => 45,
            'anoEstreno' => 2008,
            'descripcion' => 'Un profesor de química con cáncer se une a un exalumno para fabricar y vender metanfetamina para asegurar el futuro de su familia.',
            'id_productora' => 4,
            'id_api' => 1396,
            'imagen' => 'https://www.themoviedb.org/t/p/original/84XPpjGvxNyExjSuLQe0SzioErt.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg',
            'video' => 'YZWy7J1u9Wo'
        ]);
        Media::create([
            'tipo' => 'serie',
            'titulo' => 'Stranger Things',
            'titulo_original' => 'Stranger Things',
            'idioma_original' => 'Inglés',
            'duracion' => 50,
            'anoEstreno' => 2016,
            'descripcion' => 'Cuando un niño desaparece, un pequeño pueblo revela un misterio relacionado con experimentos secretos, fuerzas sobrenaturales aterradoras y una niña muy extraña.',
            'id_productora' => 6,
            'id_api' => 66732,
            'imagen' => 'https://www.themoviedb.org/t/p/original/56v2KjBlU4XaOv9rVYEQypROD7P.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/94GCavCGyOoBZnRlb2x8OZB7HUr.jpg',
            'video' => 'x7Yq9MJUqjY'
            ]);
            
            Media::create([
            'tipo' => 'serie',
            'titulo' => 'Friends',
            'titulo_original' => 'Friends',
            'idioma_original' => 'Inglés',
            'duracion' => 22,
            'anoEstreno' => 1994,
            'descripcion' => 'Un grupo de amigos en la veintena experimentan los altibajos de la vida y el amor en Manhattan.',
            'id_productora' => 7,
            'id_api' => 1668,
            'imagen' => 'https://www.themoviedb.org/t/p/original/l0qVZIpXtIo7km9u5Yqh0nKPOr5.jpg',
            'poster' => 'https://www.themoviedb.org/t/p/original/rkKCSlr8OH5tbKEdgwtzvEiemrl.jpg',
            'video' => 'MfvvhM6IJS0'
            ]);

            Media::create([
                'tipo' => 'serie',
                'titulo' => 'The Crown',
                'titulo_original' => 'The Crown',
                'idioma_original' => 'Inglés',
                'duracion' => 60,
                'anoEstreno' => 2016,
                'descripcion' => 'Sigue la vida de la Reina Isabel II desde su boda en 1947 hasta los días actuales.',
                'id_productora' => 8,
                'id_api' => 65494,
                'imagen' => 'https://www.themoviedb.org/t/p/original/63u7DCLSWo8TNBZUhu7fEXj6kX1.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/e9s1VdIBImcWpCzBR34Fz44jeUR.jpg',
                'video' => 'taDT59MHnrE'
                ]);
                Media::create([
                    'tipo' => 'serie',
                    'titulo' => 'The Last of Us',
                    'titulo_original' => 'The Last of Us',
                    'idioma_original' => 'Inglés',
                    'duracion' => 60,
                    'anoEstreno' => 2022,
                    'descripcion' => 'Joel, un superviviente solitario, debe escoltar a una niña llamada Ellie a través de los Estados Unidos post-apocalípticos infestados de infectados para buscar una cura para la plaga.',
                    'id_productora' => 5,
                    'id_api' => 1402,
                    'imagen' => 'https://www.themoviedb.org/t/p/original/uDgy6hyPd82kOHh6I95FLtLnj6p.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/tNQWO6cNzQYCyvw36mUcAQQyf5F.jpg',
                    'video' => 'yyGetSp7CIc'
                ]);

                Media::create([
                    'tipo' => 'serie',
                    'titulo' => 'Pokemon',
                    'titulo_original' => 'ポケットモンスター',
                    'idioma_original' => 'Japonés',
                    'duracion' => 22,
                    'anoEstreno' => 1997,
                    'descripcion' => 'Ash Ketchum comienza su aventura como entrenador de Pokémon en la región de Kanto junto a su inseparable compañero Pikachu. Juntos, viajarán por diferentes regiones del mundo Pokémon, desafiando a líderes de gimnasios y participando en la Liga Pokémon.',
                    'id_productora' => 4,
                    'id_api' => 60572,
                    'imagen' => 'https://www.themoviedb.org/t/p/original/rm6zG1gESQT0ww3mp8oUUT5LJBL.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/j70XnYdkUnssVZRiiH7ybDbh4pV.jpg',
                    'video' => 'lYDaYujzE7o'
                    ]);

                Media::create([
                    'tipo' => 'serie',
                    'titulo' => 'Los Soprano',
                    'titulo_original' => 'The Sopranos',
                    'idioma_original' => 'Inglés',
                    'duracion' => 50,
                    'anoEstreno' => 1999,
                    'descripcion' => 'Tony Soprano, un mafioso de Nueva Jersey, debe lidiar con sus problemas personales y familiares mientras maneja su imperio criminal.',
                    'id_productora' => 8,
                    'id_api' => 1398,
                    'imagen' => 'https://www.themoviedb.org/t/p/original/lNpkvX2s8LGB0mjGODMT4o6Up7j.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/p7XPjx5jTFl32TGbbIW8exdY8QW.jpg',
                    'video' => 'MkOK-Ecu-Xo'
                    ]);
               
                Media::create([
                    'tipo' => 'serie',
                    'titulo' => 'Death Note',
                    'titulo_original' => 'Death Note',
                    'idioma_original' => 'Japonés',
                    'duracion' => 25,
                    'anoEstreno' => 2006,
                    'descripcion' => 'Un estudiante de secundaria encuentra un cuaderno sobrenatural que le da el poder de matar a cualquier persona cuyo nombre escriba en él.',
                    'id_productora' => 9,
                    'id_api' => 13916,
                    'imagen' => 'https://www.themoviedb.org/t/p/original/mRwV4W2BAEpte7xlawJP4fsBpmS.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/iigTJJskR1PcjjXqxdyJwVB3BoU.jpg',
                    'video' => '6DxJIdIp8mM'
                    ]);

                Media::create([
                'tipo' => 'serie',
                'titulo' =>'Anatomía de Grey',
                'titulo_original' =>"Grey's Anatomy",
                'idioma_original' =>'Inglés',
                'duracion' => 50,
                'anoEstreno' =>2005,
                'descripcion' =>"La vida de Meredith Grey no es nada fácil. Intenta tomar las riendas de su vida, aunque su trabajo sea de esos que te hacen la vida imposible. Meredith es una cirujana interna de primer año en el Hospital Grace de Seattle, el programa de prácticas más duro de la Facultad de Medicina de Harvard. Y ella lo va a comprobar. Pero no estará sola. Un elenco de compañeros de promoción tendrán que superar la misma prueba. Ahora están en el mundo real, son doctores del hospital. Y en un mundo donde la experiencia en el trabajo puede ser un factor de vida o muerte, todos ellos tendrán que lidiar con los altibajos de sus vidas personales.",
                'id_productora' => 3,
                'id_api' =>1416,
                'imagen' => 'https://www.themoviedb.org/t/p/original/caGVr9Il2gj8bN4ow6qsLm60TxM.jpg',
                'poster' => 'https://www.themoviedb.org/t/p/original/jPzW61WlkyHVdvm8dCQZveTvmgW.jpg',
                'video' => 'NTzycsqxYJ0'
                ]);
                
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'The Mandalorian',
                    'titulo_original' =>'The Mandalorian',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2019',
                    'descripcion' =>"En el anárquico período tras el hundimiento del Imperio Galáctico, un cazarrecompensas con armadura conocido solo como El Mandaloriano emprende una misión bien remunerada aunque enigmática.",
                    'id_productora' => 4,
                    'id_api' =>'82856',
                    'imagen' => "https://www.themoviedb.org/t/p/original/6Lw54zxm6BAEKJeGlabyzzR5Juu.jpg",
                    'poster' => "https://www.themoviedb.org/t/p/original/7NaUG3goTIADgfEgzo78Ze0z4GL.jpg",
                    'video' => 'NTzycsqxYJ0'
                    ]);

                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Lucifer',
                    'titulo_original' =>'Lucifer',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2016',
                    'descripcion' =>"La serie se centrará en Lucifer (Tom Ellis) quien, aburrido e infeliz como el Señor del Infierno, dimite de su trono y abandona su reino para trasladarse a la ciudad de Los Angeles y abrir un lujoso piano-bar llamado Lux. Una vez allí ayudará a la policía a castigar a los más peligrosos criminales de la ciudad.",
                    'id_productora' => 3,
                    'id_api' =>'63174',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/xZUZ9i6vVayjyhR1vRo9Bjku4h.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/wQh2ytX0f8IfC3b2mKpDGOpGTXS.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Miércoles',
                    'titulo_original' =>'Wednesday',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2022',
                    'descripcion' =>"Miércoles Addams, lista, sarcástica y un poco muerta por dentro, investiga una oleada de asesinatos mientras hace amigos —y enemigos— en la Academia Nunca Más.",
                    'id_productora' => 3,
                    'id_api' =>'119051',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/iHSwvRVsRyxpX7FE7GbviaDvgGZ.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/q6j9Dn3iiXoCjpVitDppNNZXwVq.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);

                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Los Simpson',
                    'titulo_original' =>'The Simpsons',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'1989',
                    'descripcion' =>"Comedia americana de animación creada por Matt Groening para la compañía Fox. La serie es una parodia satírica del estilo de la clase media americana encarnada por una familia con ese mismo nombre, compuesta por Homer, Marge, Bart, Lisa, y Maggie Simpson. La trama se desarrolla en la ciudad ficticia de Springfield y parodia la cultura, la sociedad, la televisión estadounidense y muchos otros aspectos de la condición humana.",
                    'id_productora' => 6,
                    'id_api' =>'456',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/uNyEVSPeAtJgUBehuQJ8WEFwatN.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/t3qZAygWwd7sX6G9ae2a4R2Wbrh.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
                
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'The Flash',
                    'titulo_original' =>'The Flash',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2014',
                    'descripcion' =>"Después de que un acelerador de partículas cause una extraña tormenta, al investigador científico de la policía, Barry Allen, le cae un rayo y entra en coma. Meses después despierta con el poder de moverse a súper velocidad permitiéndole ser el ángel de la guardia de Central City. Aunque al principio se siente entusiasmado con sus nuevos poderes, Barry descubre que no es el único “meta-humano” que se originó tras la explosión del acelerador  y no todo el mundo está usando sus nuevos poderes para el bien",
                    'id_productora' => 4,
                    'id_api' =>'60735',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/gFkHcIh7iE5G0oVOgpmY8ONQjhl.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/7ci4qqkBJorLxSBwTj28vwh0bU.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
                
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'The Good Doctor',
                    'titulo_original' =>'The Good Doctor',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2017',
                    'descripcion' =>"Un cirujano joven y autista que padece el síndrome del sabio empieza a trabajar en un hospital prestigioso. Allá tendrá que vencer el escepticismo con el que sus colegas lo reciben.",
                    'id_productora' => 10,
                    'id_api' =>'71712',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/xXRsKNJHTOGrs5wfYAxkbM2RiyT.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/eCvGVqmxXcNvLMJxLAJeBZ2cUnM.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
    
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Ley y orden: Unidad de Víctimas Especiales',
                    'titulo_original' =>'Law & Order: Special Victims Unit',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'1999',
                    'descripcion' =>"Ley y Orden: Unidad de Víctimas Especiales es una serie de televisión estadounidense grabada en Nueva York donde es también principalmente producida. Con el estilo de la original ‘Ley y Orden’ los episodios son usualmente sacados de los titulares o basados libremente en verdaderos asesinatos que han recibido la atención de los medios.",
                    'id_productora' => 8,
                    'id_api' =>'2734',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/9xxLWtnFxkpJ2h1uthpvCRK6vta.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/uCM7F376UCIs5y6fMg2UyVGOmfr.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
            
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'El señor de los cielos',
                    'titulo_original' =>'El señor de los cielos',
                    'idioma_original' =>'Español',
                    'duracion' => 50,
                    'anoEstreno' =>'2013',
                    'descripcion' =>"La serie narra la historia de Aurelio Casillas, uno de los narcotraficante más importantes de México en los años 90. La única ambición de Aurelio era convertirse en el narco más poderoso de todo México, sin importarle ser cauteloso y mucho menos llamativo. Logró tener fortuna, mujeres, casas, edificios y mansiones sin mucho esfuerzo.",
                    'id_productora' => 2,
                    'id_api' =>'44953',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/iN9uULLaSx7h21tcR9io2dnARjw.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/Ag7VUdnrRz5Qpq3Yn3E5OCvFnu0.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
              
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'The Blacklist',
                    'titulo_original' =>'The Blacklist',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2013',
                    'descripcion' =>"El criminal más buscado del mundo, Thomas Raymond Reddington, se entrega misteriosamente y se ofrece a delatar a todos los que alguna vez han colaborado con él. Su única condición: sólo colaborará con Elisabeth King, una nueva agente del FBI, con quien parece tener alguna conexión que ella desconoce",
                    'id_productora' => 7,
                    'id_api' =>'46952',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/dDPwCyZG8arYwMDoQl0sm4xccCE.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/2jDYeTaDSIYnVOS4BD3d17JBkfP.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
    
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'The Last Kingdom',
                    'titulo_original' =>'The Last Kingdom',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2015',
                    'descripcion' =>"La serie está ambientada en el siglo IX donde lo que hoy se conoce como Inglaterra eran varios reinos independientes. Las tierras anglosajonas son atacadas y en muchos casos gobernadas por fuerzas vikingas. El reino de Wessex se ha dejado solo bajo el mando del Rey Alfred el Grande. Uhtred, hijo huérfano de un noble sajón, es secuestrado por los normandos y criado como uno de ellos.",
                    'id_productora' => 9,
                    'id_api' =>'63333',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/uCqXSfHymdbDMsFx8t0u0OPSuve.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/pnM3U7NMJeFNpzhpYP10zBdIuPM.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);

                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Sobrenatural',
                    'titulo_original' =>'Supernatural',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2005',
                    'descripcion' =>"Cuando eran niños, Sam y Dean Winchester, perdieron a su madre debido a una misteriosa y demoníaca fuerza supernatural. Posteriormente, su padre los crió para que fueran soldados. Él les enseño sobre el mal que vive en los rincones obscuros y en las carreteras secundarias de América...",
                    'id_productora' => 5,
                    'id_api' =>'1622',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/nVRyd8hlg0ZLxBn9RaI7mUMQLnz.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/58Qaj36FZDz54H36LsUI8mGiW9y.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
             
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Yellowstone',
                    'titulo_original' =>'Yellowstone',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2018',
                    'descripcion' =>"John Dutton (Costner) es el propietario del rancho más grande de Estados Unidos. Él y sus hijos entablarán una lucha sin cuartel contra una reserva india y contra el Gobierno federal de Estados Unidos que intenta expandir el parque nacional contiguo a la propiedad de los Dutton.",
                    'id_productora' => 1,
                    'id_api' =>'73586',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/2Erj4Oav9EHAtqLI354VM7ULDqu.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/peNC0eyc3TQJa6x4TdKcBPNP4t0.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
    
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Peaky Blinders',
                    'titulo_original' =>'Peaky Blinders',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2013',
                    'descripcion' =>"Una familia de pandilleros asentada en Birmingham, Reino Unido, tras la Primera Guerra Mundial (1914-1918), dirige un local de apuestas hípicas. Las actividades del ambicioso jefe de la banda llaman la atención del Inspector jefe Chester Campbell, un detective de la Real Policía Irlandesa que es enviado desde Belfast para limpiar la ciudad y acabar con la banda.",
                    'id_productora' => 3,
                    'id_api' =>'60574',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/kCx6Ij7hLRnfHbI93UOZxiAAUk3.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/tNjutGgaJpP30xUhfHihbcDgQUu.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
    
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Tulsa King',
                    'titulo_original' =>'Tulsa King',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2022',
                    'descripcion' =>"Justo después de ser liberado de prisión después de 25 años, el capo de la mafia de Nueva York, Dwight 'El General' Manfredi, es exiliado sin contemplaciones por su jefe para instalarse en Tulsa, Oklahoma. Al darse cuenta de que su familia de la mafia puede no tener sus mejores intereses en mente, Dwight construye lentamente una 'tripulación' a partir de un grupo de personajes inverosímiles, para ayudarlo a establecer un nuevo imperio criminal en un lugar que para él bien podría ser otro planeta",
                    'id_productora' => 3,
                    'id_api' =>'153312',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/mNHRGO1gFpR2CYZdANe72kcKq7G.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/yzRnj5GMZEjiW9xTGkz8cVNyzH9.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
               
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Sweet Tooth: El niño ciervo',
                    'titulo_original' =>'Sweet Tooth',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2021',
                    'descripcion' =>"Un cataclismo ha devastado el mundo. Gus, mitad chico y mitad ciervo, se une a una variopinta familia de niños híbridos como él para buscar respuestas a lo ocurrido.",
                    'id_productora' => 3,
                    'id_api' =>'103768',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/vYm3JDA5ZZbs9hvLs0mPQzqaY95.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/ea1eNwi2P532ydGXqNpAV2vAv2F.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
    
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'Prodigiosa: Las aventuras de Ladybug',
                    'titulo_original' =>'Miraculous, les aventures de Ladybug et Chat Noir',
                    'idioma_original' =>'Francés',
                    'duracion' => 50,
                    'anoEstreno' =>'2015',
                    'descripcion' =>"Cuando París corre peligro, Marinette se convierte en Ladybug. Lo que no sabe, es que su apuesto amigo Adrien es Cat Noir, otro superhéroe al servicio de la ciudad.",
                    'id_productora' => 3,
                    'id_api' =>'65334',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/ogMd4e3A0uSNwZADzgC23zCByoi.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/fqejByfJ0oJqXbRtvwcCq0C9mdf.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
               
                Media::create([
                    'tipo' => 'serie',
                    'titulo' =>'El joven Sheldon',
                    'titulo_original' =>'Young Sheldon',
                    'idioma_original' =>'Inglés',
                    'duracion' => 50,
                    'anoEstreno' =>'2017',
                    'descripcion' =>"En esta serie derivada de 'Big Bang', Sheldon Cooper tiene 9 años y se salta cuatro cursos para entrar directamente a la secundaria junto con su hermano mayor, menos listo que él. La vida en ella no será fácil, ya que sus compañeros, sus padres, su hermana melliza, su abuela y sus vecinos no entienden a Sheldon.",
                    'id_productora' => 3,
                    'id_api' =>'71728',
                    'imagen' => 'https://www.themoviedb.org/t/p/original/fXRgyxFxT3SG45fDqUODDRNE9IJ.jpg',
                    'poster' => 'https://www.themoviedb.org/t/p/original/dMJ2CB7VDmjYtyBvp9Ty5RZSf8o.jpg',
                    'video' => 'NTzycsqxYJ0'
                    ]);
             
    }       

}