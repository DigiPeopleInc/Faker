<?php

namespace Digipeopleinc\Faker\Locales\en_US;

class Internet
{
    public static function resourceDomainEnd(): array
    {
        return [
            "all" => [
                "com",
                "ru",
                "net",
                "org"
            ]
        ];
    }

    public static function resourceCompanyTemplates(): array
    {
        return [
            "with_type" => [
                "“{leadingPart}{leadingPart}{endingPart}” {type}",
                "“{namingPart} {leadingPart}{endingPart}” {type}",
                "“{leadingPart}{namingPart}{endingPart}” {type}",
            ],
            "no_type" => [
                "{leadingPart}{leadingPart}{endingPart}",
                "{namingPart} {leadingPart}{endingPart}",
                "{leadingPart}{namingPart}{endingPart}",
            ]
        ];
    }

    public static function resourceBusinessParts(): array
    {
        return [
            "type" => [
                "LLC",
                "Limited Liability Company"
            ],
            "namingPart" => [
                "World",
                "National",
                "Space",
                "Transatlantic",
                "American"
            ],
            "leadingPart" => [
                "Med",
                "Medical",
                "Business",
                "Build",
                "Trance",
                "Gas",
                "Oil",
                "Evac",
                "Steel",
                "Global",
                "Metal",
                "Absolute",
                "Exterior",
                "Us",
                "Uk",
                "Chicago",
                "Computing",
                "Industry",
            ],
            "endingPart" => [
                "Experts",
                "Invest",
                "Service",
                "Industrial",
                "Bank",
                "Bargain",
                "Business",
                "Trade",
                "International",
                "Company",
            ]
        ];
    }

    public static function resourcePhone(): array
    {
        return [
            "default" => ["+1##########"]
        ];
    }

    public static function resourceCategories(): array
    {
        return [
            "all" => [
                "news", "products", "vacancies", "info", "blog", "about", "groups", "channel", "api"
            ]
        ];
    }

    public static function resourceSlugs(): array
    {
        return [
            "all" => [
                "alias", "consequatur", "aut", "perferendis", "sit", "voluptatem", "accusantium", "doloremque", "aperiam", "eaque", "ipsa", "quae", "ab", "illo", "inventore", "veritatis", "et", "quasi",
                "architecto", "beatae", "vitae", "dicta", "sunt", "explicabo", "aspernatur", "aut", "odit", "aut", "fugit", "sed", "quia", "consequuntur", "magni", "dolores", "eos", "qui", "ratione",
                "voluptatem", "sequi", "nesciunt", "neque", "dolorem", "ipsum", "quia", "dolor", "sit", "amet", "consectetur", "adipisci", "velit", "sed", "quia", "non", "numquam", "eius", "modi", "tempora",
                "incidunt", "ut", "labore", "et", "dolore", "magnam", "aliquam", "quaerat", "voluptatem", "ut", "enim", "ad", "minima", "veniam", "quis", "nostrum", "exercitationem", "ullam", "corporis",
                "nemo", "enim", "ipsam", "voluptatem", "quia", "voluptas", "sit", "suscipit", "laboriosam", "nisi", "ut", "aliquid", "ex", "ea", "commodi", "consequatur", "quis", "autem", "vel", "eum",
                "iure", "reprehenderit", "qui", "in", "ea", "voluptate", "velit", "esse", "quam", "nihil", "molestiae", "et", "iusto", "odio", "dignissimos", "ducimus", "qui", "blanditiis", "praesentium",
                "laudantium", "totam", "rem", "voluptatum", "deleniti", "atque", "corrupti", "quos", "dolores", "et", "quas", "molestias", "excepturi", "sint", "occaecati", "cupiditate", "non", "provident",
                "sed", "ut", "perspiciatis", "unde", "omnis", "iste", "natus", "error", "similique", "sunt", "in", "culpa", "qui", "officia", "deserunt", "mollitia", "animi", "id", "est", "laborum", "et",
                "dolorum", "fuga", "et", "harum", "quidem", "rerum", "facilis", "est", "et", "expedita", "distinctio", "nam", "libero", "tempore", "cum", "soluta", "nobis", "est", "eligendi", "optio", "cumque",
                "nihil", "impedit", "quo", "porro", "quisquam", "est", "qui", "minus", "id", "quod", "maxime", "placeat", "facere", "possimus", "omnis", "voluptas", "assumenda", "est", "omnis", "dolor",
                "repellendus", "temporibus", "autem", "quibusdam", "et", "aut", "consequatur", "vel", "illum", "qui", "dolorem", "eum", "fugiat", "quo", "voluptas", "nulla", "pariatur", "at", "vero", "eos",
                "et", "accusamus", "officiis", "debitis", "aut", "rerum", "necessitatibus", "saepe", "eveniet", "ut", "et", "voluptates", "repudiandae", "sint", "et", "molestiae", "non", "recusandae", "itaque",
                "earum", "rerum", "hic", "tenetur", "a", "sapiente", "delectus", "ut", "aut", "reiciendis", "voluptatibus", "maiores", "doloribus", "asperiores", "repellat"
            ]
        ];
    }

