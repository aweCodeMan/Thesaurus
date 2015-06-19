FORMAT: 1A

# Thesaurus v1 API
Simple API for accessing and modifying word relationships for the thesaurus found at [http://tezaver.betoo.si](http://tezaver.betoo.si).

# Group Words

Resources for words.

# /api/v1/words{?query}

## Get words list [GET] 

+ query (string, optional) - filter results by word

You will always receive a paginated result. All the words are kept inside the data property.

+ Response 200 (application/json)

    {
        per_page: 50,
        current_page: 1,
        next_page_url: null,
        prev_page_url: null,
        from: 1,
        to: 46,
        data: [
            {
                id: 83725,
                word: "velik",
                pronunciation: "vêlik",
                tags: "pridevnik, pridevniška raba: samoški spol, narečno",
                definitions: "ki dosega visoko stopnjo glede na razsežnost, majhen: glede na merljivo količino: glede na število sestavnih enot: glede na dolžino: glede na trajanje: glede na možni razpon: glede na čas življenja: glede na svojo glavno, bistveno značilnost: glede na intenzivnost, učinek: glede na razsežnost in delovanje ali dejavnost: glede na pomembnost: ki izraža razsežnost: véliki:",
                link: "http://tezaver.dev/beseda/velik",
                synonyms: [],
                antonyms: [
                    {
                        id: 33055,
                        word: "majhen",
                        pronunciation: "májhen",
                        tags: "pridevnik, pridevniška raba: prislov, prislovna raba, narečno: samoški spol, narečno",
                        definitions: "ki dosega nizko stopnjo glede na razsežnost, velik: glede na merljivo količino: glede na število sestavnih enot: glede na dolžino: glede na trajanje: glede na možni razpon: glede na čas življenja: glede na svojo glavno, bistveno značilnost: glede na intenzivnost, učinek: glede na razsežnost in delovanje ali dejavnost: glede na pomembnost: malo pomemben, nepomemben: slab, grd, ničvreden: malo: mali:",
                        link: "http://tezaver.dev/beseda/majhen"
                    }
                ]
            },
            {
                id: 83726,
                word: "velikan",
                pronunciation: "velikán",
                tags: "samostalnik moškega spola",
                definitions: "nenavadno veliko in močno, človeku podobno bitje: nenavadno velik in močen človek: kdor ima nadpovprečne uspehe pri svojem delu: zelo velik, gospodarsko pomemben objekt: kar je veliko sploh:",
                link: "http://tezaver.dev/beseda/velikan",
                synonyms: [],
                antonyms: []
            }
        ]
    }
 
# /api/v1/words/{id/word}

## Get word [GET] 

+ id/word (numeric/string) - id of the word, or the actual word string

You will always receive an array of results. That's because the slovenian language can have multiple words/meanings for each word string.

+ Response 200 (application/json)

    [
        {
            id: 4223,
            word: "bliščava",
            pronunciation: "bliščáva",
            tags: "samostalnik ženskega spola",
            definitions: "bleščava:",
            link: "http://tezaver.dev/beseda/bli%C5%A1%C4%8Dava",
            synonyms: [],
            antonyms: []
        }
    ] 
 
# Group Synonyms

Resources for synonyms.

# /api/v1/synonyms

## Get synonyms list [GET] 

You will always receive a paginated result. All the linked words are kept inside the data property. All the word links are doubled, meaning that for every synonym there is going to be two entries.

+ Response 200 (application/json)

    {
        per_page: 50,
        current_page: 1,
        next_page_url: null,
        prev_page_url: null,
        from: 1,
        to: 46,
        data: [
            {
               relationship_type: "synonym",
               created_at: "2015-05-12 10:00:00",
               updated_at: "2015-05-12 10:00:00",
               word: {
                   id: 12,
                   word: "abc",
                   pronunciation: "abc",
                   tags: "",
                   definitions: "ustaljeno zaporedje črk v kaki pisavi, zlasti v latinici; abeceda: začetno, osnovno znanje:",
                   link: "http://tezaver.dev/beseda/abc"
               },
               linked_word: {
                   id: 22,
                   word: "abece",
                   pronunciation: "abece",
                   tags: "sopomenka",
                   definitions: "",
                   link: "http://tezaver.dev/beseda/abece"
               }
            }
        ]
    }
 
# Group Antonyms

Resources for antonyms.

# /api/v1/antonyms

## Get antonyms list [GET] 

You will always receive a paginated result. All the linked words are kept inside the data property. All the word links are doubled, meaning that for every antonym there is going to be two entries.

+ Response 200 (application/json)

    {
        per_page: 50,
        current_page: 1,
        next_page_url: null,
        prev_page_url: null,
        from: 1,
        to: 46,
        data: [
            {
               relationship_type: "antonym",
               created_at: "2015-05-23 10:13:59",
               updated_at: "2015-05-23 10:13:59",
               word: {
                   id: 916,
                   word: "altruističen",
                   pronunciation: "altruístičen",
                   tags: "pridevnik, pridevniška raba",
                   definitions: "poln altruizma, nesebičen:",
                   link: "http://tezaver.dev/beseda/altruisti%C4%8Den"
               },
                   linked_word: {
                   id: 13645,
                   word: "egoističen",
                   pronunciation: "egoístičen",
                   tags: "pridevnik, pridevniška raba: prislov, prislovna raba",
                   definitions: "ki upošteva samo svoje koristi, sebičen:",
                   link: "http://tezaver.dev/beseda/egoisti%C4%8Den"
               }
            }
        ]
    } 
 
# Group Word relationships

Resources for word relationships (synonyms, antonyms).

# /api/v1/word-relationships

## Store a relationship [POST] 

When storing a relationship use `type = 1` for syonyms and `type = 2` for antonyms. 

+ Request JSON message

    + Headers
        Content-Type: application/json
    
	+ Body
        {
            "wordId": 5, 
            "linkedWordId": 423, 
            "type":1
        }

    
+ Response 200 (application/json)

    {
        "status": "success"
    }
     
+ Response 422 (application/json)
 
    {
        "wordId": [
            "The word id field is required."
        ],
        "linkedWordId": [
            "The linked word id field is required."
        ],
        "type": [
            "The type field is required."
        ]
    }
 
# /api/v1/word-relationships/delete
 
## Delete a relationship [POST]

When deleting a relationship use `type = 1` for syonyms and `type = 2` for antonyms. 

+ Request JSON message

    + Headers
        Content-Type: application/json
    
	+ Body
        {
            "wordId": 5, 
            "linkedWordId": 423, 
            "type":1
        }

    
+ Response 200 (application/json)

    {
        "status": "success"
    }
     
+ Response 422 (application/json)
 
    {
        "wordId": [
            "The word id field is required."
        ],
        "linkedWordId": [
            "The linked word id field is required."
        ],
        "type": [
            "The type field is required."
        ]
    }