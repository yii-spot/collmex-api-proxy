# API proxy for Collmex with GraphQL support

This Symfony Flex "API-only" app provides GraphQL access to the [Collmex API](https://www.collmex.de/cgi-bin/cgi.exe?1005,1,help,api).

## Table of Contents
- [Important Notes](#important-notes)
- [Features](#features)
  - [Query](#query)
    - [Type "Delivery" - Collmex "Lieferung"](#type-delivery)
    - [Type "Product" - Collmex "Produkt"](#type-product)
  - [Mutation](#mutation)
- [Dependencies](#dependencies)
- [Installation](#installation)
- [Configuration](#configuration)
- [Tools](#tools)
  - [GraphiQL](#graphiql)
  - [Altair GraphQL client](#altair-graphql-client)
- [Roadmap & Vision](#roadmap--vision)
- [Collmex API Documentation](#collmex-api-documentation)
- [Development notes](#development-notes)

## Important Notes
This project is in a very early stage of development and is therefore not yet suitable for productive use!

Currently there
- are NO access restrictions to objects or object fields
- is NOT any kind of authentication, so ONLY run locally or behind a firewall
- are NO automated tests

## Features

### Query

#### Type "Delivery"
GraphQL representation of the Collmex type "Lieferung" with the following nested object types:
- Client (Collmex "Firma")
- DeliveryItem (Subtype for delivery position data)

#### Type "Product"
GraphQL representation of the Collmex type "Produkt" with the following nested object types:
- ProductGroup (Collmex "Produktgruppe")
- Client (Collmex "Firma")
- TaxRate (Collmex "Steuerklassifikation")
- ProductType (Collmex "Produktart")
- PriceGroup (Collmex "Preisgruppe")
- ShippingGroup (Collmex "Versandgruppe")
- ProcurementType (Collmex "Beschaffungsart")
- CostingType (Collmex "Kostenermittlung")
- Supplier (Collmex "Lieferant")
- ProductRaw (Raw data, as received from the Collmex API)

##### Parameters
- client_id (Collmex "Firma Nr")
- product_id (Collmex "Produktnummer")

### Mutation
None yet.

## Dependencies
This project depends on the [Collmex API PHP SDK](https://github.com/mjaschen/collmex). Kudos to this project team, keep up the great work!

GraphQL is provided by the [OverblogGraphQLBundle](https://github.com/overblog/GraphQLBundle).

## Installation
Install with Composer:
```
composer install
```

## Configuration
Put the following secrets in your `env.dev.local`, or better into [Symfony's Vault](https://symfony.com/doc/current/configuration/secrets.html):

- COLLMEX_API_CUSTOMER_ID
- COLLMEX_API_USER
- COLLMEX_API_PASSWORD

## Tools
 
### GraphiQL
The composer.json requires the package ["overblog/graphiql-bundle"](https://github.com/overblog/GraphiQLBundle) for dev installations.
Append `/graphiql` to your app URL in order to open the GraphiQL UI.

### Altair GraphQL client
We recommend using the Chrome plugin of [Altair's GraphQL client](https://chrome.google.com/webstore/detail/altair-graphql-client/flnheeellpciglgpaodhkhmapeljopja).

## Roadmap & Vision
See [ROADMAP.md](ROADMAP.md) for roadmap and release planning.

- Further Collmex API types
- GraphQL Mutation (Create / Update) 
- Nested GraphQL resolvers
  - This will require caching, as this feature will depend on multiple type requests
- A caching layer in order to reduce direct API request to Collmex, which are restricted to 10.000 requests a day

Please use dicussions and issues for suggestions!

## Collmex API Documentation

<https://www.collmex.de/cgi-bin/cgi.exe?1005,1,help,api>

## Development notes

### New data type
- Create GraphQL schema definition for raw Collmex data in config/graphql/types/
- Create GraphQL schema with sub data types in config/graphql/types/
- Add schema definitions to config/graphql/Query.types.yml
- Add data type request in src/Repository/Collmex/ApiClient/Type/
- Add data type entity in src/Entity/Type/
- Add data type repository in src/Repository/Type/
- Add GraphQL resolvers in src/GraphQl/Resolver/Type/