    public static function resourceHouseNumber(): array
    {
        return ['####', '###', '##'];
    }

    public static function resourceFlatNumber(): array
    {
        return ['###', '##'];
    }

    public static function resourceZipMask(): array
    {
        return ['#####', '#####-####'];
    }

    public static function resourceCountry(): array
    {
        return [
            "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica (the territory South of 60 deg S)", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan",
            "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island (Bouvetoya)", "Brazil", "British Indian Ocean Territory (Chagos Archipelago)", "British Virgin Islands", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi",
            "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Cote d\"Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic",
            "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia",
            "Faroe Islands", "Falkland Islands (Malvinas)", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories",
            "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana",
            "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary",
            "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan",
            "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea", "Kuwait", "Kyrgyz Republic",
            "Lao People\"s Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg",
            "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico",
            "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands Antilles",
            "Netherlands", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman",
            "Pakistan", "Palau", "Palestinian Territories", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn Islands", "Poland", "Portugal", "Puerto Rico", "Qatar",
            "Reunion", "Romania", "Russian Federation", "Rwanda",
            "Saint Barthelemy", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Martin", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa",
            "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia",
            "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard & Jan Mayen Islands",
            "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic",
            "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu",
            "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "United States Minor Outlying Islands", "United States Virgin Islands", "Uruguay", "Uzbekistan",
            "Vanuatu", "Venezuela", "Vietnam", "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"
        ];
    }

    public static function resourceCity(): array
    {
        return [
            "New York", "Los Angeles", "Chicago", "Houston", "Phoenix", "Philadelphia", "San Antonio", "San Diego", "Dallas", "San Jose", "Austin", "Jacksonville",
            "Fort Worth", "Columbus", "Indianapolis", "Charlotte", "San Francisco", "Seattle", "Denver", "Oklahoma City", "Nashville", "El Paso",
            "Washington", "Boston", "Las Vegas", "Portland", "Detroit", "Louisville", "Memphis", "Baltimore", "Milwaukee", "Albuquerque", "Fresno",
            "Tucson", "Sacramento", "Mesa", "Kansas City", "Atlanta", "Omaha", "Colorado Springs", "Raleigh", "Virginia Beach", "Long Beach", "Miami",
            "Oakland", "Minneapolis", "Tulsa", "Bakersfield", "Wichita", "Arlington", "Aurora", "Tampa", "New Orleans", "Cleveland", "Anaheim", "Honolulu", "Henderson",
            "Stockton", "Lexington", "Corpus Christi", "Riverside", "Santa Ana", "Orlando", "Irvine", "Cincinnati", "Newark", "Saint Paul", "Pittsburgh", "Greensboro", "St. Louis",
            "Lincoln", "Plano", "Anchorage", "Durham", "Jersey City", "Chandler", "Chula Vista", "Buffalo", "North Las Vegas", "Gilbert", "Madison", "Reno", "Toledo",
            "Fort Wayne", "Lubbock", "St. Petersburg", "Laredo", "Irving", "Chesapeake", "Winston–Salem", "Glendale", "Scottsdale", "Garland", "Boise", "Norfolk", "Spokane",
            "Fremont", "Richmond", "Santa Clarita", "San Bernardino", "Baton Rouge", "Hialeah", "Tacoma", "Modesto", "Port St. Lucie", "Huntsville", "Des Moines", "Moreno Valley",
            "Fontana", "Frisco", "Rochester", "Yonkers", "Fayetteville", "Worcester", "Columbus", "Cape Coral", "McKinney", "Little Rock", "Oxnard", "Amarillo", "Augusta",
            "Salt Lake City", "Montgomery", "Birmingham", "Grand Rapids", "Grand Prairie", "Overland Park", "Tallahassee", "Huntington Beach", "Sioux Falls", "Peoria", "Knoxville",
            "Glendale", "Vancouver", "Providence", "Akron", "Brownsville", "Mobile", "Newport News", "Tempe", "Shreveport", "Chattanooga", "Fort Lauderdale", "Aurora", "Elk Grove",
            "Ontario", "Salem", "Cary", "Santa Rosa", "Rancho Cucamonga", "Eugene", "Oceanside", "Clarksville", "Garden Grove", "Lancaster", "Springfield", "Pembroke Pines",
            "Fort Collins", "Palmdale", "Salinas", "Hayward", "Corona", "Paterson", "Murfreesboro", "Macon", "Lakewood", "Killeen", "Springfield", "Alexandria", "Kansas City",
            "Sunnyvale", "Hollywood", "Roseville", "Charleston", "Escondido", "Joliet", "Jackson", "Bellevue", "Surprise", "Naperville", "Pasadena", "Pomona", "Bridgeport",
            "Denton", "Rockford", "Mesquite", "Savannah", "Syracuse", "McAllen", "Torrance", "Olathe", "Visalia", "Thornton", "Fullerton", "Gainesville", "Waco", "West Valley City",
            "Warren", "Lakewood", "Hampton", "Dayton", "Columbia", "Orange", "Cedar Rapids", "Stamford", "Victorville", "Pasadena", "Elizabeth", "New Haven", "Miramar", "Kent",
            "Sterling Heights", "Carrollton", "Coral Springs", "Midland", "Norman", "Athens", "Santa Clara", "Columbia", "Fargo", "Pearland", "Simi Valley", "Meridian", "Topeka",
            "Allentown", "Thousand Oaks", "Abilene", "Vallejo", "Concord", "Round Rock", "Arvada", "Clovis", "Palm Bay", "Independence", "Lafayette", "Ann Arbor", "Rochester",
            "Hartford", "College Station", "Fairfield", "Wilmington", "North Charleston", "Billings", "West Palm Beach", "Berkeley", "Cambridge", "Clearwater", "West Jordan",
            "Evansville", "Richardson", "Broken Arrow", "Richmond", "League City", "Manchester", "Lakeland", "Carlsbad", "Antioch", "Westminster", "High Point", "Provo", "Lowell",
            "Elgin", "Waterbury", "Springfield", "Gresham", "Murrieta", "Lewisville", "Las Cruces", "Lansing", "Beaumont", "Odessa", "Pueblo", "Peoria", "Downey", "Pompano Beach",
            "Miami Gardens", "Temecula", "Everett", "Costa Mesa", "Ventura", "Sparks", "Santa Maria", "Sugar Land", "Greeley", "South Fulton", "Dearborn", "Concord", "Edison",
            "Tyler", "Sandy Springs", "West Covina", "Green Bay", "Centennial", "Jurupa Valley", "El Monte", "Allen", "Hillsboro", "Menifee", "Nampa", "Spokane Valley", "Rio Rancho",
            "Brockton", "El Cajon", "Burbank", "Inglewood", "Renton", "Davie", "Rialto", "Boulder", "South Bend", "Woodbridge", "Vacaville", "Wichita Falls", "Lee's Summit",
            "Edinburg", "Chico", "San Mateo", "Bend", "Goodyear", "Buckeye", "Daly City", "Fishers", "Quincy", "Davenport", "Hesperia", "New Bedford", "Lynn", "Carmel", "Longmont",
            "Tuscaloosa", "Norwalk"
        ];
    }

