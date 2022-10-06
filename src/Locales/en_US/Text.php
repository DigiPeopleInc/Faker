<?php

namespace Digipeopleinc\Faker\Locales\en_US;

class Text
{
    private static array $texts = [
        "news" => <<<EOT
At the monthly meeting of Google employees, its head Sundar Pichai announced changes to the management system that should "make the company simpler."
Three main principles that Google now professes: less OKRs, fewer meetings, fewer distractions.
The implementation of these principles should make the company more productive in the face of the threat of an impending recession.

An audio recording of Pichai's speech was given to Insider by one of the employees present at the meeting.
“Google is operating in a challenging macro environment,” Pichai said, “and there are many opportunities ahead of it to scale the business and continue to influence many processes.
But to do this, you need to “simplify the company” and manage complexity as you scale.”

One of the biggest and most visible changes will be a reduction in the number of company-wide OKRs (goals and key results) - the system for setting and achieving goals used by Google and other technology companies - will be cut by a third by 2023.

The next step will be the reduction of working meetings.
To do this, they will begin to use a new resource called "Meeting Refactoring", with the help of which Google employees will determine whether a meeting is necessary and how to make it more efficient.

In July, Google conducted the Simplicity Sprint, an employee survey designed to find weaknesses in the company's management, as well as ways to improve focus and efficiency.
Pichai called the results of this survey, which included more than 6,000 people, "amazing".

The confusion reigning in the system of working tools was revealed.
Google uses a range of custom and third-party tools of its own, but they have long been a source of frustration for employees who complain about their incompatibility and lack of functionality.

Another problem to be solved is the onboarding of new employees.
Google is working to ensure that already now 90% of "nooglers" (as Google recruits are called) can begin their duties on the first day.
According to Pichai, employee training will also change, and for the better.

The announced changes are just a part of the future measures that the company can start using right now.
EOT,
        "it" => <<<EOT
Is there life in Go after C#?

Hi all! In touch with Peter, a Go-developer in the Ozon team, which manages the goods of the marketplace.
Everything that sellers upload is processed by our services. Nine months ago, I changed my main programming language from C# to Go, which is new to me.
The article will be impressions of Go, talk about some of the differences between the languages, and at the end I will share my experience of finding a job in a new language.
After all, the question of changing the technology stack sooner or later confronts every developer.

Why go?

I worked at Sharpe for two and a half years.
First, he developed software for the oil and gas industry.
We made monolithic desktop applications on .NET Framework, WPF and WinForms.
After a little over a year, I wanted to change, and I moved to a company that provides money transfers in Europe.
At the interview, I was promised sawing a monolithic kernel (again .NET Framework).
But in a year, only a small part of the code was allowed to be moved to a separate service on .NET 5.0. Basically, I wrote business logic in stored procedures.

I can't say that I was happy with this job. I was looking for something new, read the news in Telegram channels and began to meet information about Go everywhere.
Learned that Docker, Kubernetes, Jaeger and other famous products are written on it.
Many companies, such as Netflix, Twitch, Dropbox, are porting performance-demanding pieces of software to it.
In Russia, it is used by Yandex, Avito, Ozon, VK and other IT giants.
When I was looking for my first job in Go, I came across two companies that were switching to this language from C #: the first was developing a gaming platform, the second was developing cloud storage.

Market volume

In the fall of 2021, there were twice as many vacancies in C# than in Go (I compared the HeadHunter search results in Moscow for the keywords “C# developer” and “Go developer”). But this did not bother me, since the market at that time was very hot. It was felt that, having two and a half years of commercial experience, there would be no problems with the transition to a new language.

Availability of training

I often came across ads for Go courses from Skillbox, GeekBrains, Slurm and other projects.
Yandex Practicum was finishing the preparation of the course "Advanced Go-developer".
In the fall, Ozon launched the first enrollment for free Route 256 courses.
To get the missing knowledge about microservices in C #, I signed up for the appropriate course.
At the same time, I saw an advertisement for the free Golang Developer program from CloudMTS.
The selection stages were not difficult, so I got there. Thus began the acquaintance with the new language.

EOT

    ];

    public static array $lastNames = [
        'Abbott', 'Abernathy', 'Abshire', 'Adams', 'Altenwerth', 'Anderson', 'Ankunding', 'Armstrong', 'Auer', 'Aufderhar',
        'Bahringer', 'Bailey', 'Balistreri', 'Barrows', 'Bartell', 'Bartoletti', 'Barton', 'Bashirian', 'Batz', 'Bauch', 'Baumbach', 'Bayer', 'Beahan', 'Beatty', 'Bechtelar', 'Becker', 'Bednar', 'Beer', 'Beier', 'Berge', 'Bergnaum', 'Bergstrom', 'Bernhard', 'Bernier', 'Bins', 'Blanda', 'Blick', 'Block', 'Bode', 'Boehm', 'Bogan', 'Bogisich', 'Borer', 'Bosco', 'Botsford', 'Boyer', 'Boyle', 'Bradtke', 'Brakus', 'Braun', 'Breitenberg', 'Brekke', 'Brown', 'Bruen', 'Buckridge',
        'Carroll', 'Carter', 'Cartwright', 'Casper', 'Cassin', 'Champlin', 'Christiansen', 'Cole', 'Collier', 'Collins', 'Conn', 'Connelly', 'Conroy', 'Considine', 'Corkery', 'Cormier', 'Corwin', 'Cremin', 'Crist', 'Crona', 'Cronin', 'Crooks', 'Cruickshank', 'Cummerata', 'Cummings',
        'Dach', 'D\'Amore', 'Daniel', 'Dare', 'Daugherty', 'Davis', 'Deckow', 'Denesik', 'Dibbert', 'Dickens', 'Dicki', 'Dickinson', 'Dietrich', 'Donnelly', 'Dooley', 'Douglas', 'Doyle', 'DuBuque', 'Durgan',
        'Ebert', 'Effertz', 'Eichmann', 'Emard', 'Emmerich', 'Erdman', 'Ernser',
        'Fadel', 'Fahey', 'Farrell', 'Fay', 'Feeney', 'Feest', 'Feil', 'Ferry', 'Fisher', 'Flatley', 'Frami', 'Franecki', 'Friesen', 'Fritsch', 'Funk',
        'Gaylord', 'Gerhold', 'Gerlach', 'Gibson', 'Gislason', 'Gleason', 'Gleichner', 'Glover', 'Goldner', 'Goodwin', 'Gorczany', 'Gottlieb', 'Goyette', 'Grady', 'Graham', 'Grant', 'Green', 'Greenfelder', 'Greenholt', 'Grimes', 'Gulgowski', 'Gusikowski', 'Gutkowski', 'Gutmann',
        'Haag', 'Hackett', 'Hagenes', 'Hahn', 'Haley', 'Halvorson', 'Hamill', 'Hammes', 'Hand', 'Hane', 'Hansen', 'Harber', 'Harris', 'Hartmann', 'Harvey', 'Hauck', 'Hayes', 'Heaney', 'Heathcote', 'Hegmann', 'Heidenreich', 'Heller', 'Herman', 'Hermann', 'Hermiston', 'Herzog', 'Hessel', 'Hettinger', 'Hickle', 'Hill', 'Hills', 'Hilpert', 'Hintz', 'Hirthe', 'Hodkiewicz', 'Hoeger', 'Homenick', 'Hoppe', 'Howe', 'Howell', 'Hudson', 'Huel', 'Huels', 'Hyatt',
        'Jacobi', 'Jacobs', 'Jacobson', 'Jakubowski', 'Jaskolski', 'Jast', 'Jenkins', 'Jerde', 'Johns', 'Johnson', 'Johnston', 'Jones',
        'Kassulke', 'Kautzer', 'Keebler', 'Keeling', 'Kemmer', 'Kerluke', 'Kertzmann', 'Kessler', 'Kiehn', 'Kihn', 'Kilback', 'King', 'Kirlin', 'Klein', 'Kling', 'Klocko', 'Koch', 'Koelpin', 'Koepp', 'Kohler', 'Konopelski', 'Koss', 'Kovacek', 'Kozey', 'Krajcik', 'Kreiger', 'Kris', 'Kshlerin', 'Kub', 'Kuhic', 'Kuhlman', 'Kuhn', 'Kulas', 'Kunde', 'Kunze', 'Kuphal', 'Kutch', 'Kuvalis',
        'Labadie', 'Lakin', 'Lang', 'Langosh', 'Langworth', 'Larkin', 'Larson', 'Leannon', 'Lebsack', 'Ledner', 'Leffler', 'Legros', 'Lehner', 'Lemke', 'Lesch', 'Leuschke', 'Lind', 'Lindgren', 'Littel', 'Little', 'Lockman', 'Lowe', 'Lubowitz', 'Lueilwitz', 'Luettgen', 'Lynch',
        'Macejkovic', 'Maggio', 'Mann', 'Mante', 'Marks', 'Marquardt', 'Marvin', 'Mayer', 'Mayert', 'McClure', 'McCullough', 'McDermott', 'McGlynn', 'McKenzie', 'McLaughlin', 'Medhurst', 'Mertz', 'Metz', 'Miller', 'Mills', 'Mitchell', 'Moen', 'Mohr', 'Monahan', 'Moore', 'Morar', 'Morissette', 'Mosciski', 'Mraz', 'Mueller', 'Muller', 'Murazik', 'Murphy', 'Murray',
        'Nader', 'Nicolas', 'Nienow', 'Nikolaus', 'Nitzsche', 'Nolan',
        'Oberbrunner', 'O\'Connell', 'O\'Conner', 'O\'Hara', 'O\'Keefe', 'O\'Kon', 'Okuneva', 'Olson', 'Ondricka', 'O\'Reilly', 'Orn', 'Ortiz', 'Osinski',
        'Pacocha', 'Padberg', 'Pagac', 'Parisian', 'Parker', 'Paucek', 'Pfannerstill', 'Pfeffer', 'Pollich', 'Pouros', 'Powlowski', 'Predovic', 'Price', 'Prohaska', 'Prosacco', 'Purdy',
        'Quigley', 'Quitzon',
        'Rath', 'Ratke', 'Rau', 'Raynor', 'Reichel', 'Reichert', 'Reilly', 'Reinger', 'Rempel', 'Renner', 'Reynolds', 'Rice', 'Rippin', 'Ritchie', 'Robel', 'Roberts', 'Rodriguez', 'Rogahn', 'Rohan', 'Rolfson', 'Romaguera', 'Roob', 'Rosenbaum', 'Rowe', 'Ruecker', 'Runolfsdottir', 'Runolfsson', 'Runte', 'Russel', 'Rutherford', 'Ryan',
        'Sanford', 'Satterfield', 'Sauer', 'Sawayn', 'Schaden', 'Schaefer', 'Schamberger', 'Schiller', 'Schimmel', 'Schinner', 'Schmeler', 'Schmidt', 'Schmitt', 'Schneider', 'Schoen', 'Schowalter', 'Schroeder', 'Schulist', 'Schultz', 'Schumm', 'Schuppe', 'Schuster', 'Senger', 'Shanahan', 'Shields', 'Simonis', 'Sipes', 'Skiles', 'Smith', 'Smitham', 'Spencer', 'Spinka', 'Sporer', 'Stamm', 'Stanton', 'Stark', 'Stehr', 'Steuber', 'Stiedemann', 'Stokes', 'Stoltenberg', 'Stracke', 'Streich', 'Stroman', 'Strosin', 'Swaniawski', 'Swift',
        'Terry', 'Thiel', 'Thompson', 'Tillman', 'Torp', 'Torphy', 'Towne', 'Toy', 'Trantow', 'Tremblay', 'Treutel', 'Tromp', 'Turcotte', 'Turner',
        'Ullrich', 'Upton',
        'Vandervort', 'Veum', 'Volkman', 'Von', 'VonRueden',
        'Waelchi', 'Walker', 'Walsh', 'Walter', 'Ward', 'Waters', 'Watsica', 'Weber', 'Wehner', 'Weimann', 'Weissnat', 'Welch', 'West', 'White', 'Wiegand', 'Wilderman', 'Wilkinson', 'Will', 'Williamson', 'Willms', 'Windler', 'Wintheiser', 'Wisoky', 'Wisozk', 'Witting', 'Wiza', 'Wolf', 'Wolff', 'Wuckert', 'Wunsch', 'Wyman',
        'Yost', 'Yundt',
        'Zboncak', 'Zemlak', 'Ziemann', 'Zieme', 'Zulauf'
    ];

