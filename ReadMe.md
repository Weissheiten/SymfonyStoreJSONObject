# Symfony example for storing a JSON payload
## About
This demo project uses 2 entities: "Book" and "BookShelf".
One Bookshelf can have many Books assigned.

## Points of interest
Line 26 in class Book.php
```php
     * @ORM\ManyToOne(targetEntity=BookShelf::class, inversedBy="books", cascade={"persist"})
```
This will ensure, that if a non-existing shelf is passed it will be persisted in the database. You can also omit this part, but then need to persist the shelf manually when storing the object.
## Test object
```json
{ 
    "name" : "The Rest Book",
    "bookShelf": { "number" : 77 }
}
```
POST Request, accept application/json, JSON should be the body payload

This can be tested with a browser extension like RESTer (Firefox).