<?php

declare(strict_types = 1);

namespace App\DataFixtures;

use App\Entity\CastMember;
use App\Entity\TvShow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $strangerThings = $this->addStrangerThings();
        $manager->persist($strangerThings);

        $breakingBad = $this->addBreakingBad();
        $manager->persist($breakingBad);

        $trueDetective = $this->addTrueDetective();
        $manager->persist($trueDetective);

        $manager->flush();
    }

    private function addStrangerThings(): TvShow
    {
        $tvShow = new TvShow(
            'Stranger Things',
            8.8,
            ['Drama', 'Fantasy', 'Horror', 'Mystery', 'Thriller'],
            'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.'
        );

        $tvShow->addEpisode('Chapter One: The Vanishing of Will Byers', 1, 1);
        $tvShow->addEpisode('Chapter Two: The Weirdo on Maple Street', 1, 2);
        $tvShow->addEpisode('Chapter Three: Holly, Jolly', 1, 3);
        $tvShow->addEpisode('Chapter Four: The Body', 1, 4);
        $tvShow->addEpisode('Chapter Five: The Flea and the Acrobat', 1, 5);
        $tvShow->addEpisode('Chapter Six: The Monster', 1, 6);
        $tvShow->addEpisode('Chapter Seven: The Bathtub', 1, 7);
        $tvShow->addEpisode('Chapter Eight: The Upside Down', 1, 8);

        $tvShow->addEpisode('Chapter One: MADMAX', 2, 1);
        $tvShow->addEpisode('Chapter Two: Trick or Treat, Freak', 2, 2);
        $tvShow->addEpisode('Chapter Three: The Pollywog', 2, 3);
        $tvShow->addEpisode('Chapter Four: Will the Wise', 2, 4);
        $tvShow->addEpisode('Chapter Five: Dig Dug', 2, 5);
        $tvShow->addEpisode('Chapter Six: The Spy', 2, 6);
        $tvShow->addEpisode('Chapter Seven: The Lost Sister', 2, 7);
        $tvShow->addEpisode('Chapter Eight: The Mind Flayer', 2, 8);
        $tvShow->addEpisode('Chapter Nine: The Gate', 2, 9);
    
        $tvShow->addEpisode('Chapter One: Suzie, Do You Copy?', 3, 1);
        $tvShow->addEpisode('Chapter Two: The Mall Rats', 3, 2);
        $tvShow->addEpisode('Chapter Three: The Case of the Missing Lifeguard', 3, 3);
        $tvShow->addEpisode('Chapter Four: The Sauna Test', 3, 4);
        $tvShow->addEpisode('Chapter Five: The Flayed', 3, 5);
        $tvShow->addEpisode('Chapter Six: E Pluribus Unum', 3, 6);
        $tvShow->addEpisode('Chapter Seven: The Bite', 3, 7);
        $tvShow->addEpisode('Chapter Eight: The Battle of Starcourt', 3, 8);

        $tvShow->addCastMember(new CastMember('Winona Ryder', 1971));
        $tvShow->addCastMember(new CastMember('David Harbour', 1975));
        $tvShow->addCastMember(new CastMember('Finn Wolfhard', 2002));
        $tvShow->addCastMember(new CastMember('Millie Bobby Brown', 2004));
        $tvShow->addCastMember(new CastMember('Caleb McLaughlin', 2001));
        $tvShow->addCastMember(new CastMember('Natalia Dyer', 1995));
        $tvShow->addCastMember(new CastMember('Charlie Heaton', 1994));
        $tvShow->addCastMember(new CastMember('Joe Keery', 1992));
        $tvShow->addCastMember(new CastMember('Cara Buono', 1971));
        $tvShow->addCastMember(new CastMember('Gaten Matarazzo', 2002));
        $tvShow->addCastMember(new CastMember('Noah Schnapp', 2004));
        $tvShow->addCastMember(new CastMember('Dacre Montgomery', 1992));
        $tvShow->addCastMember(new CastMember('Sadie Sink', 2002));

        return $tvShow;
    }

    private function addBreakingBad(): TvShow
    {
        $tvShow = new TvShow(
            'Breaking Bad',
            9.5,
            ['Crime', 'Drama', 'Thriller'],
            'A high school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to secure his family\'s future.'
        );

        $tvShow->addEpisode('Pilot', 1, 1);
        $tvShow->addEpisode('Cat\'s in the Bag...', 1, 2);
        $tvShow->addEpisode('...And the Bag\'s in the River', 1, 3);
        $tvShow->addEpisode('Cancer Man', 1, 4);
        $tvShow->addEpisode('Gray Matter', 1, 5);
        $tvShow->addEpisode('Crazy Handful of Nothin\'', 1, 6);
        $tvShow->addEpisode('A No-Rough-Stuff-Type Deal', 1, 7);

        $tvShow->addEpisode('Seven Thirty-Seven', 2, 1);
        $tvShow->addEpisode('Grilled', 2, 2);
        $tvShow->addEpisode('Bit by a Dead Bee', 2, 3);
        $tvShow->addEpisode('Down', 2, 4);
        $tvShow->addEpisode('Breakage', 2, 5);
        $tvShow->addEpisode('Peekaboo', 2, 6);
        $tvShow->addEpisode('Negro y Azul', 2, 7);
        $tvShow->addEpisode('Better Call Saul', 2, 8);
        $tvShow->addEpisode('4 Days Out', 2, 9);
        $tvShow->addEpisode('Over', 2, 10);
        $tvShow->addEpisode('Mandala', 2, 11);
        $tvShow->addEpisode('Phoenix', 2, 12);
        $tvShow->addEpisode('ABQ', 2, 13);

        $tvShow->addEpisode('No Más', 3, 1);
        $tvShow->addEpisode('Caballo sin Nombre', 3, 2);
        $tvShow->addEpisode('I.F.T.', 3, 3);
        $tvShow->addEpisode('Green Light', 3, 4);
        $tvShow->addEpisode('Más', 3, 5);
        $tvShow->addEpisode('Sunset', 3, 6);
        $tvShow->addEpisode('One Minute', 3, 7);
        $tvShow->addEpisode('I See You', 3, 8);
        $tvShow->addEpisode('Kafkaesque', 3, 9);
        $tvShow->addEpisode('Fly', 3, 10);
        $tvShow->addEpisode('Abiquiu', 3, 11);
        $tvShow->addEpisode('Half Measures', 3, 12);
        $tvShow->addEpisode('Full Measure', 3, 13);

        $tvShow->addEpisode('Box Cutter', 4, 1);
        $tvShow->addEpisode('Thirty-Eight Snub', 4, 2);
        $tvShow->addEpisode('Open House', 4, 3);
        $tvShow->addEpisode('Bullet Points', 4, 4);
        $tvShow->addEpisode('Shotgun', 4, 5);
        $tvShow->addEpisode('Cornered', 4, 6);
        $tvShow->addEpisode('Problem Dog', 4, 7);
        $tvShow->addEpisode('Hermanos', 4, 8);
        $tvShow->addEpisode('Bug', 4, 9);
        $tvShow->addEpisode('Salud', 4, 10);
        $tvShow->addEpisode('Crawl Space', 4, 11);
        $tvShow->addEpisode('End Times', 4, 12);
        $tvShow->addEpisode('Face Off', 4, 13);

        $tvShow->addEpisode('Live Free or Die', 5, 1);
        $tvShow->addEpisode('Madrigal', 5, 2);
        $tvShow->addEpisode('Hazard Pay', 5, 3);
        $tvShow->addEpisode('Fifty-One', 5, 4);
        $tvShow->addEpisode('Dead Freight', 5, 5);
        $tvShow->addEpisode('Buyout', 5, 6);
        $tvShow->addEpisode('Say My Name', 5, 7);
        $tvShow->addEpisode('Gliding Over All', 5, 8);
        $tvShow->addEpisode('Blood Money', 5, 9);
        $tvShow->addEpisode('Buried', 5, 10);
        $tvShow->addEpisode('Confessions', 5, 11);
        $tvShow->addEpisode('Rabid Dog', 5, 12);
        $tvShow->addEpisode('To\'hajiilee', 5, 13);
        $tvShow->addEpisode('Ozymandias', 5, 14);
        $tvShow->addEpisode('Granite State', 5, 15);
        $tvShow->addEpisode('Felina', 5, 16);

        $tvShow->addCastMember(new CastMember('Bryan Cranston', 1956));
        $tvShow->addCastMember(new CastMember('Anna Gunn', 1968));
        $tvShow->addCastMember(new CastMember('Aaron Paul', 1979));
        $tvShow->addCastMember(new CastMember('Dean Norris', 1963));
        $tvShow->addCastMember(new CastMember('Betsy Brandt', 1973));
        $tvShow->addCastMember(new CastMember('RJ Mitte', 1992));
        $tvShow->addCastMember(new CastMember('Bob Odenkirk', 1962));
        $tvShow->addCastMember(new CastMember('Steven Michael', 1963));
        $tvShow->addCastMember(new CastMember('Jonathan Banks', 1947));
        $tvShow->addCastMember(new CastMember('Giancarlo Esposito', 1958));

        return $tvShow;
    }

    private function addTrueDetective(): TvShow
    {
        $tvShow = new TvShow(
            'True Detective',
            9.0,
            ['Crime', 'Drama', 'Mystery', 'Thriller'],
            'Seasonal anthology series in which police investigations unearth the personal and professional secrets of those involved, both within and outside the law.'
        );

        $tvShow->addEpisode('The Long Bright Dark', 1, 1);
        $tvShow->addEpisode('Seeing Things', 1, 2);
        $tvShow->addEpisode('The Locked Room', 1, 3);
        $tvShow->addEpisode('Who Goes There', 1, 4);
        $tvShow->addEpisode('The Secret Fate of All Life', 1, 5);
        $tvShow->addEpisode('Haunted Houses', 1, 6);
        $tvShow->addEpisode('After You\'ve Gone', 1, 7);
        $tvShow->addEpisode('Form and Void', 1, 8);

        $tvShow->addEpisode('The Western Book of the Dead', 2, 1);
        $tvShow->addEpisode('Night Finds You', 2, 2);
        $tvShow->addEpisode('Maybe Tomorrow', 2, 3);
        $tvShow->addEpisode('Down Will Come', 2, 4);
        $tvShow->addEpisode('Other Lives', 2, 5);
        $tvShow->addEpisode('Church in Ruins', 2, 6);
        $tvShow->addEpisode('Black Maps and Motel Rooms', 2, 7);
        $tvShow->addEpisode('Omega Station', 2, 8);
    
        $tvShow->addEpisode('The Great War and Modern Memory', 3, 1);
        $tvShow->addEpisode('Kiss Tomorrow Goodbye', 3, 2);
        $tvShow->addEpisode('The Big Never', 3, 3);
        $tvShow->addEpisode('The Hour and the Day', 3, 4);
        $tvShow->addEpisode('If You Have Ghosts', 3, 5);
        $tvShow->addEpisode('Hunters in the Dark', 3, 6);
        $tvShow->addEpisode('The Final Country', 3, 7);
        $tvShow->addEpisode('Now Am Found', 3, 8);

        $tvShow->addCastMember(new CastMember('Matthew McConaughey', 1969));
        $tvShow->addCastMember(new CastMember('Woody Harrelson', 1961));
        $tvShow->addCastMember(new CastMember('Michelle Monaghan', 1976));
        $tvShow->addCastMember(new CastMember('Tory Kittles', 1975));
        $tvShow->addCastMember(new CastMember('Colin Farrell', 1976));
        $tvShow->addCastMember(new CastMember('Rachel McAdams', 1978));
        $tvShow->addCastMember(new CastMember('Taylor Kitsch', 1981));
        $tvShow->addCastMember(new CastMember('Kelly Reilly', 1977));
        $tvShow->addCastMember(new CastMember('Vince Vaughn', 1970));
        $tvShow->addCastMember(new CastMember('Mahershala Ali', 1974));
        $tvShow->addCastMember(new CastMember('Carmen Ejogo', 1973));
        $tvShow->addCastMember(new CastMember('Stephen Dorff', 1973));
        $tvShow->addCastMember(new CastMember('Scoot McNairy', 1977));
        $tvShow->addCastMember(new CastMember('Ray Fisher', 1987));

        return $tvShow;
    }
}