    public static function resourceUpperCaseCharacters(): array
    {
        return [
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"
        ];
    }

    public static function resourceLowerCaseCharacters(): array
    {
        return [
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"
        ];
    }

    public static function resourceNumbers(): array
    {
        return [
            0, 1, 2, 3, 4, 5, 6, 7, 8, 9
        ];
    }

    public static function resourceSymbols(): array
    {
        return [
            "!", "\"", "#", "$", "%", "&", "'", "(", ")", "*", "+", ",", "-", ".", "/", ":", ";", "<", "=", ">", "?", "@", "[", "\\", "]", "^", "_", "`", "{", "|", "}",
        ];
    }

    public static function resourceWordsByTopic(): array
    {
        return [
            "news" => [
                "News", "Economy", "Politics", "Today", "Important", "UN", "Auto", "Ecology", "Climate", "Crisis",
                "Prices", "Nature", "Epidemic", "Urgent", "Space", "Weather", "Banks", "Security"
            ],
            "it" => [
                "Computer", "Virus", "Development", "Hacking", "Design", "Marketing", "Work", "Design", "Programming",
                "Program", "Processor", "Video", "Frontend", "Backend", "Manager", "Security"
            ],
        ];
    }

    /**
     * Разбивает указанный текст на тему на отдельные слова
     * @return array
     */
    public static function resourceTextsByTopicExploded(): array
    {
        $result = [];
        foreach (self::$texts as $topic => $text) {
            $result[$topic] = explode(" ", (preg_replace('/\s+/u', ' ', $text)));
        }
        return $result;
    }

