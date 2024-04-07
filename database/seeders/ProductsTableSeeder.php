<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('products')->delete();

        DB::table('products')->insert(
            array(
                0 =>
                    array(
                        'id' => 1,
                        'category_id' => 1,
                        'name' => 'Apple Juice',
                        'description' => 'The majority of apple juice is fortified with vitamin C. Vitamin C is crucial for the growth and repair of cells. It also helps heal wounds, builds strong teeth, skin, bones and cartilage and is critical to a healthy immune system.',
                        'image' => '661193c4eafe9_products_apple-juice.webp',
                        'waiting_time' => 5,
                        'price' => 2500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:26:13',
                        'updated_at' => '2024-04-06 18:26:13',
                    ),
                1 =>
                    array(
                        'id' => 2,
                        'category_id' => 1,
                        'name' => 'Orange Juice',
                        'description' => 'Orange juice is a good source of vitamin C, thiamin, (vitamin B1), folate and potassium. Vitamin C is crucial for the growth and repair of cells. It also helps build strong bones, healthy teeth, skin, and cartilage, and is critical to a healthy immune system. Thiamin, also known as vitamin B1, helps the body process energy from the food we eat and is important for muscle function and a healthy nervous system. Folate helps your body produce healthy cells and genetic material like DNA.  For pregnant women, getting enough folate helps prevent birth defects such as spina bifida. Finally, potassium is critical to maintaining a healthy fluid balance and blood pressure, and also supports nerve and muscle function.',
                        'image' => '66119421afef9_products_orange_juice.jpeg',
                        'waiting_time' => 5,
                        'price' => 2500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:27:45',
                        'updated_at' => '2024-04-06 18:27:45',
                    ),
                2 =>
                    array(
                        'id' => 3,
                        'category_id' => 1,
                        'name' => 'Grape Juice',
                        'description' => 'Many grape juices are fortified with Vitamin C. Vitamin C is crucial for the growth and repair of cells. It also helps build strong bones, healthy teeth, skin, and cartilage, and supports a healthy immune system.

In addition, some grape juices are fortified with calcium and fiber. Check your label to determine the daily value in your favorite grape juice.',
                        'image' => '661194664539d_products_grape_juice.jpeg',
                        'waiting_time' => 5,
                        'price' => 2500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:28:54',
                        'updated_at' => '2024-04-06 18:28:54',
                    ),
                3 =>
                    array(
                        'id' => 4,
                        'category_id' => 1,
                        'name' => 'Cranberry Juice',
                        'description' => 'The majority of cranberry juice is fortified with vitamin C. Vitamin C is crucial for the growth and repair of cells. It also helps heal wounds, builds strong teeth, skin, bones and cartilage and is critical to a healthy immune system.',
                        'image' => '661194ad0d009_products_Cranberry_Juice.jpeg',
                        'waiting_time' => 5,
                        'price' => 2500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:30:05',
                        'updated_at' => '2024-04-06 18:30:05',
                    ),
                4 =>
                    array(
                        'id' => 5,
                        'category_id' => 1,
                        'name' => 'Carrot Juice',
                        'description' => 'Carrot juice is a good source of vitamin C, vitamin A (in the form of beta-carotene) and potassium. Vitamin C is crucial for the growth and repair of cells, as well as immune function. Vitamin A is important for immune function, reproductive and eye health. Potassium is essential for managing the body’s fluid balance, supporting healthy blood pressure, nerve and muscle function.',
                        'image' => '661194e97f73d_products_carrot_juice.jpeg',
                        'waiting_time' => 5,
                        'price' => 2500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:31:05',
                        'updated_at' => '2024-04-06 18:31:05',
                    ),
                5 =>
                    array(
                        'id' => 6,
                        'category_id' => 1,
                        'name' => 'Tomato Juice',
                        'description' => 'Tomato juice is a good source of vitamin A, vitamin C and potassium. Vitamin A is important for immune function, reproductive and eye health. Vitamin C is needed for the growth and repair of cells and is important for immune function.  Potassium is essential for managing the body’s fluid balance, supporting healthy blood pressure, nerve and muscle function.',
                        'image' => '661195190d3db_products_tomato_juice.jpeg',
                        'waiting_time' => 5,
                        'price' => 2500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:31:53',
                        'updated_at' => '2024-04-06 18:31:53',
                    ),
                6 =>
                    array(
                        'id' => 7,
                        'category_id' => 2,
                        'name' => 'Tiger Beer',
                        'description' => 'Tiger Beer is a Singaporean beer brand that was first launched in 1932. It is one of the world\'s largest beer brands, and is brewed using high-quality ingredients like barley from Europe and Australia, and hops from Germany. Tiger Beer is a light lager with an alcohol volume of 5.0 Vol, and is known for being bold, crisp, and full-bodied. The beer is brewed using a strict process that takes over 500 hours, and uses a unique brewing process called "Cold Suspension" to filter the brew at -1 degree Celcius. This process preserves the beer\'s desired flavors and aromas.',
                        'image' => '661197192a2bb_products_tigerbeer.jpg',
                        'waiting_time' => 0,
                        'price' => 4000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:40:25',
                        'updated_at' => '2024-04-06 18:40:25',
                    ),
                7 =>
                    array(
                        'id' => 8,
                        'category_id' => 2,
                        'name' => 'Heniken Beer',
                        'description' => 'Heineken is a pale lager beer with 5% alcohol by volume (ABV) that was first introduced in the Netherlands in 1873. It\'s made with malted barley, hops, water, and yeast, and sold in a green bottle with a red star. Heineken is brewed in more than 70 countries and offered in more than 200 countries.',
                        'image' => '6611979940e94_products_heineken_beer.png',
                        'waiting_time' => 0,
                        'price' => 5000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:42:33',
                        'updated_at' => '2024-04-06 18:42:33',
                    ),
                8 =>
                    array(
                        'id' => 9,
                        'category_id' => 3,
                        'name' => 'Lay\'s Classic Potato Chips',
                        'description' => 'Each bag of LAY’S Classic Flavor Potato Chips is a little reminder of how good the simple things are. Nothing is as perfectly seasoned as the traditional taste and crispy crunch that has made LAY’S Classic Flavor Potato Chips an American favorite for over 75 years.

Where there are smiles, there are LAY’S Potato Chips.',
                        'image' => '6611988b1352e_products_lay_classic.jpg',
                        'waiting_time' => 0,
                        'price' => 3500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:46:35',
                        'updated_at' => '2024-04-06 18:46:35',
                    ),
                9 =>
                    array(
                        'id' => 10,
                        'category_id' => 3,
                        'name' => 'Lay\'s Wavy Chips',
                        'description' => 'Wherever celebrations and good times happen, the LAY\'S brand will be there just as it has been for more than 75 years. With flavors almost as rich as our history, we have a potato chip or crisp flavor guaranteed to bring a smile on your face.',
                        'image' => '6611999b80e67_products_lay_wavy.jpg',
                        'waiting_time' => 0,
                        'price' => 3500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:51:07',
                        'updated_at' => '2024-04-06 18:51:07',
                    ),
                10 =>
                    array(
                        'id' => 11,
                        'category_id' => 3,
                        'name' => 'Lay\'s Barbecue  Chips',
                        'description' => 'Wherever celebrations and good times happen, the LAY\'S brand will be there just as it has been for more than 75 years. With flavors almost as rich as our history, we have a chip or crisp flavor guaranteed to bring a smile on your face.',
                        'image' => '66119a288a22d_products_Lay_Barbecue.jpg',
                        'waiting_time' => 0,
                        'price' => 3500,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:53:28',
                        'updated_at' => '2024-04-06 18:53:28',
                    ),
                11 =>
                    array(
                        'id' => 12,
                        'category_id' => 4,
                        'name' => 'Chipotle Tofu & Pineapple Skewers',
                        'description' => 'Tofu is so much more than a meat substitute—it’s a protein source that stands on its own, and is the perfect base to soak up tasty sauces, like this chipotle and guajillo chile marinade inspired by the popular Mexican street food, tacos al pastor.',
                        'image' => '66119aca643a2_products_Chipotle Tofu & Pineapple Skewers.jpg',
                        'waiting_time' => 15,
                        'price' => 8000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:56:10',
                        'updated_at' => '2024-04-06 18:56:10',
                    ),
                12 =>
                    array(
                        'id' => 13,
                        'category_id' => 4,
                        'name' => 'Ribs On The Grill',
                        'description' => 'Few foods are better than perfectly tender ribs, glistening with caramelized BBQ sauce. Now, you can have smokehouse-quality ribs from the comfort of your own home. All it takes is a grill, a few hours, and—okay—a lot of patience. While they\'re cooking is the perfect time to get the rest of your sides ready. We\'re talking BBQ classics like coleslaw, potato salad, and cornbread.',
                        'image' => '66119b07bfc56_products_Ribs On The Grill.jpg',
                        'waiting_time' => 30,
                        'price' => 17000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:57:11',
                        'updated_at' => '2024-04-06 18:57:11',
                    ),
                13 =>
                    array(
                        'id' => 14,
                        'category_id' => 4,
                        'name' => 'Grilled Steak Salad',
                        'description' => 'This salad is simple enough for a weeknight but worthy of planning a get-together around, thanks to its star ingredient—ribeye steak. You’ll grill it (and red onions), then combine it with cherry tomatoes, blue cheese, basil, and a drizzle of tangy balsamic dressing, turning it into the kind of impressive-but-secretly-easy dish you’ll be making all the time.',
                        'image' => '66119b74cbbcd_products_grilled-steak-salad.jpg',
                        'waiting_time' => 30,
                        'price' => 20000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 18:59:00',
                        'updated_at' => '2024-04-06 18:59:00',
                    ),
                14 =>
                    array(
                        'id' => 15,
                        'category_id' => 4,
                        'name' => 'Cilantro Lime Grilled Salmon',
                        'description' => 'This sauce is a great jumping off point. Feel free to change up the ingredients for countless delicious sauces: Try swapping in shallots for garlic, lemon for lime juice, or brown sugar for honey. The herbs are also adaptable: Basil, parsley, and tarragon would all be great swaps for cilantro. You could even add a splash of white wine if you\'re feeling fancy!',
                        'image' => '66119bb4357c2_products_Cilantro Lime Grilled Salmon.jpg',
                        'waiting_time' => 25,
                        'price' => 25000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:00:04',
                        'updated_at' => '2024-04-06 19:00:04',
                    ),
                15 =>
                    array(
                        'id' => 16,
                        'category_id' => 4,
                        'name' => 'Tacos Al Pastor',
                        'description' => 'Traditional tacos al pastor are made on a vertical rotisserie just like chicken shawarma. The method was used by Lebanese immigrants to Mexico and the tacos adapted to fit the culinary scene of Mexico with their spices and quickly became a popular street food. We make ours on the grill to speed things up!',
                        'image' => '66119becb3834_products_Tacos Al Pastor.png',
                        'waiting_time' => 20,
                        'price' => 20000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:01:00',
                        'updated_at' => '2024-04-06 19:01:00',
                    ),
                16 =>
                    array(
                        'id' => 17,
                        'category_id' => 5,
                        'name' => 'Chilli Seafood pizza',
                        'description' => 'Treat yourself to some everyday luxury with this chilli seafood pizza, laden with plump prawns and black mussels on the half shell. Don’t forget to finish with a squeeze of fresh lemon before serving.

Making pizza at home is easier than you think. And it’s tastier and far better for you than the takeaway variety. From the classic dough for the base to dozens of scrumptious toppings, you will satisfy your every pizza craving.',
                        'image' => '66119cad82782_products_Chilli seafood pizza.webp',
                        'waiting_time' => 45,
                        'price' => 30000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:04:13',
                        'updated_at' => '2024-04-06 19:04:13',
                    ),
                17 =>
                    array(
                        'id' => 18,
                        'category_id' => 5,
                        'name' => 'BBQ Chicken Pizza',
                        'description' => 'Chicken Pizza Recipe, A family favorite recipe which is made by cooking chicken with Indian spices and Italian herbs. Whole wheat pizza dough is topped with pizza sauce, spicy chicken filling, cheese, onions, tomatoes and peppers. Delicious chicken pizza cooked in a cast iron pan to get crispy crust and cheesy golden topping.',
                        'image' => '66119dae82077_products_BBQ Chicken Pizza.webp',
                        'waiting_time' => 30,
                        'price' => 22000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:08:30',
                        'updated_at' => '2024-04-06 19:08:30',
                    ),
                18 =>
                    array(
                        'id' => 19,
                        'category_id' => 5,
                        'name' => 'Taco Beef Pizza',
                        'description' => 'This Taco Beef Pizza is made with a homemade pizza crust, topped with refried beans, salsa, taco-seasoned ground beef, cheese and all your favorite taco toppings!',
                        'image' => '66119eb749367_products_taco-beef-pizza.jpg',
                        'waiting_time' => 30,
                        'price' => 28000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:12:55',
                        'updated_at' => '2024-04-06 19:12:55',
                    ),
                19 =>
                    array(
                        'id' => 20,
                        'category_id' => 5,
                        'name' => 'Cheese Pizza',
                        'description' => 'Earning for a cheesy delight? Then we have an easy cheese pizza recipe to add soul to your weekend binging! Weekend calls for some fun and nothing can be better than enjoying your favourite delight at home with your friends and family. In fact, no comfort food is better than a Pizza loaded with cheese!',
                        'image' => '66119f444fbd5_products_Cheese Pizza.webp',
                        'waiting_time' => 60,
                        'price' => 35000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:15:16',
                        'updated_at' => '2024-04-06 19:15:16',
                    ),
                20 =>
                    array(
                        'id' => 21,
                        'category_id' => 5,
                        'name' => 'Veggie Pizza',
                        'description' => 'Instead of ordering pizza why not make this quick, easy, healthy one? A delicious addition to your meat free Monday!',
                        'image' => '66119fb41ca54_products_Veggie Pizza.jpeg',
                        'waiting_time' => 25,
                        'price' => 18000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:17:08',
                        'updated_at' => '2024-04-06 19:17:08',
                    ),
                21 =>
                    array(
                        'id' => 22,
                        'category_id' => 6,
                        'name' => 'Classic Smashed Cheeseburger',
                        'description' => 'We\'ve got the secret to cooking a burger that\'s crispy on the outside, yet juicy on the inside: Freeze the patties for 15 minutes before cooking, then use two large griddle spatulas to smash them flat against the hottest skillet possible. Freezing the meat prevents it from cooking too quickly in the middle, which gives you time to get that deeply browned crust.',
                        'image' => '6611a0082bf88_products_Classic Smashed Cheeseburger.webp',
                        'waiting_time' => 20,
                        'price' => 12000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:18:32',
                        'updated_at' => '2024-04-06 19:18:32',
                    ),
                22 =>
                    array(
                        'id' => 23,
                        'category_id' => 6,
                        'name' => 'Chicken Burger',
                        'description' => 'Nothing warms up a chilly autumn day like fried chicken. This burger is a perfect choice for chicken burger fans looking for an indulgent recipe, with an autumnal twist. Featuring a pumpkin slaw, fresh guacamole, creamy melted cheese and salad, it’s truly “délicieux”',
                        'image' => '6611a091a7ed3_products_CHICKEN BURGER.jpg',
                        'waiting_time' => 20,
                        'price' => 15000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:20:50',
                        'updated_at' => '2024-04-06 19:20:50',
                    ),
                23 =>
                    array(
                        'id' => 24,
                        'category_id' => 6,
                        'name' => 'Spicy Beef Burger',
                        'description' => 'Forget the takeaway and make these double decker homemade cheeseburgers. With gherkins, crisp lettuce and a secret sauce, they take some beating',
                        'image' => '6611a1fe521d8_products_beef-burger.png',
                        'waiting_time' => 30,
                        'price' => 15000,
                        'view_count' => 0,
                        'created_at' => '2024-04-06 19:26:54',
                        'updated_at' => '2024-04-06 19:26:54',
                    ),
            )
        );


    }
}