    public static function resourceStreet(): array
    {
        return [
            "Alameda", "Cost of the Stars", "Broadway", "Bundy", "Centinela", "Central", "Cesar Chavez", "Fairfax", "Figueroa", "Florence", "Fountain", "Grand", "Highland",
            "Huntington", "Imperial", "La Brea", "Manchester", "Melrose", "Mission", "Mulholland", "Normandie", "Pacific Coast", "Slauson", "Spring", "Vermont", "Western", "Adams",
            "Beverly", "Century", "Exposition", "Hollywood", "Jefferson", "Martin Luther King Jr.", "Obama", "Olympic", "Pico", "Roscoe", "Santa Monica", "Sunset", "Venice", "Ventura",
            "Victory", "Washington", "Wilshire", "Major", "Avalon", "Beverly Glen", "Crenshaw", "Glendale", "La Cienega", "Laurel Canyon", "Lincoln", "Main Street", "Reseda", "Robertson",
            "San Vicente", "Sepulveda", "Topanga Canyon", "Van Nuys", "Westwood"
        ];
    }

    public static function resourceAddressParts(): array
    {
        return [
            "state" => [
                'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia',
                'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
                'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio',
                'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia',
                'Wisconsin', 'Wyoming'
            ],
            "stateAbbr" => [
                "AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC", "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA", "MA", "MD", "ME", "MI", "MN", 
                "MO", "MS", "MT", "NC", "ND", "NE", "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY"
            ],
            "streetSecondPart" => [
                "Street",
                "Drive",
                "Boulevard"
            ]
        ];
    }

    public static function resourceAddressFormat(): array
    {
        return [
            "full" => [
                "{houseNumber} {street} {streetSecondPart} \n{city}, {stateAbbr} {zipMask}"
            ],
            "short" => [
                "{houseNumber} {street} {streetSecondPart}"
            ]
        ];
    }
}