    public static function resourceMalePersons(): array
    {
        return [
            "firstNames" => [
                'Aaron', 'Abdiel', 'Abdul', 'Abdullah', 'Abe', 'Abel', 'Abelardo', 'Abner', 'Abraham', 'Adalberto', 'Adam', 'Adan', 'Adelbert', 'Adolf', 'Adolfo', 'Adolph', 'Adolphus', 'Adonis', 'Adrain', 'Adrian', 'Adriel', 'Adrien', 'Afton', 'Agustin', 'Ahmad', 'Ahmed', 'Aidan', 'Aiden', 'Akeem', 'Al', 'Alan', 'Albert', 'Alberto', 'Albin', 'Alden', 'Alec', 'Alejandrin', 'Alek', 'Alessandro', 'Alex', 'Alexander', 'Alexandre', 'Alexandro', 'Alexie', 'Alexis', 'Alexys', 'Alexzander', 'Alf', 'Alfonso', 'Alfonzo', 'Alford', 'Alfred', 'Alfredo', 'Ali', 'Allan', 'Allen', 'Alphonso', 'Alvah', 'Alvis', 'Amani', 'Amari', 'Ambrose', 'Americo', 'Amir', 'Amos', 'Amparo', 'Anastacio', 'Anderson', 'Andre', 'Andres', 'Andrew', 'Andy', 'Angel', 'Angelo', 'Angus', 'Anibal', 'Ansel', 'Ansley', 'Anthony', 'Antone', 'Antonio', 'Antwan', 'Antwon', 'Arch', 'Archibald', 'Arden', 'Arely', 'Ari', 'Aric', 'Ariel', 'Arjun', 'Arlo', 'Armand', 'Armando', 'Armani', 'Arnaldo', 'Arne', 'Arno', 'Arnold', 'Arnoldo', 'Arnulfo', 'Aron', 'Art', 'Arthur', 'Arturo', 'Arvel', 'Arvid', 'Ashton', 'August', 'Augustus', 'Aurelio', 'Austen', 'Austin', 'Austyn', 'Avery', 'Axel', 'Ayden',
                'Bailey', 'Barney', 'Baron', 'Barrett', 'Barry', 'Bart', 'Bartholome', 'Barton', 'Baylee', 'Beau', 'Bell', 'Ben', 'Benedict', 'Benjamin', 'Bennett', 'Bennie', 'Benny', 'Benton', 'Bernard', 'Bernardo', 'Bernhard', 'Bernie', 'Berry', 'Berta', 'Bertha', 'Bertram', 'Bertrand', 'Bill', 'Billy', 'Blair', 'Blaise', 'Blake', 'Blaze', 'Bo', 'Bobbie', 'Bobby', 'Boris', 'Boyd', 'Brad', 'Braden', 'Bradford', 'Bradley', 'Bradly', 'Brady', 'Braeden', 'Brain', 'Brando', 'Brandon', 'Brandt', 'Brannon', 'Branson', 'Brant', 'Braulio', 'Braxton', 'Brayan', 'Brendan', 'Brenden', 'Brendon', 'Brennan', 'Brennon', 'Brent', 'Bret', 'Brett', 'Brian', 'Brice', 'Brock', 'Broderick', 'Brody', 'Brook', 'Brooks', 'Brown', 'Bruce', 'Bryce', 'Brycen', 'Bryon', 'Buck', 'Bud', 'Buddy', 'Buford', 'Burley', 'Buster',
                'Cade', 'Caden', 'Caesar', 'Cale', 'Caleb', 'Camden', 'Cameron', 'Camren', 'Camron', 'Camryn', 'Candelario', 'Candido', 'Carey', 'Carleton', 'Carlo', 'Carlos', 'Carmel', 'Carmelo', 'Carmine', 'Carol', 'Carroll', 'Carson', 'Carter', 'Cary', 'Casey', 'Casimer', 'Casimir', 'Casper', 'Ceasar', 'Cecil', 'Cedrick', 'Celestino', 'Cesar', 'Chad', 'Chadd', 'Chadrick', 'Chaim', 'Chance', 'Chandler', 'Charles', 'Charley', 'Charlie', 'Chase', 'Chauncey', 'Chaz', 'Chelsey', 'Chesley', 'Chester', 'Chet', 'Chris', 'Christ', 'Christian', 'Christop', 'Christophe', 'Christopher', 'Cicero', 'Cielo', 'Clair', 'Clark', 'Claud', 'Claude', 'Clay', 'Clemens', 'Clement', 'Cleo', 'Cletus', 'Cleve', 'Cleveland', 'Clifford', 'Clifton', 'Clint', 'Clinton', 'Clovis', 'Cloyd', 'Clyde', 'Coby', 'Cody', 'Colby', 'Cole', 'Coleman', 'Colin', 'Collin', 'Colt', 'Colten', 'Colton', 'Columbus', 'Conner', 'Connor', 'Conor', 'Conrad', 'Constantin', 'Consuelo', 'Cooper', 'Corbin', 'Cordelia', 'Cordell', 'Cornelius', 'Cornell', 'Cortez', 'Cory', 'Coty', 'Coy', 'Craig', 'Crawford', 'Cristian', 'Cristina', 'Cristobal', 'Cristopher', 'Cruz', 'Cullen', 'Curt', 'Curtis', 'Cyril', 'Cyrus',
                'Dagmar', 'Dale', 'Dallas', 'Dallin', 'Dalton', 'Dameon', 'Damian', 'Damien', 'Damion', 'Damon', 'Dan', 'Dane', 'D\'angelo', 'Dangelo', 'Danial', 'Danny', 'Dante', 'Daren', 'Darian', 'Darien', 'Dario', 'Darion', 'Darius', 'Daron', 'Darrel', 'Darrell', 'Darren', 'Darrick', 'Darrin', 'Darrion', 'Darron', 'Darryl', 'Darwin', 'Daryl', 'Dashawn', 'Dave', 'David', 'Davin', 'Davion', 'Davon', 'Davonte', 'Dawson', 'Dax', 'Dayne', 'Dayton', 'Dean', 'Deangelo', 'Declan', 'Dedric', 'Dedrick', 'Dee', 'Deion', 'Dejon', 'Dejuan', 'Delaney', 'Delbert', 'Dell','Delmer', 'Demarco', 'Demarcus', 'Demario', 'Demetrius', 'Demond', 'Denis', 'Dennis', 'Deon', 'Deondre', 'Deontae', 'Deonte', 'Dereck', 'Derek', 'Derick', 'Deron', 'Derrick', 'Deshaun', 'Deshawn', 'Desmond', 'Destin', 'Devan', 'Devante', 'Deven', 'Devin', 'Devon', 'Devonte', 'Devyn', 'Dewayne', 'Dewitt', 'Dexter', 'Diamond', 'Diego', 'Dillan', 'Dillon', 'Dimitri', 'Dino', 'Dion', 'Dock','Domenic', 'Domenick', 'Domenico', 'Domingo', 'Dominic', 'Don', 'Donald', 'Donato', 'Donavon', 'Donnell', 'Donnie', 'Donny', 'Dorcas', 'Dorian', 'Doris', 'Dorthy', 'Doug', 'Douglas', 'Doyle', 'Drake', 'Dudley', 'Duncan', 'Durward', 'Dustin', 'Dusty', 'Dwight', 'Dylan',
                'Earl', 'Earnest', 'Easter', 'Easton', 'Ed', 'Edd', 'Eddie', 'Edgar', 'Edgardo', 'Edison', 'Edmond', 'Edmund', 'Eduardo', 'Edward', 'Edwardo', 'Edwin', 'Efrain', 'Efren', 'Einar', 'Eino', 'Eladio', 'Elbert', 'Eldon', 'Eldred', 'Eleazar', 'Eli', 'Elian', 'Elias', 'Eliezer', 'Elijah', 'Eliseo', 'Elliot', 'Elliott', 'Ellis', 'Ellsworth', 'Elmer', 'Elmo', 'Elmore', 'Eloy', 'Elroy', 'Elton', 'Elvis', 'Elwin', 'Elwyn', 'Emanuel', 'Emerald', 'Emerson', 'Emery', 'Emil', 'Emile', 'Emiliano', 'Emilio', 'Emmanuel', 'Emmet', 'Emmett', 'Emmitt', 'Emory', 'Enid', 'Enoch', 'Enos', 'Enrico', 'Enrique', 'Ephraim', 'Eriberto', 'Eric', 'Erich', 'Erick', 'Erik', 'Erin', 'Erling', 'Ernest', 'Ernesto', 'Ernie', 'Ervin', 'Erwin', 'Esteban', 'Estevan', 'Ethan', 'Ethel', 'Eugene', 'Eusebio', 'Evan', 'Evans', 'Everardo', 'Everett', 'Evert', 'Ewald', 'Ewell', 'Ezekiel', 'Ezequiel', 'Ezra',
                'Fabian', 'Faustino', 'Fausto', 'Favian', 'Federico', 'Felipe', 'Felix', 'Felton', 'Fermin', 'Fern', 'Fernando', 'Ferne', 'Fidel', 'Filiberto',  'Finn', 'Flavio','Fletcher', 'Florencio', 'Florian', 'Floy', 'Floyd', 'Ford', 'Forest', 'Forrest', 'Foster', 'Francesco', 'Francis', 'Francisco', 'Franco', 'Frank', 'Frankie', 'Franz', 'Fred', 'Freddie', 'Freddy', 'Frederic', 'Frederick', 'Frederik', 'Fredrick', 'Fredy', 'Freeman', 'Friedrich', 'Fritz', 'Furman',
                'Gabe', 'Gabriel', 'Gaetano', 'Gage', 'Gardner', 'Garett', 'Garfield', 'Garland', 'Garnet', 'Garnett', 'Garret', 'Garrett', 'Garrick', 'Garrison', 'Garry', 'Garth', 'Gaston', 'Gavin', 'Gay', 'Gayle', 'Gaylord', 'Gene', 'General', 'Gennaro', 'Geo', 'Geoffrey', 'George', 'Geovanni', 'Geovanny', 'Geovany', 'Gerald', 'Gerard', 'Gerardo', 'Gerhard', 'German', 'Gerson', 'Gianni', 'Gideon', 'Gilbert', 'Gilberto', 'Giles', 'Gillian', 'Gino', 'Giovani', 'Giovanni', 'Giovanny','Giuseppe', 'Glen', 'Glennie', 'Godfrey', 'Golden', 'Gonzalo', 'Gordon', 'Grady', 'Graham', 'Grant', 'Granville', 'Grayce', 'Grayson', 'Green', 'Greg', 'Gregg', 'Gregorio', 'Gregory', 'Greyson', 'Griffin', 'Grover', 'Guido', 'Guillermo', 'Guiseppe', 'Gunnar', 'Gunner', 'Gus', 'Gussie', 'Gust', 'Gustave', 'Guy',
                'Hadley', 'Hailey', 'Hal', 'Haleigh', 'Haley', 'Halle', 'Hank', 'Hans', 'Hardy', 'Harley', 'Harmon', 'Harold', 'Harrison', 'Harry', 'Harvey', 'Haskell', 'Hassan', 'Hayden', 'Hayley', 'Hazel', 'Hazle', 'Heber', 'Hector', 'Helmer', 'Henderson', 'Henri', 'Henry', 'Herbert', 'Herman', 'Hermann', 'Herminio', 'Hershel', 'Hester', 'Hilario', 'Hilbert', 'Hillard', 'Hilton', 'Hipolito', 'Hiram', 'Hobart', 'Holden', 'Hollis', 'Horace', 'Horacio', 'Houston', 'Howard', 'Howell', 'Hoyt', 'Hubert', 'Hudson', 'Hugh', 'Humberto', 'Hunter', 'Hyman',
                'Ian', 'Ibrahim', 'Ignacio', 'Ignatius', 'Ike', 'Imani', 'Immanuel', 'Irving', 'Irwin', 'Isaac', 'Isac', 'Isadore', 'Isai', 'Isaiah', 'Isaias', 'Isidro', 'Ismael', 'Isom', 'Israel', 'Issac', 'Izaiah',
                'Jabari', 'Jace', 'Jacey', 'Jacinto', 'Jack', 'Jackson', 'Jacques', 'Jaden', 'Jadon', 'Jaeden', 'Jaiden', 'Jaime', 'Jairo', 'Jake', 'Jakob', 'Jaleel', 'Jalen', 'Jalon', 'Jamaal', 'Jamal', 'Jamar', 'Jamarcus', 'Jamel', 'Jameson', 'Jamey', 'Jamie', 'Jamil', 'Jamir', 'Jamison', 'Jan', 'Janick', 'Jaquan', 'Jared', 'Jaren', 'Jarod', 'Jaron', 'Jarred', 'Jarrell', 'Jarret', 'Jarrett', 'Jarrod', 'Jarvis', 'Jasen', 'Jasmin', 'Jason', 'Jasper', 'Javier', 'Javon', 'Javonte', 'Jay', 'Jayce', 'Jaycee',  'Jayde', 'Jayden', 'Jaydon', 'Jaylan', 'Jaylen', 'Jaylin', 'Jaylon', 'Jayme', 'Jayson', 'Jean', 'Jed', 'Jedediah', 'Jedidiah', 'Jeff', 'Jefferey', 'Jeffery', 'Jeffrey', 'Jeffry', 'Jennings', 'Jensen', 'Jerad', 'Jerald', 'Jeramie', 'Jeramy', 'Jerel', 'Jeremie', 'Jeremy', 'Jermain', 'Jermey', 'Jerod', 'Jerome', 'Jeromy', 'Jerrell', 'Jerrod', 'Jerrold', 'Jerry', 'Jess', 'Jesse', 'Jessie', 'Jessy', 'Jesus', 'Jett', 'Jettie', 'Jevon', 'Jillian', 'Jimmie', 'Jimmy', 'Jo', 'Joan', 'Joany', 'Joaquin', 'Jocelyn', 'Joe', 'Joel',  'Joesph', 'Joey', 'Johan', 'Johann', 'Johathan', 'John', 'Johnathan', 'Johnathon', 'Johnnie', 'Johnny', 'Johnpaul', 'Johnson', 'Jon', 'Jonas', 'Jonatan', 'Jonathan', 'Jonathon', 'Jordan', 'Jordi', 'Jordon', 'Jordy', 'Jordyn', 'Jorge', 'Jose', 'Joseph', 'Josh', 'Joshua', 'Joshuah', 'Josiah', 'Josue', 'Jovan', 'Jovani', 'Jovanny', 'Jovany', 'Judah', 'Judd', 'Judge', 'Judson', 'Jules', 'Julian', 'Julien', 'Julio', 'Julius', 'Junior', 'Junius', 'Justen', 'Justice', 'Juston', 'Justus', 'Justyn', 'Juvenal', 'Juwan',
                'Kacey', 'Kade', 'Kaden', 'Kadin', 'Kale', 'Kaleb', 'Kaleigh', 'Kaley', 'Kameron', 'Kamren', 'Kamron', 'Kamryn', 'Kane', 'Kareem', 'Karl', 'Karley', 'Karson', 'Kay', 'Kayden', 'Kayleigh', 'Kayley', 'Keagan', 'Keanu', 'Keaton', 'Keegan', 'Keeley', 'Keenan', 'Keith', 'Kellen', 'Kelley', 'Kelton', 'Kelvin', 'Ken', 'Kendall', 'Kendrick', 'Kennedi', 'Kennedy', 'Kenneth', 'Kennith', 'Kenny', 'Kenton', 'Kenyon', 'Keon', 'Keshaun', 'Keshawn', 'Keven', 'Kevin', 'Kevon', 'Keyon', 'Keyshawn', 'Khalid', 'Khalil', 'Kian', 'Kiel', 'Kieran', 'Kiley', 'Kim', 'King', 'Kip', 'Kirk', 'Kobe', 'Koby', 'Kody', 'Kolby', 'Kole', 'Korbin', 'Korey', 'Kory', 'Kraig', 'Kris', 'Kristian', 'Kristofer', 'Kristoffer', 'Kristopher', 'Kurt', 'Kurtis', 'Kyle', 'Kyleigh', 'Kyler',
                'Ladarius', 'Lafayette', 'Lamar', 'Lambert', 'Lamont', 'Lance', 'Landen', 'Lane', 'Laron', 'Larry', 'Larue', 'Laurel', 'Lavern', 'Laverna', 'Laverne', 'Lavon', 'Lawrence', 'Lawson', 'Layne', 'Lazaro', 'Lee', 'Leif', 'Leland', 'Lemuel', 'Lennie', 'Lenny', 'Leo', 'Leon', 'Leonard', 'Leonardo', 'Leone', 'Leonel', 'Leopold', 'Leopoldo', 'Lesley', 'Lester', 'Levi', 'Lew', 'Lewis', 'Lexus', 'Liam', 'Lincoln', 'Lindsey', 'Linwood', 'Lionel', 'Lisandro', 'Llewellyn', 'Lloyd', 'Logan', 'Lon', 'London', 'Lonnie', 'Lonny', 'Lonzo', 'Lorenz', 'Lorenza', 'Lorenzo', 'Louie', 'Louisa', 'Lourdes', 'Louvenia', 'Lowell', 'Loy', 'Loyal', 'Lucas', 'Luciano', 'Lucio', 'Lucious', 'Lucius', 'Ludwig', 'Luigi', 'Luis', 'Lukas', 'Lula', 'Luther', 'Lyric',
                'Mac', 'Macey', 'Mack', 'Mackenzie', 'Madisen', 'Madison', 'Madyson', 'Magnus', 'Major', 'Makenna', 'Malachi', 'Malcolm', 'Mallory', 'Manley', 'Manuel', 'Manuela', 'Marc', 'Marcel', 'Marcelino', 'Marcellus', 'Marcelo', 'Marco', 'Marcos', 'Marcus', 'Mariano', 'Mario', 'Mark', 'Markus', 'Marley', 'Marlin', 'Marlon', 'Marques', 'Marquis', 'Marshall', 'Martin', 'Marty', 'Marvin', 'Mason', 'Mateo', 'Mathew', 'Mathias', 'Matt', 'Matteo', 'Maurice', 'Mauricio', 'Maverick', 'Mavis', 'Max', 'Maxime', 'Maximilian', 'Maximillian', 'Maximo', 'Maximus', 'Maxine', 'Maxwell', 'Maynard', 'Mckenna', 'Mckenzie', 'Mekhi', 'Melany', 'Melvin', 'Melvina', 'Merl', 'Merle', 'Merlin', 'Merritt', 'Mervin', 'Micah', 'Michael', 'Michale', 'Micheal', 'Michel', 'Miguel', 'Mike', 'Mikel', 'Milan', 'Miles', 'Milford', 'Miller', 'Milo', 'Milton', 'Misael', 'Mitchel', 'Mitchell', 'Modesto', 'Mohamed', 'Mohammad', 'Mohammed', 'Moises', 'Monroe', 'Monserrat', 'Monserrate', 'Montana', 'Monte', 'Monty', 'Morgan', 'Moriah', 'Morris', 'Mortimer', 'Morton', 'Mose', 'Moses', 'Moshe', 'Muhammad', 'Murl', 'Murphy', 'Murray', 'Mustafa', 'Myles',  'Myrl', 'Myron',
                'Napoleon', 'Narciso', 'Nash', 'Nasir', 'Nat', 'Nathan', 'Nathanael', 'Nathanial', 'Nathaniel', 'Nathen', 'Neal', 'Ned', 'Neil', 'Nels', 'Nelson', 'Nestor', 'Newell', 'Newton', 'Nicholas', 'Nicholaus', 'Nick', 'Nicklaus', 'Nickolas', 'Nico', 'Nicola', 'Nicolas', 'Nigel', 'Nikko', 'Niko', 'Nikolas', 'Nils', 'Noah', 'Noble', 'Noe', 'Noel', 'Nolan', 'Norbert', 'Norberto', 'Norris', 'Norval', 'Norwood',
                'Obie', 'Oda', 'Odell', 'Okey', 'Ola', 'Olaf', 'Ole', 'Olen', 'Olin', 'Oliver', 'Omari', 'Omer', 'Oral', 'Oran', 'Oren', 'Orin', 'Orion', 'Orland', 'Orlando', 'Orlo', 'Orrin', 'Orval', 'Orville', 'Osbaldo', 'Osborne', 'Oscar', 'Osvaldo', 'Oswald', 'Oswaldo', 'Otho', 'Otis', 'Ottis', 'Otto', 'Owen',
                'Pablo', 'Paolo', 'Paris', 'Parker', 'Patrick', 'Paul', 'Paxton', 'Payton', 'Pedro', 'Percival', 'Percy', 'Perry', 'Pete', 'Peter', 'Peyton', 'Philip', 'Pierce', 'Pierre', 'Pietro', 'Porter', 'Presley', 'Preston', 'Price', 'Prince',
                'Quentin', 'Quincy', 'Quinn', 'Quinten', 'Quinton',
                'Rafael', 'Raheem', 'Rahul', 'Raleigh', 'Ralph', 'Ramiro', 'Ramon', 'Randal', 'Randall', 'Randi', 'Randy', 'Ransom', 'Raoul', 'Raphael', 'Rashad', 'Rashawn', 'Rasheed', 'Raul', 'Raven', 'Ray', 'Raymond', 'Raymundo', 'Reagan', 'Reece', 'Reed', 'Reese', 'Regan', 'Reggie', 'Reginald', 'Reid', 'Reilly','Reinhold', 'Remington', 'Rene', 'Reuben', 'Rex', 'Rey', 'Reyes', 'Reymundo', 'Reynold', 'Rhett', 'Rhiannon', 'Ricardo', 'Richard', 'Richie', 'Richmond', 'Rick', 'Rickey', 'Rickie', 'Ricky', 'Rico', 'Rigoberto', 'Riley', 'Robb', 'Robbie', 'Robert', 'Roberto', 'Robin', 'Rocio', 'Rocky', 'Rod', 'Roderick', 'Rodger', 'Rodolfo', 'Rodrick', 'Rodrigo', 'Roel', 'Rogelio', 'Roger', 'Rogers', 'Rolando', 'Rollin', 'Roman', 'Ron', 'Ronaldo', 'Ronny', 'Roosevelt', 'Rory', 'Rosario', 'Roscoe', 'Rosendo', 'Ross', 'Rowan', 'Rowland', 'Roy', 'Royal', 'Royce', 'Ruben', 'Rudolph', 'Rudy', 'Rupert', 'Russ', 'Russel', 'Russell', 'Rusty', 'Ryan', 'Ryann', 'Ryder', 'Rylan', 'Ryleigh', 'Ryley',
                'Sage', 'Saige', 'Salvador', 'Salvatore', 'Sam', 'Samir', 'Sammie', 'Sammy', 'Samson', 'Sanford', 'Santa', 'Santiago', 'Santino', 'Santos', 'Saul', 'Savion', 'Schuyler', 'Scot', 'Scottie', 'Scotty', 'Seamus', 'Sean', 'Sebastian', 'Sedrick', 'Selmer', 'Seth', 'Shad', 'Shane', 'Shaun', 'Shawn', 'Shayne', 'Sheldon', 'Sheridan', 'Sherman', 'Sherwood', 'Sid', 'Sidney', 'Sigmund', 'Sigrid', 'Sigurd', 'Silas', 'Sim', 'Simeon', 'Skye', 'Skylar', 'Sofia', 'Soledad', 'Solon', 'Sonny', 'Spencer', 'Stan', 'Stanford', 'Stanley', 'Stanton', 'Stefan', 'Stephan', 'Stephen', 'Stephon', 'Sterling', 'Steve', 'Stevie', 'Stewart', 'Stone', 'Stuart', 'Sven', 'Sydney', 'Sylvan', 'Sylvester',
                'Tad', 'Talon', 'Tanner', 'Tate', 'Tatum', 'Taurean', 'Tavares', 'Taylor', 'Ted', 'Terence', 'Terrance', 'Terrell', 'Terrence', 'Terrill', 'Terry', 'Tevin', 'Thad', 'Thaddeus', 'Theo', 'Theodore', 'Theron', 'Thomas', 'Thurman', 'Tillman', 'Timmothy', 'Timmy', 'Timothy', 'Tito', 'Titus', 'Tobin', 'Toby', 'Tod', 'Tom', 'Tomas', 'Tommie', 'Toney', 'Toni', 'Tony', 'Torey', 'Torrance', 'Torrey', 'Toy', 'Trace', 'Tracey', 'Travis', 'Travon', 'Tre', 'Tremaine', 'Tremayne', 'Trent', 'Trenton', 'Trever', 'Trevion', 'Trevor', 'Trey',  'Tristian', 'Tristin', 'Triston', 'Troy', 'Trystan', 'Turner','Tyler', 'Tyree', 'Tyreek', 'Tyrel', 'Tyrell', 'Tyrese', 'Tyrique', 'Tyshawn', 'Tyson',
                'Ubaldo', 'Ulices', 'Ulises', 'Unique', 'Urban', 'Uriah', 'Uriel',
                'Valentin', 'Van', 'Vance', 'Vaughn', 'Vern', 'Verner', 'Vernon', 'Vicente', 'Victor', 'Vidal', 'Vince', 'Vincent', 'Vincenzo', 'Vinnie', 'Virgil', 'Vito', 'Vladimir',
                'Wade', 'Waino', 'Waldo', 'Walker', 'Wallace', 'Walter', 'Walton', 'Ward', 'Warren', 'Watson', 'Waylon', 'Wayne', 'Webster', 'Weldon', 'Wellington', 'Wendell', 'Werner', 'Westley', 'Weston', 'Wilber', 'Wilbert', 'Wilburn', 'Wiley', 'Wilford', 'Wilfred', 'Wilfredo', 'Wilfrid', 'Wilhelm', 'Will', 'Willard', 'William', 'Willis', 'Willy', 'Wilmer', 'Wilson', 'Wilton', 'Winfield', 'Winston', 'Woodrow', 'Wyatt', 'Wyman',
                'Xavier', 'Xzavier', 'Xander',
                'Zachariah', 'Zachary', 'Zachery', 'Zack', 'Zackary', 'Zackery', 'Zakary', 'Zander', 'Zane', 'Zechariah', 'Zion',
            ],
            "lastNames" => self::$lastNames,
            "secondNames" => []
        ];
    }

