## Starbucks

REST api to order drinks in a fake starbucks

## How to run

- **Setup .env file on root folder with your database credentials**
- **To migrate and populate the database for testing purposes run the command "php artisan migrate:refresh --seed"**
- **[All methods can be found in the Postman Collection provided in this link](https://we.tl/t-EnlhMcytyz)**
- **"categories endpoint" for Product Categories CRUD**
- **"products endpoint" for Products CRUD**
- **"extras endpoint" for Product Extras CRUD**
- **"orders endpoint" for ordering on the shop**

## Tutorial
- **You can request any number of Drinks**
- **You can request any number of Extras for each Drink**

The next example provides you with a valid request when making an order.
### Request
```json
{
    "drinks":[
        {
            "id":1,
            "quantity":1,
            "extras":[
                {
                    "id":1,
                    "quantity":2
                },
                {
                    "id": 1,
                    "quantity":1
                }
            ]
        },
        {
            "id":10,
            "quantity":1,
            "extras":[
                {
                    "id":2,
                    "quantity":1
                },
                {
                    "id":3,
                    "quantity":2
                }
            ]
        }
    ],
    "payment_details":{
        "ammount": 20
    }
}
```

### Response
When buyer have enough money for the order
```json
{
    "message": "Thanks for your purchase. Here is your exchange: 7.10"
}
```
When buyer doesn't have enough money for the order
```json
{
    "message": "Insufficient funds. Order total is: 12.90"
}
```
When buyer requests an item that has notenough stock
```json
{
    "message": "We don't have enough stock to provide you all the 'Latte's that you want."
}
```
When buyer requests an item that is not on the menu
```json
{
    "message": "We don't have one of the items you are trying to buy. Please try another store."
}
```
