<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_posts')->insert(
            [
                // Fruits & Vegetables
                [
                    'category_id' => 3,
                    'user_id' => 1,
                    'title' => 'The Health Benefits of Eating Seasonal Fruits and Vegetables',
                    'slug' => 'the-health-benefits-of-eating-seasonal-fruits-and-vegetables',
                    'image' => 'upload/blog/thumbnail/1.jpg',
                    'details' => 'Exploring the immense health benefits of consuming fruits and vegetables that are in season. This includes better nutrient content, a more natural taste, and supporting local agriculture. We delve into which fruits and veggies are best to eat during different times of the year, from fresh berries in the summer to hearty root vegetables in the winter.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Dairy Products
                [
                    'category_id' => 4,
                    'user_id' => 1,
                    'title' => 'A Guide to Different Types of Cheese and Their Uses',
                    'slug' => 'a-guide-to-different-types-of-cheese-and-their-uses',
                    'image' => 'upload/blog/thumbnail/2.jpg',
                    'details' => 'Cheese is a versatile and beloved food, but with so many varieties, it can be hard to know where to start. This guide breaks down various types of cheese, from soft mozzarella and creamy brie to hard parmesan and sharp cheddar. We also provide tips on how to pair them with food and wine, and their best uses in recipes.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Bakery Items
                [
                    'category_id' => 5,
                    'user_id' => 1,
                    'title' => '10 Tips for Baking the Perfect Sourdough Bread at Home',
                    'slug' => '10-tips-for-baking-the-perfect-sourdough-bread-at-home',
                    'image' => 'upload/blog/thumbnail/3.jpg',
                    'details' => 'Sourdough bread has gained immense popularity for its unique flavor and crusty texture. However, mastering the art of baking it can be a challenge. This post offers 10 essential tips for home bakers, from creating a healthy starter to achieving that perfect golden-brown crust and a beautiful, airy crumb.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Meat & Poultry
                [
                    'category_id' => 6,
                    'user_id' => 1,
                    'title' => 'Understanding Different Cuts of Beef and How to Cook Them',
                    'slug' => 'understanding-different-cuts-of-beef-and-how-to-cook-them',
                    'image' => 'upload/blog/thumbnail/4.jpg',
                    'details' => 'From tenderloin to brisket, beef comes in a wide variety of cuts, each with its own ideal cooking method. This article explains the characteristics of popular beef cuts and provides simple cooking instructions, whether you\'re grilling a steak or slow-cooking a roast for a hearty meal.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Seafood
                [
                    'category_id' => 7,
                    'user_id' => 1,
                    'title' => 'Fresh vs. Frozen Seafood: What You Need to Know',
                    'slug' => 'fresh-vs-frozen-seafood-what-you-need-to-know',
                    'image' => 'upload/blog/thumbnail/5.jpg',
                    'details' => 'There\'s a common misconception that fresh seafood is always better than frozen. This blog post debunks myths and provides a clear comparison between fresh and frozen seafood, covering taste, nutrition, and cost. We also give tips on how to properly thaw and prepare frozen seafood to get the best results.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Snacks & Chips
                [
                    'category_id' => 8,
                    'user_id' => 1,
                    'title' => 'Healthy Snack Alternatives to Your Favorite Chips',
                    'slug' => 'healthy-snack-alternatives-to-your-favorite-chips',
                    'image' => 'upload/blog/thumbnail/6.jpg',
                    'details' => 'Craving a crunchy snack but want a healthier option? This article lists creative and delicious alternatives to traditional potato chips. From homemade kale chips to roasted chickpeas and popcorn, we offer a range of ideas that are both satisfying and good for you.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Beverages
                [
                    'category_id' => 9,
                    'user_id' => 1,
                    'title' => 'The Ultimate Guide to Making Refreshing Iced Tea at Home',
                    'slug' => 'the-ultimate-guide-to-making-refreshing-iced-tea-at-home',
                    'image' => 'upload/blog/thumbnail/7.jpg',
                    'details' => 'Iced tea is a perfect summer drink, but making a great batch is more than just adding ice to hot tea. This guide covers everything from choosing the right tea leaves and brewing methods to flavoring your iced tea with fruits, herbs, and sweeteners for a truly customized beverage.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Organic Foods
                [
                    'category_id' => 10,
                    'user_id' => 1,
                    'title' => 'Is Organic Food Really Worth the Extra Cost?',
                    'slug' => 'is-organic-food-really-worth-the-extra-cost',
                    'image' => 'upload/blog/thumbnail/8.jpg',
                    'details' => 'Many people wonder if the higher price of organic food is justified. This post explores the pros and cons of organic farming, covering topics like pesticide use, nutritional differences, and environmental impact. We help you make an informed decision about whether to choose organic products.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Frozen Foods
                [
                    'category_id' => 11,
                    'user_id' => 1,
                    'title' => 'Maximizing Your Freezer: A Guide to Freezing Food Safely',
                    'slug' => 'maximizing-your-freezer-a-guide-to-freezing-food-safely',
                    'image' => 'upload/blog/thumbnail/9.jpg',
                    'details' => 'Freezing food is a great way to reduce waste and save money. This guide provides practical tips on how to safely freeze a variety of foods, from raw meat and vegetables to cooked meals and baked goods. We also discuss best practices for preventing freezer burn and maintaining food quality.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Grains & Rice
                [
                    'category_id' => 12,
                    'user_id' => 1,
                    'title' => 'A Beginner\'s Guide to Cooking Different Types of Rice',
                    'slug' => 'a-beginners-guide-to-cooking-different-types-of-rice',
                    'image' => 'upload/blog/thumbnail/10.jpg',
                    'details' => 'Cooking rice seems simple, but different types require different techniques. This guide offers easy-to-follow instructions for cooking popular rice varieties like Basmati, Jasmine, and Brown rice, ensuring you get fluffy and perfectly cooked grains every time.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Spices & Herbs
                [
                    'category_id' => 13,
                    'user_id' => 1,
                    'title' => 'The Magic of Spices: How to Elevate Your Cooking',
                    'slug' => 'the-magic-of-spices-how-to-elevate-your-cooking',
                    'image' => 'upload/blog/thumbnail/11.jpg',
                    'details' => 'Spices can transform a simple dish into a culinary masterpiece. This blog post explores the unique flavors and aromas of common spices and offers tips on how to use them effectively in your cooking, from creating spice blends to toasting whole spices for a deeper flavor.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Breakfast & Cereal
                [
                    'category_id' => 14,
                    'user_id' => 1,
                    'title' => 'Beyond Cereal: Creative and Healthy Breakfast Ideas',
                    'slug' => 'beyond-cereal-creative-and-healthy-breakfast-ideas',
                    'image' => 'upload/blog/thumbnail/12.jpg',
                    'details' => 'Starting your day with a nutritious breakfast is crucial. This article provides a variety of breakfast ideas that go beyond the usual cereal bowl, including oatmeal bowls, smoothie recipes, and egg dishes that are quick to prepare and packed with nutrients.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Sauces & Condiments
                [
                    'category_id' => 15,
                    'user_id' => 1,
                    'title' => 'Make Your Own: A Guide to Homemade Ketchup and Mayonnaise',
                    'slug' => 'make-your-own-a-guide-to-homemade-ketchup-and-mayonnaise',
                    'image' => 'upload/blog/thumbnail/13.jpg',
                    'details' => 'Homemade sauces and condiments taste fresher and are free of preservatives. This post provides easy-to-follow recipes for classic ketchup and mayonnaise, with tips on how to customize the flavors to your liking.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Nuts & Seeds
                [
                    'category_id' => 16,
                    'user_id' => 1,
                    'title' => 'The Power of Nuts and Seeds: Small Foods, Big Benefits',
                    'slug' => 'the-power-of-nuts-and-seeds-small-foods-big-benefits',
                    'image' => 'upload/blog/thumbnail/14.jpg',
                    'details' => 'Nuts and seeds are nutrient powerhouses, packed with healthy fats, protein, and fiber. This article highlights the health benefits of different nuts and seeds, from almonds and walnuts to chia seeds and flaxseeds, and offers ideas for incorporating them into your diet.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Health Foods
                [
                    'category_id' => 17,
                    'user_id' => 1,
                    'title' => 'Superfoods: The Hype vs. The Reality',
                    'slug' => 'superfoods-the-hype-vs-the-reality',
                    'image' => 'upload/blog/thumbnail/15.jpg',
                    'details' => 'Superfoods like acai and kale are often promoted as a cure-all. This post examines the truth behind the superfood trend, explaining what makes a food "super" and how to incorporate these nutrient-dense foods into a balanced diet without falling for marketing gimmicks.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Sweets & Desserts
                [
                    'category_id' => 18,
                    'user_id' => 1,
                    'title' => 'Baking with Less Sugar: Sweetening Desserts Naturally',
                    'slug' => 'baking-with-less-sugar-sweetening-desserts-naturally',
                    'image' => 'upload/blog/thumbnail/16.jpg',
                    'details' => 'Looking to reduce your sugar intake without giving up dessert? This article provides creative ways to sweeten your baked goods using natural alternatives like honey, maple syrup, and fruit purees. We also offer tips on how to adjust your recipes for the best results.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Juices & Smoothies
                [
                    'category_id' => 19,
                    'user_id' => 1,
                    'title' => 'Green Smoothies for Beginners: Recipes and Tips',
                    'slug' => 'green-smoothies-for-beginners-recipes-and-tips',
                    'image' => 'upload/blog/thumbnail/17.jpg',
                    'details' => 'Green smoothies are a great way to boost your daily vegetable intake. This guide provides easy-to-follow recipes for beginners, using simple ingredients and offering tips on how to make your smoothies taste delicious while still being packed with nutrients.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Pasta & Noodles
                [
                    'category_id' => 20,
                    'user_id' => 1,
                    'title' => 'Beyond Spaghetti: Exploring the World of Pasta Shapes',
                    'slug' => 'beyond-spaghetti-exploring-the-world-of-pasta-shapes',
                    'image' => 'upload/blog/thumbnail/18.jpg',
                    'details' => 'Pasta comes in hundreds of shapes, each designed to pair with specific sauces. This post is a fun guide to different pasta shapes, explaining what makes each one unique and offering suggestions on the best sauces to use for a perfect pairing.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Canned Foods
                [
                    'category_id' => 21,
                    'user_id' => 1,
                    'title' => 'Creative Recipes Using Common Canned Foods',
                    'slug' => 'creative-recipes-using-common-canned-foods',
                    'image' => 'upload/blog/thumbnail/19.jpg',
                    'details' => 'Canned foods are a pantry staple, but they can be used for more than just simple meals. This article provides creative and delicious recipes that make use of common canned goods like beans, tomatoes, and tuna, transforming them into quick and easy dishes.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Cooking Oils
                [
                    'category_id' => 22,
                    'user_id' => 1,
                    'title' => 'Choosing the Right Cooking Oil for Your Recipes',
                    'slug' => 'choosing-the-right-cooking-oil-for-your-recipes',
                    'image' => 'upload/blog/thumbnail/20.jpg',
                    'details' => 'The right cooking oil can make or break a dish. This guide explains the smoke points and flavor profiles of different oils, from olive oil and canola oil to coconut oil, helping you select the best one for frying, baking, sautéing, and dressing.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Baby Foods
                [
                    'category_id' => 23,
                    'user_id' => 1,
                    'title' => 'Easy and Nutritious Homemade Baby Food Recipes',
                    'slug' => 'easy-and-nutritious-homemade-baby-food-recipes',
                    'image' => 'upload/blog/thumbnail/21.jpg',
                    'details' => 'Making your own baby food is a rewarding way to ensure your little one gets the best nutrition. This post offers simple and healthy recipes for baby food purees and mashes, with tips on ingredients and safe storage.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Tea & Coffee
                [
                    'category_id' => 24,
                    'user_id' => 1,
                    'title' => 'The Art of Brewing the Perfect Cup of Coffee at Home',
                    'slug' => 'the-art-of-brewing-the-perfect-cup-of-coffee-at-home',
                    'image' => 'upload/blog/thumbnail/22.jpg',
                    'details' => 'For coffee lovers, the perfect cup is an art form. This guide covers various brewing methods, from pour-over to French press, and offers tips on grinding beans, water temperature, and coffee-to-water ratios to help you achieve a rich and flavorful brew.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Chocolate & Confectionery
                [
                    'category_id' => 25,
                    'user_id' => 1,
                    'title' => 'Beyond Chocolate Bars: Exploring the World of Cacao',
                    'slug' => 'beyond-chocolate-bars-exploring-the-world-of-cacao',
                    'image' => 'upload/blog/thumbnail/23.jpg',
                    'details' => 'Chocolate is one of the world\'s most loved foods, but its journey from cacao bean to candy bar is fascinating. This article explores the origins of chocolate, the different types of cacao, and how to choose high-quality chocolate for both eating and baking.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Pickles & Chutneys
                [
                    'category_id' => 26,
                    'user_id' => 1,
                    'title' => 'A Beginner\'s Guide to Making Your Own Pickles',
                    'slug' => 'a-beginners-guide-to-making-your-own-pickles',
                    'image' => 'upload/blog/thumbnail/24.jpg',
                    'details' => 'Making pickles at home is a simple and rewarding process. This post provides a step-by-step guide to pickling vegetables, with a focus on quick and easy recipes that can be made without any special equipment. We also offer tips for experimenting with different flavors.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Fermented Foods
                [
                    'category_id' => 27,
                    'user_id' => 1,
                    'title' => 'The Gut-Health Revolution: Why You Should Eat More Fermented Foods',
                    'slug' => 'the-gut-health-revolution-why-you-should-eat-more-fermented-foods',
                    'image' => 'upload/blog/thumbnail/25.jpg',
                    'details' => 'Fermented foods like kimchi, yogurt, and sauerkraut are not only delicious but also incredibly beneficial for gut health. This article explains the science behind fermentation and how these foods can improve digestion, boost immunity, and contribute to overall well-being.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Gluten-Free Products
                [
                    'category_id' => 28,
                    'user_id' => 1,
                    'title' => 'Navigating the World of Gluten-Free Baking',
                    'slug' => 'navigating-the-world-of-gluten-free-baking',
                    'image' => 'upload/blog/thumbnail/26.jpg',
                    'details' => 'Gluten-free baking can be tricky, but with the right ingredients and techniques, you can achieve fantastic results. This guide provides an overview of common gluten-free flours and offers tips on how to substitute them in your favorite recipes for delicious, gluten-free treats.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Vegetarian & Vegan
                [
                    'category_id' => 29,
                    'user_id' => 1,
                    'title' => 'Plant-Based Protein: A Guide for Vegetarians and Vegans',
                    'slug' => 'plant-based-protein-a-guide-for-vegetarians-and-vegans',
                    'image' => 'upload/blog/thumbnail/27.jpg',
                    'details' => 'One of the most common questions for those on a plant-based diet is where to get enough protein. This article provides a comprehensive list of plant-based protein sources, from lentils and chickpeas to tofu and seitan, and offers ideas for incorporating them into your meals.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // International Cuisine
                [
                    'category_id' => 30,
                    'user_id' => 1,
                    'title' => 'Exploring the Flavors of Thai Cuisine at Home',
                    'slug' => 'exploring-the-flavors-of-thai-cuisine-at-home',
                    'image' => 'upload/blog/thumbnail/28.jpg',
                    'details' => 'Thai cuisine is known for its balance of sweet, sour, spicy, and savory flavors. This post provides an introduction to key Thai ingredients and offers simple recipes for popular dishes like Pad Thai and Green Curry, so you can bring the taste of Thailand to your kitchen.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Fast Food
                [
                    'category_id' => 31,
                    'user_id' => 1,
                    'title' => 'Making Healthier Choices at Your Favorite Fast Food Chains',
                    'slug' => 'making-healthier-choices-at-your-favorite-fast-food-chains',
                    'image' => 'upload/blog/thumbnail/29.jpg',
                    'details' => 'Eating fast food doesn\'t have to derail your diet. This article provides a practical guide to making healthier choices at popular fast food restaurants, including tips on ordering modifications and selecting lower-calorie options to stay on track.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Diet & Low-Calorie
                [
                    'category_id' => 32,
                    'user_id' => 1,
                    'title' => 'Delicious and Nutritious Low-Calorie Meal Prep Ideas',
                    'slug' => 'delicious-and-nutritious-low-calorie-meal-prep-ideas',
                    'image' => 'upload/blog/thumbnail/30.jpg',
                    'details' => 'Meal prepping is a great way to manage your diet and save time. This post offers a variety of delicious and low-calorie meal prep ideas, from salads and wraps to stir-fries and roasted vegetables, that will keep you full and energized throughout the week.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Fruits & Vegetables
                [
                    'category_id' => 3,
                    'user_id' => 1,
                    'title' => 'A Guide to Exotic Tropical Fruits',
                    'slug' => 'a-guide-to-exotic-tropical-fruits',
                    'image' => 'upload/blog/thumbnail/31.jpg',
                    'details' => 'Step outside the box with this guide to some of the most delicious and unique tropical fruits. From the spiky durian to the sweet lychee, we explore their flavors, health benefits, and how to eat them. This article is perfect for those looking to try something new and exciting.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Dairy Products
                [
                    'category_id' => 4,
                    'user_id' => 1,
                    'title' => 'The Health Benefits of Yogurt and Probiotics',
                    'slug' => 'the-health-benefits-of-yogurt-and-probiotics',
                    'image' => 'upload/blog/thumbnail/32.jpg',
                    'details' => 'Yogurt is more than just a tasty snack; it\'s packed with probiotics that are excellent for gut health. This blog post dives into the science behind probiotics and explains how they can improve digestion, boost immunity, and even affect your mood. We also give tips on choosing the best kind of yogurt.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Bakery Items
                [
                    'category_id' => 5,
                    'user_id' => 1,
                    'title' => 'Gluten-Free Baking: The Ultimate Guide',
                    'slug' => 'gluten-free-baking-the-ultimate-guide',
                    'image' => 'upload/blog/thumbnail/33.jpg',
                    'details' => 'For those with gluten sensitivity or celiac disease, baking can be a challenge. This guide offers a comprehensive look at gluten-free flour blends, substitutions, and techniques to help you bake delicious bread, cakes, and cookies that are free from gluten but full of flavor.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Meat & Poultry
                [
                    'category_id' => 6,
                    'user_id' => 1,
                    'title' => 'How to Grill the Perfect Steak Every Time',
                    'slug' => 'how-to-grill-the-perfect-steak-every-time',
                    'image' => 'upload/blog/thumbnail/34.jpg',
                    'details' => 'Grilling a steak can be intimidating, but with the right method, you can achieve a perfectly seared exterior and a juicy, tender interior. This article provides step-by-step instructions for grilling various cuts of steak, along with tips on seasoning, marinating, and resting.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Seafood
                [
                    'category_id' => 7,
                    'user_id' => 1,
                    'title' => 'Cooking with Seafood: Simple and Delicious Recipes',
                    'slug' => 'cooking-with-seafood-simple-and-delicious-recipes',
                    'image' => 'upload/blog/thumbnail/35.jpg',
                    'details' => 'Seafood is a quick and healthy option for weeknight dinners. This post provides a collection of simple and flavorful seafood recipes, from baked salmon to shrimp scampi, that are easy to prepare and perfect for a satisfying meal.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Snacks & Chips
                [
                    'category_id' => 8,
                    'user_id' => 1,
                    'title' => 'Homemade Granola Bars: A Healthy and Customizable Snack',
                    'slug' => 'homemade-granola-bars-a-healthy-and-customizable-snack',
                    'image' => 'upload/blog/thumbnail/36.jpg',
                    'details' => 'Store-bought granola bars can be high in sugar and preservatives. This recipe guide shows you how to make your own healthy and customizable granola bars at home. You can add your favorite nuts, seeds, and dried fruits for a perfect on-the-go snack.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Beverages
                [
                    'category_id' => 9,
                    'user_id' => 1,
                    'title' => 'The Healthiest Ways to Hydrate Beyond Water',
                    'slug' => 'the-healthiest-ways-to-hydrate-beyond-water',
                    'image' => 'upload/blog/thumbnail/37.jpg',
                    'details' => 'While water is essential, there are other healthy beverages that can help you stay hydrated. This article explores natural hydration options like coconut water, fruit-infused water, and herbal teas, explaining their benefits and how to prepare them.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Organic Foods
                [
                    'category_id' => 10,
                    'user_id' => 1,
                    'title' => 'Understanding Organic Labels: What Do They Mean?',
                    'slug' => 'understanding-organic-labels-what-do-they-mean',
                    'image' => 'upload/blog/thumbnail/38.jpg',
                    'details' => 'The term "organic" can be confusing. This post breaks down the different types of organic labels and certifications, explaining what they signify for consumers. We help you understand the difference between 100% organic, organic, and made with organic ingredients.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Frozen Foods
                [
                    'category_id' => 11,
                    'user_id' => 1,
                    'title' => 'Quick and Easy Meals from Your Freezer',
                    'slug' => 'quick-and-easy-meals-from-your-freezer',
                    'image' => 'upload/blog/thumbnail/39.jpg',
                    'details' => 'A well-stocked freezer is your secret weapon for quick and easy meals. This article provides a variety of recipes that rely on frozen ingredients, from frozen vegetables and pre-cooked meats to frozen dumplings, helping you prepare a delicious meal in minutes.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Grains & Rice
                [
                    'category_id' => 12,
                    'user_id' => 1,
                    'title' => 'Quinoa vs. Rice: A Nutritional Showdown',
                    'slug' => 'quinoa-vs-rice-a-nutritional-showdown',
                    'image' => 'upload/blog/thumbnail/40.jpg',
                    'details' => 'Quinoa and rice are both staple grains, but they have different nutritional profiles. This post compares the two, highlighting their health benefits, cooking methods, and uses in various recipes. We help you decide which one is the best choice for your diet.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Spices & Herbs
                [
                    'category_id' => 13,
                    'user_id' => 1,
                    'title' => 'Growing Your Own Herb Garden at Home',
                    'slug' => 'growing-your-own-herb-garden-at-home',
                    'image' => 'upload/blog/thumbnail/41.jpg',
                    'details' => 'There\'s nothing better than cooking with fresh herbs. This guide provides a simple walkthrough for starting your own herb garden, whether on a windowsill or in your backyard. We offer tips on what herbs are easy to grow and how to care for them.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Breakfast & Cereal
                [
                    'category_id' => 14,
                    'user_id' => 1,
                    'title' => 'The Healthiest Breakfasts to Kickstart Your Day',
                    'slug' => 'the-healthiest-breakfasts-to-kickstart-your-day',
                    'image' => 'upload/blog/thumbnail/42.jpg',
                    'details' => 'Your first meal sets the tone for the day. This article explores a range of healthy breakfast options that are high in protein and fiber, ensuring you feel full and energized. We provide recipes for everything from protein shakes to egg scrambles.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Sauces & Condiments
                [
                    'category_id' => 15,
                    'user_id' => 1,
                    'title' => 'Beyond Salad Dressing: Creative Ways to Use Vinaigrettes',
                    'slug' => 'beyond-salad-dressing-creative-ways-to-use-vinaigrettes',
                    'image' => 'upload/blog/thumbnail/43.jpg',
                    'details' => 'Vinaigrettes are not just for salads. This post shows you how to use them as marinades for meat and vegetables, as a sauce for roasted potatoes, or as a flavorful dip. We also provide a basic vinaigrette recipe that you can easily customize.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Nuts & Seeds
                [
                    'category_id' => 16,
                    'user_id' => 1,
                    'title' => 'Making Your Own Nut Butter at Home',
                    'slug' => 'making-your-own-nut-butter-at-home',
                    'image' => 'upload/blog/thumbnail/44.jpg',
                    'details' => 'Homemade nut butter is fresher, healthier, and often tastier than store-bought versions. This guide provides a simple recipe for making almond or peanut butter at home, with tips on how to achieve the perfect consistency and flavor.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Health Foods
                [
                    'category_id' => 17,
                    'user_id' => 1,
                    'title' => 'The Benefits of a Mediterranean Diet',
                    'slug' => 'the-benefits-of-a-mediterranean-diet',
                    'image' => 'upload/blog/thumbnail/45.jpg',
                    'details' => 'The Mediterranean diet is more than just a diet; it\'s a lifestyle focused on whole foods and healthy fats. This article explains the key principles of this diet and how it can improve heart health, aid in weight management, and contribute to overall longevity.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Sweets & Desserts
                [
                    'category_id' => 18,
                    'user_id' => 1,
                    'title' => 'Delicious and Easy 3-Ingredient Dessert Recipes',
                    'slug' => 'delicious-and-easy-3-ingredient-dessert-recipes',
                    'image' => 'upload/blog/thumbnail/46.jpg',
                    'details' => 'Craving something sweet but don\'t want to spend hours in the kitchen? This post offers a collection of simple and delicious dessert recipes that require only three ingredients. From chocolate truffles to peanut butter cookies, these are perfect for a quick fix.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Juices & Smoothies
                [
                    'category_id' => 19,
                    'user_id' => 1,
                    'title' => 'Juicing for Health: A Beginner\'s Guide',
                    'slug' => 'juicing-for-health-a-beginners-guide',
                    'image' => 'upload/blog/thumbnail/47.jpg',
                    'details' => 'Juicing is a great way to pack a lot of nutrients into a single glass. This guide provides a beginner\'s introduction to juicing, including what fruits and vegetables to use, how to get started, and tips for creating delicious and healthy juice blends.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Pasta & Noodles
                [
                    'category_id' => 20,
                    'user_id' => 1,
                    'title' => 'Mastering the Art of Homemade Pasta',
                    'slug' => 'mastering-the-art-of-homemade-pasta',
                    'image' => 'upload/blog/thumbnail/48.jpg',
                    'details' => 'Making pasta from scratch is a fun and rewarding process that elevates any meal. This post provides a step-by-step guide to making fresh pasta dough, with tips on kneading, shaping, and cooking to achieve a perfectly al dente result.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Canned Foods
                [
                    'category_id' => 21,
                    'user_id' => 1,
                    'title' => 'Canned Beans: Your Secret Weapon for Quick Meals',
                    'slug' => 'canned-beans-your-secret-weapon-for-quick-meals',
                    'image' => 'upload/blog/thumbnail/49.jpg',
                    'details' => 'Canned beans are a versatile and inexpensive pantry staple. This article explores creative ways to use them in various dishes, from hearty soups and stews to quick salads and dips, proving that they are a must-have for any kitchen.',
                    'status' => '1',
                    'created_at' => now(),
                ],
                // Cooking Oils
                [
                    'category_id' => 22,
                    'user_id' => 1,
                    'title' => 'The Healthiest Cooking Oils and Their Benefits',
                    'slug' => 'the-healthiest-cooking-oils-and-their-benefits',
                    'image' => 'upload/blog/thumbnail/50.jpg',
                    'details' => 'Not all cooking oils are created equal. This post highlights some of the healthiest oils, like extra virgin olive oil and avocado oil, explaining their nutritional benefits and ideal uses. We help you make an informed choice for your health and your recipes.',
                    'status' => '1',
                    'created_at' => now(),
                ],
            ]
        );
    }
}