    public static function resourceFemalePersons(): array
    {
        return [
            "firstNames" => [
                'Aaliyah', 'Abagail', 'Abbey', 'Abbie', 'Abbigail', 'Abby', 'Abigail', 'Abigale', 'Abigayle', 'Ada', 'Adah', 'Adaline', 'Addie', 'Addison', 'Adela', 'Adele', 'Adelia', 'Adeline', 'Adell', 'Adella', 'Adelle', 'Aditya', 'Adriana', 'Adrianna', 'Adrienne', 'Aglae', 'Agnes', 'Agustina', 'Aida', 'Aileen', 'Aimee', 'Aisha', 'Aiyana', 'Alaina', 'Alana', 'Alanis', 'Alanna', 'Alayna', 'Alba', 'Alberta', 'Albertha', 'Albina', 'Alda', 'Aleen', 'Alejandra', 'Alena', 'Alene', 'Alessandra', 'Alessia', 'Aletha', 'Alexa', 'Alexandra', 'Alexandrea', 'Alexandria', 'Alexandrine', 'Alexane', 'Alexanne', 'Alfreda', 'Alia', 'Alice', 'Alicia', 'Alisa', 'Alisha', 'Alison', 'Alivia', 'Aliya', 'Aliyah', 'Aliza', 'Alize', 'Allene', 'Allie', 'Allison', 'Ally', 'Alta', 'Althea', 'Alva', 'Alvena', 'Alvera', 'Alverta', 'Alvina', 'Alyce', 'Alycia', 'Alysa', 'Alysha', 'Alyson', 'Alysson', 'Amalia', 'Amanda', 'Amara', 'Amaya', 'Amber', 'Amelia', 'Amelie', 'Amely', 'America', 'Amie', 'Amina', 'Amira', 'Amiya', 'Amy', 'Amya', 'Ana', 'Anabel', 'Anabelle', 'Anahi', 'Anais', 'Anastasia', 'Andreane', 'Andreanne', 'Angela', 'Angelica', 'Angelina', 'Angeline', 'Angelita', 'Angie', 'Anika', 'Anissa', 'Anita', 'Aniya', 'Aniyah', 'Anjali', 'Anna', 'Annabel', 'Annabell', 'Annabelle', 'Annalise', 'Annamae', 'Annamarie', 'Anne', 'Annetta', 'Annette', 'Annie', 'Antoinette', 'Antonetta', 'Antonette', 'Antonia', 'Antonietta', 'Antonina', 'Anya', 'April', 'Ara', 'Araceli', 'Aracely', 'Ardella', 'Ardith', 'Ariane', 'Arianna', 'Arielle', 'Arlene', 'Arlie', 'Arvilla', 'Aryanna', 'Asa', 'Asha', 'Ashlee', 'Ashleigh', 'Ashley', 'Ashly', 'Ashlynn', 'Ashtyn', 'Asia', 'Assunta', 'Astrid', 'Athena', 'Aubree', 'Aubrey', 'Audie', 'Audra', 'Audreanne', 'Audrey', 'Augusta', 'Augustine', 'Aurelia', 'Aurelie', 'Aurore', 'Autumn', 'Ava', 'Avis', 'Ayana', 'Ayla', 'Aylin',
                'Baby', 'Bailee', 'Barbara', 'Beatrice', 'Beaulah', 'Bella', 'Belle', 'Berenice', 'Bernadette', 'Bernadine', 'Berneice', 'Bernice', 'Berniece', 'Bernita', 'Bert', 'Beryl', 'Bessie', 'Beth', 'Bethany', 'Bethel', 'Betsy', 'Bette', 'Bettie', 'Betty', 'Bettye', 'Beulah', 'Beverly', 'Bianka', 'Billie', 'Birdie', 'Blanca', 'Blanche', 'Bonita', 'Bonnie', 'Brandi', 'Brandy', 'Brandyn', 'Breana', 'Breanna', 'Breanne', 'Brenda', 'Brenna', 'Bria', 'Briana', 'Brianne', 'Bridget', 'Bridgette', 'Bridie', 'Brielle', 'Brigitte', 'Brionna', 'Brisa', 'Britney', 'Brittany', 'Brooke', 'Brooklyn', 'Bryana', 'Bulah', 'Burdette', 'Burnice',
                'Caitlyn', 'Caleigh', 'Cali', 'Calista', 'Callie', 'Camila', 'Camilla', 'Camille', 'Camylle', 'Candace', 'Candice', 'Candida', 'Cara', 'Carissa', 'Carlee', 'Carley', 'Carli', 'Carlie', 'Carlotta', 'Carmela', 'Carmella', 'Carmen', 'Carolanne', 'Carole', 'Carolina', 'Caroline', 'Carolyn', 'Carolyne', 'Carrie', 'Casandra', 'Cassandra', 'Cassandre', 'Cassidy', 'Cassie', 'Catalina', 'Caterina', 'Catharine', 'Catherine', 'Cathrine', 'Cathryn', 'Cathy', 'Cayla', 'Cecelia', 'Cecile', 'Cecilia', 'Celestine', 'Celia', 'Celine', 'Chanel', 'Chanelle', 'Charity', 'Charlene', 'Charlotte', 'Chasity', 'Chaya', 'Chelsea', 'Chelsie', 'Cheyanne', 'Cheyenne', 'Chloe', 'Christa', 'Christelle', 'Christiana', 'Christina', 'Christine', 'Christy', 'Chyna', 'Ciara', 'Cierra', 'Cindy', 'Citlalli', 'Claire', 'Clara', 'Clarabelle', 'Clare', 'Clarissa', 'Claudia', 'Claudie', 'Claudine', 'Clementina', 'Clementine', 'Clemmie', 'Cleora', 'Cleta', 'Clotilde', 'Colleen', 'Concepcion', 'Connie', 'Constance', 'Cora', 'Coralie', 'Cordia', 'Cordie', 'Corene', 'Corine', 'Corrine', 'Cortney', 'Courtney', 'Creola', 'Cristal', 'Crystal', 'Crystel', 'Cydney', 'Cynthia',
                'Dahlia', 'Daija', 'Daisha', 'Daisy', 'Dakota', 'Damaris', 'Dana', 'Dandre', 'Daniela', 'Daniella', 'Danielle', 'Danika', 'Dannie', 'Danyka', 'Daphne', 'Daphnee', 'Daphney', 'Darby', 'Dariana', 'Darlene', 'Dasia', 'Dawn', 'Dayana', 'Dayna', 'Deanna', 'Deborah', 'Deja', 'Dejah', 'Delfina', 'Delia', 'Delilah', 'Della', 'Delores', 'Delpha', 'Delphia', 'Delphine', 'Delta', 'Demetris', 'Dena', 'Desiree', 'Dessie', 'Destany', 'Destinee', 'Destiney', 'Destini', 'Destiny', 'Diana', 'Dianna', 'Dina', 'Dixie', 'Dolly', 'Dolores', 'Domenica', 'Dominique', 'Donna', 'Dora', 'Dorothea', 'Dorothy', 'Dorris', 'Dortha', 'Dovie', 'Drew', 'Duane', 'Dulce',
                'Earlene', 'Earline', 'Earnestine', 'Ebba', 'Ebony', 'Eda', 'Eden', 'Edna', 'Edwina', 'Edyth', 'Edythe', 'Effie', 'Eileen', 'Elaina', 'Elda', 'Eldora', 'Eldridge', 'Eleanora', 'Eleanore', 'Electa', 'Elena', 'Elenor', 'Elenora', 'Eleonore', 'Elfrieda', 'Eliane', 'Elinor', 'Elinore', 'Elisa', 'Elisabeth', 'Elise', 'Elisha', 'Elissa', 'Eliza', 'Elizabeth', 'Ella', 'Ellen', 'Ellie', 'Elmira', 'Elna', 'Elnora', 'Elody', 'Eloisa', 'Eloise', 'Elouise', 'Elsa', 'Else', 'Elsie', 'Elta', 'Elva', 'Elvera', 'Elvie', 'Elyse', 'Elyssa', 'Elza', 'Emelia', 'Emelie', 'Emely', 'Emie', 'Emilia', 'Emilie', 'Emily', 'Emma', 'Emmalee', 'Emmanuelle', 'Emmie', 'Emmy', 'Ena', 'Enola', 'Era', 'Erica', 'Ericka', 'Erika', 'Erna', 'Ernestina', 'Ernestine', 'Eryn', 'Esmeralda', 'Esperanza', 'Esta', 'Estefania', 'Estel', 'Estell', 'Estella', 'Estelle', 'Esther', 'Estrella', 'Etha', 'Ethelyn', 'Ethyl', 'Ettie', 'Eudora', 'Eugenia', 'Eula', 'Eulah', 'Eulalia', 'Euna', 'Eunice', 'Eva', 'Evalyn', 'Evangeline', 'Eve', 'Eveline', 'Evelyn', 'Everette', 'Evie',
                'Fabiola', 'Fae', 'Fannie', 'Fanny', 'Fatima', 'Fay', 'Faye', 'Felicia', 'Felicita', 'Felicity', 'Felipa', 'Filomena', 'Fiona', 'Flavie', 'Fleta', 'Flo', 'Florence', 'Florida', 'Florine', 'Flossie', 'Frances', 'Francesca', 'Francisca', 'Freda', 'Frederique', 'Freeda', 'Freida', 'Frida', 'Frieda',
                'Gabriella', 'Gabrielle', 'Gail', 'Genesis', 'Genevieve', 'Genoveva', 'Georgette', 'Georgiana', 'Georgianna', 'Geraldine', 'Gerda', 'Germaine', 'Gerry', 'Gertrude', 'Gia', 'Gilda', 'Gina', 'Giovanna', 'Gisselle', 'Gladyce', 'Gladys', 'Glenda', 'Glenna', 'Gloria', 'Golda', 'Grace', 'Gracie', 'Graciela', 'Gregoria', 'Greta', 'Gretchen', 'Guadalupe', 'Gudrun', 'Gwen', 'Gwendolyn',
                'Hailee', 'Hailie', 'Halie', 'Hallie', 'Hanna', 'Hannah', 'Harmony', 'Hassie', 'Hattie', 'Haven', 'Haylee', 'Haylie', 'Heath', 'Heather', 'Heaven', 'Heidi', 'Helen', 'Helena', 'Helene', 'Helga', 'Hellen', 'Heloise', 'Henriette', 'Hermina', 'Herminia', 'Herta', 'Hertha', 'Hettie', 'Hilda', 'Hildegard', 'Hillary', 'Hilma', 'Hollie', 'Holly', 'Hope', 'Hortense', 'Hosea', 'Hulda',
                'Icie', 'Ida', 'Idell', 'Idella', 'Ila', 'Ilene', 'Iliana', 'Ima', 'Imelda', 'Imogene', 'Ines', 'Irma', 'Isabel', 'Isabell', 'Isabella', 'Isabelle', 'Isobel', 'Itzel', 'Iva', 'Ivah', 'Ivory', 'Ivy', 'Izabella',
                'Jacinthe', 'Jackeline', 'Jackie', 'Jacklyn', 'Jacky', 'Jaclyn', 'Jacquelyn', 'Jacynthe', 'Jada', 'Jade', 'Jadyn', 'Jaida', 'Jailyn', 'Jakayla', 'Jalyn', 'Jammie', 'Jana', 'Janae', 'Jane', 'Janelle', 'Janessa', 'Janet', 'Janice', 'Janie', 'Janis', 'Janiya', 'Jannie', 'Jany', 'Jaquelin', 'Jaqueline', 'Jaunita', 'Jayda', 'Jayne', 'Jazlyn', 'Jazmin', 'Jazmyn', 'Jazmyne', 'Jeanette', 'Jeanie', 'Jeanne', 'Jena', 'Jenifer', 'Jennie', 'Jennifer', 'Jennyfer', 'Jermaine', 'Jessica', 'Jessika', 'Jessyca', 'Jewel', 'Jewell', 'Joana', 'Joanie', 'Joanne', 'Joannie', 'Joanny', 'Jodie', 'Jody', 'Joelle', 'Johanna', 'Jolie', 'Jordane', 'Josefa', 'Josefina', 'Josephine', 'Josiane', 'Josianne', 'Josie', 'Joy', 'Joyce', 'Juana', 'Juanita', 'Jude', 'Judy', 'Julia', 'Juliana', 'Julianne', 'Julie', 'Juliet', 'June', 'Justina', 'Justine',
                'Kaci', 'Kacie', 'Kaela', 'Kaelyn', 'Kaia', 'Kailee', 'Kailey', 'Kailyn', 'Kaitlin', 'Kaitlyn', 'Kali', 'Kallie', 'Kamille', 'Kara', 'Karelle', 'Karen', 'Kari', 'Kariane', 'Karianne', 'Karina', 'Karine', 'Karlee', 'Karli', 'Karlie', 'Karolann', 'Kasandra', 'Kasey', 'Kassandra', 'Katarina', 'Katelin', 'Katelyn', 'Katelynn', 'Katharina', 'Katherine', 'Katheryn', 'Kathleen', 'Kathlyn', 'Kathryn', 'Kathryne', 'Katlyn', 'Katlynn', 'Katrina', 'Katrine', 'Kattie', 'Kavon', 'Kaya', 'Kaycee', 'Kayla', 'Kaylah', 'Kaylee', 'Kayli', 'Kaylie', 'Kaylin', 'Keara', 'Keely', 'Keira', 'Kelli', 'Kellie', 'Kelly', 'Kelsi', 'Kelsie', 'Kendra', 'Kenna', 'Kenya', 'Kenyatta', 'Kiana', 'Kianna', 'Kiara', 'Kiarra', 'Kiera', 'Kimberly', 'Kira', 'Kirsten', 'Kirstin', 'Kitty', 'Krista', 'Kristin', 'Kristina', 'Kristy', 'Krystal', 'Krystel', 'Krystina', 'Kyla', 'Kylee', 'Kylie', 'Kyra',
                'Lacey', 'Lacy', 'Laila', 'Laisha', 'Laney', 'Larissa', 'Laura', 'Lauren', 'Laurence', 'Lauretta', 'Lauriane', 'Laurianne', 'Laurie', 'Laurine', 'Laury', 'Lauryn', 'Lavada', 'Lavina', 'Lavinia', 'Lavonne', 'Layla', 'Lea', 'Leann', 'Leanna', 'Leanne', 'Leatha', 'Leda', 'Leila', 'Leilani', 'Lela', 'Lelah', 'Lelia', 'Lempi', 'Lenna', 'Lenora', 'Lenore', 'Leola', 'Leonie', 'Leonor', 'Leonora', 'Leora', 'Lera', 'Leslie', 'Lesly', 'Lessie', 'Leta', 'Letha', 'Letitia', 'Lexi', 'Lexie', 'Lia', 'Liana', 'Libbie', 'Libby', 'Lila', 'Lilian', 'Liliana', 'Liliane', 'Lilla', 'Lillian', 'Lilliana', 'Lillie', 'Lilly', 'Lily', 'Lilyan', 'Lina', 'Linda', 'Lindsay', 'Linnea', 'Linnie', 'Lisa', 'Lisette', 'Litzy', 'Liza', 'Lizeth', 'Lizzie', 'Lois', 'Lola', 'Lolita', 'Loma', 'Lonie', 'Lora', 'Loraine', 'Loren', 'Lorena', 'Lori', 'Lorine', 'Lorna', 'Lottie', 'Lou', 'Loyce', 'Lucie', 'Lucienne', 'Lucile', 'Lucinda', 'Lucy', 'Ludie', 'Lue', 'Luella', 'Luisa', 'Lulu', 'Luna', 'Lupe', 'Lura', 'Lurline', 'Luz', 'Lyda', 'Lydia', 'Lyla', 'Lynn', 'Lysanne',
                'Mabel', 'Mabelle', 'Mable', 'Maci', 'Macie', 'Macy', 'Madaline', 'Madalyn', 'Maddison', 'Madeline', 'Madelyn', 'Madelynn', 'Madge', 'Madie', 'Madilyn', 'Madisyn', 'Madonna', 'Mae', 'Maegan', 'Maeve', 'Mafalda', 'Magali', 'Magdalen', 'Magdalena', 'Maggie', 'Magnolia', 'Maia', 'Maida', 'Maiya', 'Makayla', 'Makenzie', 'Malika', 'Malinda', 'Mallie', 'Malvina', 'Mandy', 'Mara', 'Marcelina', 'Marcella', 'Marcelle', 'Marcia', 'Margaret', 'Margarete', 'Margarett', 'Margaretta', 'Margarette', 'Margarita', 'Marge', 'Margie', 'Margot', 'Margret', 'Marguerite', 'Maria', 'Mariah', 'Mariam', 'Marian', 'Mariana', 'Mariane', 'Marianna', 'Marianne', 'Maribel', 'Marie', 'Mariela', 'Marielle', 'Marietta', 'Marilie', 'Marilou', 'Marilyne', 'Marina', 'Marion', 'Marisa', 'Marisol', 'Maritza', 'Marjolaine', 'Marjorie', 'Marjory', 'Marlee', 'Marlen', 'Marlene', 'Marquise', 'Marta', 'Martina', 'Martine', 'Mary', 'Maryam', 'Maryjane', 'Maryse', 'Mathilde', 'Matilda', 'Matilde', 'Mattie', 'Maud', 'Maude', 'Maudie', 'Maureen', 'Maurine', 'Maxie', 'Maximillia', 'May', 'Maya', 'Maybell', 'Maybelle', 'Maye', 'Maymie', 'Mayra', 'Mazie', 'Mckayla', 'Meagan', 'Meaghan', 'Meda', 'Megane', 'Meggie', 'Meghan', 'Melba', 'Melisa', 'Melissa', 'Mellie', 'Melody', 'Melyna', 'Melyssa', 'Mercedes', 'Meredith', 'Mertie', 'Meta', 'Mia', 'Micaela', 'Michaela', 'Michele', 'Michelle', 'Mikayla', 'Millie', 'Mina', 'Minerva', 'Minnie', 'Miracle', 'Mireille', 'Mireya', 'Missouri', 'Misty', 'Mittie', 'Modesta', 'Mollie', 'Molly', 'Mona', 'Monica', 'Monique', 'Mossie', 'Mozell', 'Mozelle', 'Muriel', 'Mya', 'Myah', 'Mylene', 'Myra', 'Myriam', 'Myrna', 'Myrtice', 'Myrtie', 'Myrtis', 'Myrtle',
                'Nadia', 'Nakia', 'Name', 'Nannie', 'Naomi', 'Naomie', 'Natalia', 'Natalie', 'Natasha', 'Nayeli', 'Nedra', 'Neha', 'Nelda', 'Nella', 'Nelle', 'Nellie', 'Neoma', 'Nettie', 'Neva', 'Nia', 'Nichole', 'Nicole', 'Nicolette', 'Nikita', 'Nikki', 'Nina', 'Noelia', 'Noemi', 'Noemie', 'Noemy', 'Nola', 'Nona', 'Nora', 'Norene', 'Norma', 'Nova', 'Novella', 'Nya', 'Nyah', 'Nyasia',
                'Oceane', 'Ocie', 'Octavia', 'Odessa', 'Odie', 'Ofelia', 'Oleta', 'Olga', 'Ollie', 'Oma', 'Ona', 'Onie', 'Opal', 'Ophelia', 'Ora', 'Orie', 'Orpha', 'Otha', 'Otilia', 'Ottilie', 'Ova', 'Ozella',
                'Paige', 'Palma', 'Pamela', 'Pansy', 'Pascale', 'Pasquale', 'Pat', 'Patience', 'Patricia', 'Patsy', 'Pattie', 'Paula', 'Pauline', 'Pearl', 'Pearlie', 'Pearline', 'Peggie', 'Penelope', 'Petra', 'Phoebe', 'Phyllis', 'Pink', 'Pinkie', 'Piper', 'Polly', 'Precious', 'Princess', 'Priscilla', 'Providenci', 'Prudence',
                'Queen', 'Queenie',
                'Rachael', 'Rachel', 'Rachelle', 'Rae', 'Raegan', 'Rafaela', 'Rahsaan', 'Raina', 'Ramona', 'Raphaelle', 'Raquel', 'Reanna', 'Reba', 'Rebeca', 'Rebecca', 'Rebeka', 'Rebekah', 'Reina', 'Renee', 'Ressie', 'Reta', 'Retha', 'Retta', 'Reva', 'Reyna', 'Rhea', 'Rhianna', 'Rhoda', 'Rita', 'River', 'Roberta', 'Robyn', 'Roma', 'Romaine', 'Rosa', 'Rosalee', 'Rosalia', 'Rosalind', 'Rosalinda', 'Rosalyn', 'Rosamond', 'Rosanna', 'Rose', 'Rosella', 'Roselyn', 'Rosemarie', 'Rosemary', 'Rosetta', 'Rosie', 'Rosina', 'Roslyn', 'Rossie', 'Rowena', 'Roxane', 'Roxanne', 'Rozella', 'Rubie', 'Ruby', 'Rubye', 'Ruth', 'Ruthe', 'Ruthie', 'Rylee',
                'Sabina', 'Sabrina', 'Sabryna', 'Sadie', 'Sadye', 'Sallie', 'Sally', 'Salma', 'Samanta', 'Samantha', 'Samara', 'Sandra', 'Sandrine', 'Sandy', 'Santina', 'Sarah', 'Sarai', 'Sarina', 'Sasha', 'Savanah', 'Savanna', 'Savannah', 'Scarlett', 'Selena', 'Selina', 'Serena', 'Serenity', 'Shaina', 'Shakira', 'Shana', 'Shanel', 'Shanelle', 'Shania', 'Shanie', 'Shaniya', 'Shanna', 'Shannon', 'Shanny', 'Shanon', 'Shany', 'Sharon', 'Shawna', 'Shaylee', 'Shayna', 'Shea', 'Sheila', 'Shemar', 'Shirley', 'Shyann', 'Shyanne', 'Sibyl', 'Sienna', 'Sierra', 'Simone', 'Sincere', 'Sister', 'Skyla', 'Sonia', 'Sonya', 'Sophia', 'Sophie', 'Stacey', 'Stacy', 'Stefanie', 'Stella', 'Stephania', 'Stephanie', 'Stephany', 'Summer', 'Sunny', 'Susan', 'Susana', 'Susanna', 'Susie', 'Suzanne', 'Syble', 'Sydnee', 'Sydni', 'Sydnie', 'Sylvia',
                'Tabitha', 'Talia', 'Tamara', 'Tamia', 'Tania', 'Tanya', 'Tara', 'Taryn', 'Tatyana', 'Taya', 'Teagan', 'Telly', 'Teresa', 'Tess', 'Tessie', 'Thalia', 'Thea', 'Thelma', 'Theodora', 'Theresa', 'Therese', 'Theresia', 'Thora', 'Tia', 'Tiana', 'Tianna', 'Tiara', 'Tierra', 'Tiffany', 'Tina', 'Tomasa', 'Tracy', 'Tressa', 'Tressie', 'Treva', 'Trinity', 'Trisha', 'Trudie', 'Trycia', 'Twila', 'Tyra',
                'Una', 'Ursula',
                'Vada', 'Valentina', 'Valentine', 'Valerie', 'Vallie', 'Vanessa', 'Veda', 'Velda', 'Vella', 'Velma', 'Velva', 'Vena', 'Verda', 'Verdie', 'Vergie', 'Verla', 'Verlie', 'Verna', 'Vernice', 'Vernie', 'Verona', 'Veronica', 'Vesta', 'Vicenta', 'Vickie', 'Vicky', 'Victoria', 'Vida', 'Vilma', 'Vincenza', 'Viola', 'Violet', 'Violette', 'Virgie', 'Virginia', 'Virginie', 'Vita', 'Viva', 'Vivian', 'Viviane', 'Vivianne', 'Vivien', 'Vivienne',
                'Wanda', 'Wava', 'Wendy', 'Whitney', 'Wilhelmine', 'Willa', 'Willie', 'Willow', 'Wilma', 'Winifred', 'Winnifred', 'Winona',
                'Yadira', 'Yasmeen', 'Yasmin', 'Yasmine', 'Yazmin', 'Yesenia', 'Yessenia', 'Yolanda', 'Yoshiko', 'Yvette', 'Yvonne',
                'Zaria', 'Zelda', 'Zella', 'Zelma', 'Zena', 'Zetta', 'Zita', 'Zoe', 'Zoey', 'Zoie', 'Zoila', 'Zola', 'Zora', 'Zula'
            ],
            "lastNames" => self::$lastNames,
            "secondNames" => []
        ];
    }

