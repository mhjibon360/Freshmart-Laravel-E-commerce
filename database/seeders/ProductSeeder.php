<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Fruits
            ['product_name' => 'Fresh Red Apples', 'price' => 120, 'quantity' => 50, 'details' => 'Crisp and juicy red apples, perfect for snacking or baking. Sourced from the best orchards.', 'informations' => 'Rich in vitamins and fiber. Store in a cool, dry place.'],
            ['product_name' => 'Ripe Bananas', 'price' => 60, 'quantity' => 80, 'details' => 'Sweet and creamy bananas, a great source of energy. Ideal for a quick breakfast or smoothie.', 'informations' => 'High in potassium. Store at room temperature.'],
            ['product_name' => 'Fresh Strawberries', 'price' => 250, 'discount_price' => 220, 'quantity' => 30, 'details' => 'Vibrant red and sweet strawberries. Perfect for desserts or fresh consumption.', 'informations' => 'Packed with antioxidants. Best consumed fresh.'],
            ['product_name' => 'Green Grapes', 'price' => 180, 'quantity' => 45, 'details' => 'Seedless green grapes, offering a refreshing and sweet flavor. A healthy snack option.', 'informations' => 'Good source of Vitamin K and C. Keep refrigerated.'],
            ['product_name' => 'Juicy Oranges', 'price' => 90, 'quantity' => 60, 'details' => 'Navel oranges, known for their sweet taste and easy-to-peel skin. Excellent for fresh juice.', 'informations' => 'High in Vitamin C. Store in a cool place.'],
            ['product_name' => 'Pomegranate', 'price' => 280, 'quantity' => 25, 'details' => 'A large, juicy pomegranate filled with ruby-red seeds. A superfood packed with flavor.', 'informations' => 'Rich in antioxidants and fiber. Can be used in salads or as a garnish.'],
            ['product_name' => 'Pineapples', 'price' => 150, 'quantity' => 35, 'details' => 'Sweet and tangy pineapples, great for juices, salads, or eating fresh.', 'informations' => 'Contains bromelain, an enzyme that aids digestion. Store in a cool place.'],
            ['product_name' => 'Kiwi Fruit', 'price' => 300, 'quantity' => 20, 'details' => 'Fuzzy brown skin with a bright green, tangy inside. A unique and nutritious fruit.', 'informations' => 'Excellent source of Vitamin C. Keep in the refrigerator.'],

            // Vegetables
            ['product_name' => 'Organic Carrots', 'price' => 50, 'quantity' => 70, 'details' => 'Freshly harvested, crunchy organic carrots. Versatile for cooking or raw consumption.', 'informations' => 'Rich in Beta-carotene. Wash thoroughly before use.'],
            ['product_name' => 'Broccoli', 'price' => 80, 'quantity' => 55, 'details' => 'Tender and healthy broccoli florets. Great for stir-fries, salads, or steaming.', 'informations' => 'High in Vitamin C and K. Keep refrigerated.'],
            ['product_name' => 'Farm-Fresh Potatoes', 'price' => 40, 'quantity' => 100, 'details' => 'All-purpose potatoes, suitable for frying, boiling, or mashing.', 'informations' => 'Good source of carbohydrates. Store in a cool, dark place.'],
            ['product_name' => 'Red Onions', 'price' => 70, 'quantity' => 90, 'details' => 'Pungent red onions, perfect for adding flavor to salads, curries, or sandwiches.', 'informations' => 'A staple in many cuisines. Store in a well-ventilated area.'],
            ['product_name' => 'Spinach', 'price' => 60, 'quantity' => 40, 'details' => 'Fresh green spinach leaves, packed with iron and nutrients. Excellent for salads, curries, or steaming.', 'informations' => 'Rich in Iron. Best to consume fresh.'],
            ['product_name' => 'Cucumbers', 'price' => 30, 'quantity' => 65, 'details' => 'Crisp and hydrating cucumbers, ideal for salads and sandwiches.', 'informations' => 'High water content. Keep refrigerated for freshness.'],
            ['product_name' => 'Bell Peppers (Assorted)', 'price' => 110, 'quantity' => 30, 'details' => 'A mix of red, yellow, and green bell peppers. Adds color and a sweet flavor to any dish.', 'informations' => 'Rich in Vitamin C. Ideal for stir-fries and salads.'],
            ['product_name' => 'Cherry Tomatoes', 'price' => 150, 'quantity' => 25, 'details' => 'Small, sweet cherry tomatoes. Great for snacking or adding a burst of flavor to pasta and salads.', 'informations' => 'Good source of lycopene. Store at room temperature.'],

            // Other Products
            ['product_name' => 'Organic Whole Wheat Bread', 'price' => 85, 'quantity' => 50, 'details' => 'Soft, wholesome bread made from 100% organic whole wheat. Perfect for a healthy breakfast.', 'informations' => 'High in fiber. Store in a cool, dry place.'],
            ['product_name' => 'Honey Crunch Cereal', 'price' => 220, 'discount_price' => 200, 'quantity' => 40, 'details' => 'A crunchy mix of honey-flavored cereal. A delicious and satisfying breakfast option.', 'informations' => 'Contains whole grains. Serve with milk and fresh fruit.'],
            ['product_name' => 'Fresh Chicken Breast', 'price' => 350, 'quantity' => 30, 'details' => 'Boneless, skinless chicken breast. A lean and versatile protein source for various dishes.', 'informations' => 'High in protein. Keep refrigerated.'],
            ['product_name' => 'Premium Olive Oil', 'price' => 450, 'quantity' => 20, 'details' => 'Extra virgin olive oil from Italy. Perfect for cooking, dressings, and dips.', 'informations' => 'Healthy fats. Store in a cool, dark place away from direct sunlight.'],
            ['product_name' => 'Natural Greek Yogurt', 'price' => 180, 'quantity' => 25, 'details' => 'Thick and creamy Greek yogurt with a tangy flavor. A great source of protein.', 'informations' => 'Rich in probiotics. Keep refrigerated.'],
            ['product_name' => 'Basmati Rice (5kg)', 'price' => 700, 'quantity' => 50, 'details' => 'Premium long-grain basmati rice. Aromatic and perfect for biryani or pulao.', 'informations' => 'Store in an airtight container.'],
            ['product_name' => 'Assorted Herbal Tea Bags', 'price' => 250, 'discount_price' => 230, 'quantity' => 35, 'details' => 'A variety pack of herbal teas, including chamomile, peppermint, and green tea. Soothing and refreshing.', 'informations' => 'Caffeine-free. Brew with hot water for 3-5 minutes.'],
            ['product_name' => 'Farm Fresh Eggs (12 pack)', 'price' => 150, 'quantity' => 60, 'details' => 'A dozen large, brown eggs from free-range chickens. Excellent for baking and cooking.', 'informations' => 'Good source of protein. Keep refrigerated.'],
            ['product_name' => 'Natural Honey', 'price' => 320, 'quantity' => 20, 'details' => 'Pure, golden honey from local beekeepers. A natural sweetener for your tea, toast, and desserts.', 'informations' => 'Do not feed to infants under one year. Store at room temperature.'],
            ['product_name' => 'Premium Coffee Beans (250g)', 'price' => 400, 'quantity' => 15, 'details' => 'Dark roast coffee beans with a rich, bold flavor. Perfect for brewing a strong cup of coffee.', 'informations' => 'Store in an airtight container away from light and heat.'],
            ['product_name' => 'Assorted Cheese Block', 'price' => 550, 'quantity' => 18, 'details' => 'A selection of fine cheeses, including cheddar, mozzarella, and gouda. Great for a cheese board.', 'informations' => 'Keep refrigerated. Consume within a week after opening.'],
            ['product_name' => 'Spaghetti Pasta (500g)', 'price' => 100, 'quantity' => 45, 'details' => 'Durum wheat semolina pasta, perfect for classic Italian dishes. Cooks in 8-10 minutes.', 'informations' => 'Store in a cool, dry place.'],
            ['product_name' => 'Organic Lentils', 'price' => 95, 'quantity' => 50, 'details' => 'Protein-rich organic lentils, a staple in many cuisines. Easy to cook and very nutritious.', 'informations' => 'Requires soaking before cooking. Store in a dry place.'],
            ['product_name' => 'Almond Milk (1L)', 'price' => 210, 'quantity' => 30, 'details' => 'A dairy-free alternative to milk, with a light and nutty flavor. Great for cereals and coffee.', 'informations' => 'Shake well before use. Refrigerate after opening.'],
            ['product_name' => 'Dark Chocolate Bar', 'price' => 140, 'quantity' => 25, 'details' => 'A rich, 70% dark chocolate bar. Indulge in its intense cocoa flavor. ', 'informations' => 'Store in a cool, dry place. May contain traces of nuts.'],
            ['product_name' => 'Canned Tuna in Oil', 'price' => 180, 'quantity' => 35, 'details' => 'High-quality tuna chunks in oil. Perfect for salads, sandwiches, or pasta.', 'informations' => 'Consume within 2 days after opening. Store in a cool, dry place.'],
            ['product_name' => 'Natural Peanut Butter (Crunchy)', 'price' => 280, 'quantity' => 28, 'details' => 'Made with 100% roasted peanuts. Contains no added sugar or preservatives. Great with toast.', 'informations' => 'Stir well before use. Store at room temperature.'],
            ['product_name' => 'Mixed Nuts & Dried Fruits', 'price' => 350, 'quantity' => 22, 'details' => 'A healthy mix of almonds, cashews, raisins, and cranberries. A power-packed snack.', 'informations' => 'A great source of protein and healthy fats. Store in an airtight container.'],
            ['product_name' => 'Canned Tomatoes', 'price' => 90, 'quantity' => 40, 'details' => 'Peeled and diced tomatoes in a can. A quick and easy base for sauces and curries.', 'informations' => 'Ready to use. Store in a cool, dry place.'],
            ['product_name' => 'Organic Oats (500g)', 'price' => 110, 'quantity' => 50, 'details' => 'Rolled oats for a healthy and hearty breakfast. Perfect for oatmeal or granola bars.', 'informations' => 'High in fiber. Store in a dry place.'],
            ['product_name' => 'Fresh Shrimp', 'price' => 450, 'quantity' => 15, 'details' => 'Headless, deveined shrimp. Ideal for a variety of seafood dishes. ', 'informations' => 'Keep frozen until ready to use. Cook thoroughly.'],
            ['product_name' => 'Tofu (Extra Firm)', 'price' => 70, 'quantity' => 30, 'details' => 'A great plant-based protein source. Extra firm tofu that holds its shape well when cooked.', 'informations' => 'Keep refrigerated. Ideal for stir-fries and grilling.'],
            ['product_name' => 'Soy Sauce', 'price' => 120, 'quantity' => 40, 'details' => 'A classic savory sauce for marinades, dips, and stir-fries. Adds a rich, umami flavor.', 'informations' => 'Refrigerate after opening. Store in a cool, dark place.'],
            ['product_name' => 'Milk (Full Cream 1L)', 'price' => 100, 'quantity' => 60, 'details' => 'Pasteurized full-cream milk. A versatile kitchen essential for beverages, baking, and cooking.', 'informations' => 'Keep refrigerated. Consume within 3 days after opening.'],
            ['product_name' => 'Organic Brown Rice (1kg)', 'price' => 130, 'quantity' => 45, 'details' => 'Nutty and flavorful brown rice. A healthier alternative to white rice. ', 'informations' => 'Requires a longer cooking time. Store in a dry place.'],
            ['product_name' => 'Italian Herbs Mix', 'price' => 80, 'quantity' => 50, 'details' => 'A blend of popular Italian herbs like oregano, basil, and thyme. Perfect for pasta and pizza.', 'informations' => 'Adds great flavor to Mediterranean dishes. Store in a cool, dry place.'],
            ['product_name' => 'Cinnamon Sticks', 'price' => 95, 'quantity' => 20, 'details' => 'Aromatic and flavorful cinnamon sticks. Ideal for adding a warm, sweet note to desserts and drinks.', 'informations' => 'Adds great flavor to desserts and beverages. Store in an airtight container.'],
            ['product_name' => 'Garlic Bulbs (250g)', 'price' => 40, 'quantity' => 70, 'details' => 'Fresh garlic bulbs. An essential ingredient for almost any savory dish.', 'informations' => 'Store in a cool, dry place. Do not refrigerate.'],
            ['product_name' => 'Red Lentils (Masoor Dal)', 'price' => 85, 'quantity' => 55, 'details' => 'Quick-cooking red lentils, commonly used for making dal. A great source of plant-based protein.', 'informations' => 'No soaking required. Rinse before cooking.'],
            ['product_name' => 'Sweet Corn Cobs', 'price' => 60, 'quantity' => 40, 'details' => 'Fresh and sweet corn on the cob. Perfect for boiling, grilling, or roasting.', 'informations' => 'A summer staple. Best consumed fresh.'],
            ['product_name' => 'Fresh Cabbage', 'price' => 50, 'quantity' => 60, 'details' => 'A large, crisp cabbage head. Versatile for salads, stir-fries, or stews.', 'informations' => 'Good source of Vitamin C. Keep refrigerated.'],
            ['product_name' => 'Green Chili (250g)', 'price' => 30, 'quantity' => 50, 'details' => 'Spicy green chilies to add heat to your curries and dishes. ', 'informations' => 'Use in moderation. Store in a cool place.'],
            ['product_name' => 'Fresh Mint Leaves', 'price' => 25, 'quantity' => 30, 'details' => 'A bunch of fresh mint leaves. Adds a refreshing touch to drinks, salads, and chutneys.', 'informations' => 'Keep refrigerated. Ideal for making mojitos.'],
            ['product_name' => 'Paneer (200g)', 'price' => 150, 'quantity' => 25, 'details' => 'A block of soft Indian cottage cheese. A popular vegetarian protein source.', 'informations' => 'Keep refrigerated. Use within a few days of opening.'],
            ['product_name' => 'Brown Sugar', 'price' => 70, 'quantity' => 45, 'details' => 'Moist and flavorful brown sugar. Ideal for baking and sweetening beverages.', 'informations' => 'Store in an airtight container to prevent it from hardening.'],
            ['product_name' => 'Black Tea Powder', 'price' => 120, 'quantity' => 35, 'details' => 'High-quality black tea powder for a strong, aromatic cup of tea.', 'informations' => 'Store in a cool, dry place. Ideal for making milk tea.'],
            ['product_name' => 'Premium Mustard Oil (1L)', 'price' => 200, 'quantity' => 30, 'details' => 'Pure and pungent mustard oil. A traditional cooking oil used in many cuisines.', 'informations' => 'Keep in a cool, dark place.'],
            ['product_name' => 'Coconut Milk (Canned)', 'price' => 160, 'quantity' => 25, 'details' => 'Creamy coconut milk, perfect for curries, desserts, and smoothies.', 'informations' => 'Shake well before use. Refrigerate after opening.'],
            ['product_name' => 'Ginger (250g)', 'price' => 40, 'quantity' => 50, 'details' => 'Fresh ginger root. Adds a zesty and spicy flavor to both savory and sweet dishes.', 'informations' => 'Store in a cool, dry place.'],

        ];

        $categories = range(5, 16);
        $types = ['hot', 'sale'];
        $image_count = 1;
        foreach ($products as $product) {
            $product['category_id'] = $categories[array_rand($categories)];
            $product['slug'] = Str::slug($product['product_name']) . '-' . Str::random(5);
            $product['thumbnail'] = '/upload/product/thumbnail/' . $image_count . '.jpg';
            $product['product_code'] = 'FBB' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $product['popular_products'] = rand(0, 1);
            $product['best_sells'] = rand(0, 1);
            $product['type'] = $types[array_rand($types)];
            $product['status'] = 1;
            $product['created_at'] = now();
            $product['updated_at'] = now();

            DB::table('products')->insert($product);
            $image_count++;
        }
    }
}
