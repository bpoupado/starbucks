[1mdiff --cc README.md[m
[1mindex 901e68d,8b13789..0000000[m
[1m--- a/README.md[m
[1m+++ b/README.md[m
[36m@@@ -1,83 -1,1 +1,87 @@@[m
[32m++<<<<<<< HEAD[m
[32m +## Starbucks[m
  [m
[32m +REST api to order drinks in a fake starbucks[m
[32m +[m
[32m +## How to run[m
[32m +[m
[32m +- **Setup .env file on root folder with your database credentials**[m
[32m +- **To migrate and populate the database for testing purposes run the command "php artisan migrate:refresh --seed"**[m
[32m +- **[All methods can be found in the Postman Collection provided in this link](https://we.tl/t-EnlhMcytyz)**[m
[32m +- **"categories endpoint" for Product Categories CRUD**[m
[32m +- **"products endpoint" for Products CRUD**[m
[32m +- **"extras endpoint" for Product Extras CRUD**[m
[32m +- **"orders endpoint" for ordering on the shop**[m
[32m +[m
[32m +## Tutorial[m
[32m +- **You can request any number of Drinks**[m
[32m +- **You can request any number of Extras for each Drink**[m
[32m +[m
[32m +The next example provides you with a valid request when making an order.[m
[32m +### Request[m
[32m +```json[m
[32m +{[m
[32m +    "drinks":[[m
[32m +        {[m
[32m +            "id":1,[m
[32m +            "quantity":1,[m
[32m +            "extras":[[m
[32m +                {[m
[32m +                    "id":1,[m
[32m +                    "quantity":2[m
[32m +                },[m
[32m +                {[m
[32m +                    "id": 1,[m
[32m +                    "quantity":1[m
[32m +                }[m
[32m +            ][m
[32m +        },[m
[32m +        {[m
[32m +            "id":10,[m
[32m +            "quantity":1,[m
[32m +            "extras":[[m
[32m +                {[m
[32m +                    "id":2,[m
[32m +                    "quantity":1[m
[32m +                },[m
[32m +                {[m
[32m +                    "id":3,[m
[32m +                    "quantity":2[m
[32m +                }[m
[32m +            ][m
[32m +        }[m
[32m +    ],[m
[32m +    "payment_details":{[m
[32m +        "ammount": 20[m
[32m +    }[m
[32m +}[m
[32m +```[m
[32m +[m
[32m +### Response[m
[32m +When buyer have enough money for the order[m
[32m +```json[m
[32m +{[m
[32m +    "message": "Thanks for your purchase. Here is your exchange: 7.10"[m
[32m +}[m
[32m +```[m
[32m +When buyer doesn't have enough money for the order[m
[32m +```json[m
[32m +{[m
[32m +    "message": "Insufficient funds. Order total is: 12.90"[m
[32m +}[m
[32m +```[m
[32m +When buyer requests an item that has notenough stock[m
[32m +```json[m
[32m +{[m
[32m +    "message": "We don't have enough stock to provide you all the 'Latte's that you want."[m
[32m +}[m
[32m +```[m
[32m +When buyer requests an item that is not on the menu[m
[32m +```json[m
[32m +{[m
[32m +    "message": "We don't have one of the items you are trying to buy. Please try another store."[m
[32m +}[m
[31m- ```[m
[32m++```[m
[32m++=======[m
[32m++[m
[32m++>>>>>>> 90abddd313305da17efc204db8507a6f270b9978[m