    public static function resourceQuotes(): array
    {
        return [
            ["The smarter a person is, the more easily he admits he is a fool", "Albert Einstein"],
            ["The one who does nothing never makes a mistake", "Theodore Roosevelt"],
            ["Least of all are people who want to seem simple", "Leo Nikolayevich Tolstoy"],
            ["We are here to contribute to this world. Otherwise why are we here?", "Steve Jobs"],
            ["Fashion passes, style remains", "Coco Chanel"],
            ["If a man has not found something to die for, he is not able to live", "Martin Luther King"],
            ["Music turns on the heart so that the body dances and sings. And there is music with which you want to share everything that hurts", "John Lennon"],
            ["If someone harmed you, do not take revenge. Sit on the bank of the river, and soon you will see the corpse of your enemy floating past you", "Laozi"],
            ["It's better to be a good person, \"swearing\" than a quiet, well-mannered creature", "Faina Ranevskaya"],
            ["If it's hard for you, then you're going uphill. If it's easy for you, then you're flying into the abyss", "Henry Ford"],
            ["My way of joking is to tell the truth. There's nothing funnier in the world", "Bernard Shaw"],
            ["The more love, wisdom, beauty, kindness you discover in yourself, the more you will notice them in the world around you", "Mother Teresa"],
            ["The only person you should compare yourself to is you in the past. And the only person you should be better than is you now", "Sigmund Freud"],
            ["The inability to write for me is tantamount to being buried alive ...", "Mikhail Bulgakov"],
            ["History is the best teacher with the worst students", "Indira Gandhi"],
            ["Give a man power, and you will know who he is", "Napoleon Bonaparte"],
            ["Nuclear War Can't Be Won", "Andrei Sakharov"],
            ["Defeat? I don't understand the meaning of the word", "Margaret Thatcher"],
            ["Some people spend their lives looking for love outside of themselves... As long as love is in my heart, it's everywhere", "Michael Jackson"],
            ["Humanity has one truly powerful weapon, and that is laughter", "Mark Twain"],
            ["Train with those who are stronger. Don't give up where others give up. And win where you can't win", "Bruce Lee"],
            ["Comedy is a very serious matter!", "Yuri Nikulin"],
            ["Be less curious about people, but more curious about ideas", "Marie Curie"],
            ["When I'm about to write a new script, the hardest thing for me is to go to the stationery and buy a notebook", "Quentin Tarantino"],
            ["I hate all kinds of carrion! I love all kinds of life!", "Vladimir Mayakovsky"],
            ["Thinking is the height of bliss and the joy of life, the most valiant occupation of man", "Aristotle"],
            ["Do you have enemies? Good. So, in your life you once stood up for something", "Winston Churchill"],
            ["Someday it's not scary to die - it's scary to die right now", "Alexander Solzhenitsyn"],
            ["I take my job seriously, and that's only possible if I don't take myself seriously", "Alan Rickman"],
            ["Character is destiny", "Maya Plisetskaya"],
            ["Pay attention to only one teacher - Nature", "Rembrandt"],
            ["Success is a lousy teacher. It makes smart people think they can't fail", "Bill Gates"],
            ["Champions are not made in the gym. A champion is born by what a person has inside: desires, dreams, goals", "Muhammad Ali"],
            ["Humans are too complex creatures to fully understand", "Tom Hanks"],
            ["The prospect of dying early made me realize that life is worth living", "Stephen Hawking"],
            ["It's not that hard to change society - it's hard to change yourself", "Nelson Mandela"],
            ["It is necessary that the artist, in addition to the eye, educate his soul", "Wasily Kandinsky"],
            ["I breathe, and that means - I love! I love, and that means - I live!", "Vladimir Vysotsky"],
            ["A man's fantasy is a woman's best weapon", "Sophie Loren"],
            ["What we know is a drop, what we don't know is the ocean", "Isaac Newton"],
            ["Neither high intellect, nor imagination, nor both together create genius. Love, love and love is the essence of genius", "Wolfgang Amadeus Mozart"],
            ["Justify, do not punish, but call evil evil", "Fyodor Dostoevsky"],
            ["The one who aspires to the stars does not turn around", "Leonardo da Vinci"],
            ["I hate advice - everyone but my own", "Jack Nicholson"],
            ["The beauty of a woman increases with her years", "Audrey Hepburn"],
            ["Open your eyes wide, live as greedily as if you will die in ten seconds. Try to see the world. It is more beautiful than any dream created in a factory and paid for with money. Do not ask for guarantees, do not seek peace - there is no such animal in the world", "Ray Bradbury"],
            ["I drink to those around me people became more interesting", "Ernest Hemingway"],
            ["You see, the artist is distinguished by the fact that there are moments in his life when he feels like more than a man", "Le Corbusier"],
            ["Love for our own good produces in us love for the fatherland, and personal pride - pride of the people, which serves as the backbone of patriotism", "Nikolai Karamzin"],
            ["Love art in yourself, not yourself in art", "Konstantin Stanislavsky"]
        ];
    }

    public static function resourceCurrency(): array
    {
        return [
            "RU" => [
                "symbol" => "₽",
                "words" => [
                    "ruble", "rubles", "rubles"
                ]
            ],
            "US" => [
                "symbol" => "$",
                "words" => [
                    "dollar", "dollars", "dollars"
                ]
            ],
            "EU" => [
                "symbol" => "€",
                "words" => [
                    "euro", "euro", "euro"
                ]
            ]
        ];
    }
}
