<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterPizzeriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. INJECT DOUGHS (8 Options)
        $doughs = [
            'Classic Hand-Tossed' => 60, 'Thin & Crispy' => 60, 'Artisanal Sourdough' => 90,
            'Gourmet Cheese Burst' => 120, 'Stuffed Garlic Crust' => 90, 'Gluten-Free Almond Crust' => 110,
            'Whole Wheat Thin Crust' => 70, 'Ragi Millet Base' => 80
        ];
        foreach ($doughs as $name => $price) {
            DB::table('doughs')->insert(['name' => $name, 'base_price_inr' => $price, 'created_at' => now(), 'updated_at' => now()]);
        }

        // 2. INJECT SAUCES (8 Options)
        $sauces = [
            'Classic Marinara' => 30, 'Spicy Peri-Peri' => 40, 'Smokey Hickory BBQ' => 40,
            'Creamy Roasted Garlic Alfredo' => 50, 'Basil Pesto infusion' => 60, 'Tandoori Masala Spread' => 40,
            'Schezwan Chili Twist' => 30, 'Tangy Tomato Makhani' => 40
        ];
        foreach ($sauces as $name => $price) {
            DB::table('sauces')->insert(['name' => $name, 'base_price_inr' => $price, 'created_at' => now(), 'updated_at' => now()]);
        }

        // 3. INJECT CHEESES (8 Options)
        $cheeses = [
            'Premium Mozzarella Pearls' => 70, 'Sharp Cheddar Blend' => 60, 'Smoked Gouda Shreds' => 80,
            'Artisanal Monterey Jack' => 70, 'Creamy Feta Crumbles' => 80, 'Vegan Cashew Mozzarella' => 90,
            'Local Amul Processed Blend' => 50, 'Spiced Pepper Jack' => 60
        ];
        foreach ($cheeses as $name => $price) {
            DB::table('cheeses')->insert(['name' => $name, 'base_price_inr' => $price, 'created_at' => now(), 'updated_at' => now()]);
        }

        // 4. INJECT TOPPINGS (12 Options)
        $toppings = [
            'Paneer Cubes' => 50, 'Tandoori Paneer strips' => 60, 'Golden Button Mushrooms' => 40,
            'Sweet Juicy Corn' => 30, 'Crunchy Green Capsicum' => 30, 'Fiery Red Paprika' => 30,
            'Zesty Jalapeños' => 30, 'Sliced Black Olives' => 40, 'Spanish Red Onions' => 20,
            'Juicy Cherry Tomatoes' => 40, 'Fresh Basil Leaves' => 20, 'Roasted Garlic Flakes' => 30
        ];
        foreach ($toppings as $name => $price) {
            DB::table('toppings')->insert(['name' => $name, 'base_price_inr' => $price, 'created_at' => now(), 'updated_at' => now()]);
        }

        // 5. INJECT SIZES & MULTIPLIERS (8 Tiers)
        $sizes = [
            'Pan-6"' => 0.50, 'Small-8"' => 0.75, 'Regular-10"' => 1.00, 'Medium-12"' => 1.30,
            'Large-14"' => 1.60, 'X-Large-16"' => 2.00, 'Family-20"' => 3.00, 'Party-30"' => 6.50
        ];
        foreach ($sizes as $name => $mult) {
            DB::table('sizes')->insert(['name' => $name, 'price_multiplier' => $mult, 'created_at' => now(), 'updated_at' => now()]);
        }
        // 6. INJECT SIDES (5 Options)
        $sides = [
            'Stuffed Garlic Breadsticks' => 139, 'Cheesy Jalapeño Poppers' => 159,
            'Wood-Fired Peri-Peri Potato Wedges' => 119, 'Paneer Tikka Garlic Toast' => 169,
            'Classic Baked Crinkle Fries' => 99
        ];
        foreach ($sides as $name => $price) {
            DB::table('sides')->insert(['name' => $name, 'base_price_inr' => $price, 'is_available' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // 7. INJECT COLD DRINKS (6 Options)
        $drinks = [
            'Coca-Cola (Regular - 330ml Can)' => 40, 'Sprite (Regular - 330ml Can)' => 40,
            'Thums Up (Regular - 330ml Can)' => 40, 'Rajkot Special Mint Mojito' => 120,
            'Creamy Alfonso Henry Mango Shake' => 140, 'Packaged Drinking Water (1L Bottle)' => 20
        ];
        foreach ($drinks as $name => $price) {
            DB::table('cold_drinks')->insert(['name' => $name, 'base_price_inr' => $price, 'is_available' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

        // 8. INJECT DESSERTS (5 Options)
        $desserts = [
            'Choco Lava Volcanic Cake' => 119, 'Gooey Walnut Brownie' => 139,
            'Sizzling Brownie Overload' => 199, 'Classic Vanilla Bean Ice Cream (Single Scoop)' => 60,
            'Premium Kesar Pista Ice Cream (Single Scoop)' => 80
        ];
        foreach ($desserts as $name => $price) {
            DB::table('desserts')->insert(['name' => $name, 'base_price_inr' => $price, 'is_available' => true, 'created_at' => now(), 'updated_at' => now()]);
        }

                // 9. INJECT TIME-BASED DEALS MATRIX WITH COMBO MEALS (12 Options Total)
        $deals = [
            // Standard Time-Based Promotional Coupons
            ['title' => 'Daily Wood-Fired Happy Hours', 'desc' => 'Get ₹50 off on any Medium or Large signature pizza ordered between 3:00 PM and 6:00 PM.', 'tier' => 'Daily', 'type' => 'fixed_amount', 'val' => 50, 'combo' => false, 'price' => null, 'member' => false],
            ['title' => '🔒 Midnight Cravings Booster', 'desc' => 'Unlock a completely FREE order of Stuffed Garlic Bread Sticks with any Large pizza purchase after 9:00 PM.', 'tier' => 'Daily', 'type' => 'free_item', 'val' => 0, 'combo' => false, 'price' => null, 'member' => true],
            ['title' => 'Midweek Madness BOGO', 'desc' => 'Buy any Regular size pizza on Tuesdays or Wednesdays and get a second pizza of equal value at 50% off.', 'tier' => 'Weekly', 'type' => 'percentage', 'val' => 50, 'combo' => false, 'price' => null, 'member' => false],
            ['title' => '🔒 Weekend Family Gathering Feast', 'desc' => 'Order any 2 Large Pizzas and get a 100% FREE combo pack containing 1 Side, 1 Dessert, and a 1.25L Cold Drink.', 'tier' => 'Weekly', 'type' => 'free_item', 'val' => 0, 'combo' => false, 'price' => null, 'member' => true],
            ['title' => 'Monthly Payday Treats', 'desc' => 'Take a flat 15% off your entire checkout bill amount during the first 3 days of any month.', 'tier' => 'Monthly', 'type' => 'percentage', 'val' => 15, 'combo' => false, 'price' => null, 'member' => false],
            ['title' => '🔒 The 30-Inch Corporate Party Slam', 'desc' => 'Planning a massive gathering? Unlock an exclusive, massive ₹500 flat discount on our giant Party-30" pizza setup.', 'tier' => 'Monthly', 'type' => 'fixed_amount', 'val' => 500, 'combo' => false, 'price' => null, 'member' => true],
            ['title' => 'Monsoon Sourdough Comforts', 'desc' => 'Warm up the rainy season with 20% off on our specialized premium Artisanal Sourdough crust pies.', 'tier' => 'Seasonal', 'type' => 'percentage', 'val' => 20, 'combo' => false, 'price' => null, 'member' => false],
            ['title' => '🔒 Diwali Green Festival Premium Box', 'desc' => 'Celebrate with a massive, high-tier family box set: 2 Medium Pizzas + 2 Sides + 2 Desserts at a premium 35% total bundle discount.', 'tier' => 'Seasonal', 'type' => 'percentage', 'val' => 35, 'combo' => false, 'price' => null, 'member' => true],
            
            // NEW SPECIFIC STRUCTURAL COMBO MEAL BUNDLES
            ['title' => 'Solo Hunger Cruncher Box', 'desc' => '1 Personal Pan-6" Classic Pizza + 1 Baked Crinkle Fries + 1 Coca-Cola Can.', 'tier' => 'Combo Meals', 'type' => 'bundle_deal', 'val' => 0, 'combo' => true, 'price' => 199, 'member' => false],
            ['title' => 'The Duo Sourdough Feast', 'desc' => '2 Regular-10" Smokey Margherita Pizzas + 1 Stuffed Garlic Breadsticks + 2 Regular Cold Drinks.', 'tier' => 'Combo Meals', 'type' => 'bundle_deal', 'val' => 0, 'combo' => true, 'price' => 599, 'member' => false],
            ['title' => '🔒 Mega Club Trio Box Set', 'desc' => '3 Medium-12" Bold Fusion Pizzas + 2 Cheesy Jalapeño Poppers + 1 Alfonso Mango Shake + 1L Bottled Water.', 'tier' => 'Combo Meals', 'type' => 'bundle_deal', 'val' => 0, 'combo' => true, 'price' => 899, 'member' => true],
            ['title' => 'The 30-Inch Party Showstopper Combo', 'desc' => '1 Giant Party-30" Pizza with unlimited toppings + 3 Orders of Wedges + 4 Cold Drinks.', 'tier' => 'Combo Meals', 'type' => 'bundle_deal', 'val' => 0, 'combo' => true, 'price' => 1899, 'member' => false]
        ];
        foreach ($deals as $deal) {
            DB::table('deals')->insert([
                'title' => $deal['title'], 'description' => $deal['desc'], 'time_tier' => $deal['tier'],
                'discount_type' => $deal['type'], 'discount_value' => $deal['val'], 
                'is_combo_meal' => $deal['combo'], 'combo_price' => $deal['price'], 'is_members_only' => $deal['member'],
                'created_at' => now(), 'updated_at' => now()
            ]);
        }

        // 10. RE-BUILD THE 18 PRE-CALCULATED PIZZA SIGNATURE RECIPES
        $d = DB::table('doughs')->pluck('id', 'name');
        $s = DB::table('sauces')->pluck('id', 'name');
        $c = DB::table('cheeses')->pluck('id', 'name');
        $t = DB::table('toppings')->pluck('id', 'name');

        $menu = [
            ['name' => 'Smokey Margherita', 'cat' => 'Classics', 'price' => 250, 'd' => 'Artisanal Sourdough', 's' => 'Classic Marinara', 'c' => 'Premium Mozzarella Pearls', 'tops' => ['Fresh Basil Leaves', 'Juicy Cherry Tomatoes']],
            ['name' => 'The Rajkot Garden Supreme', 'cat' => 'Classics', 'price' => 220, 'd' => 'Classic Hand-Tossed', 's' => 'Classic Marinara', 'c' => 'Local Amul Processed Blend', 'tops' => ['Crunchy Green Capsicum', 'Spanish Red Onions', 'Sweet Juicy Corn']],
            ['name' => 'Double Cheese Burst Classic', 'cat' => 'Classics', 'price' => 220, 'd' => 'Gourmet Cheese Burst', 's' => 'Classic Marinara', 'c' => 'Premium Mozzarella Pearls', 'tops' => []],
            ['name' => 'Hearthside Herb Garden', 'cat' => 'Classics', 'price' => 280, 'd' => 'Artisanal Sourdough', 's' => 'Classic Marinara', 'c' => 'Premium Mozzarella Pearls', 'tops' => ['Fresh Basil Leaves', 'Juicy Cherry Tomatoes', 'Roasted Garlic Flakes']],
            ['name' => 'Classic Onion & Capsicum Crunch', 'cat' => 'Classics', 'price' => 190, 'd' => 'Classic Hand-Tossed', 's' => 'Classic Marinara', 'c' => 'Local Amul Processed Blend', 'tops' => ['Spanish Red Onions', 'Crunchy Green Capsicum']],
            ['name' => 'Golden Corn Feast', 'cat' => 'Classics', 'price' => 200, 'd' => 'Thin & Crispy', 's' => 'Classic Marinara', 'c' => 'Local Amul Processed Blend', 'tops' => ['Sweet Juicy Corn', 'Crunchy Green Capsicum']],
            ['name' => 'Peri-Peri Paneer Feast', 'cat' => 'Bold Flavors', 'price' => 320, 'd' => 'Artisanal Sourdough', 's' => 'Spicy Peri-Peri', 'c' => 'Premium Mozzarella Pearls', 'tops' => ['Tandoori Paneer strips', 'Crunchy Green Capsicum', 'Fiery Red Paprika']],
            ['name' => 'Tandoori Inferno', 'cat' => 'Bold Flavors', 'price' => 290, 'd' => 'Stuffed Garlic Crust', 's' => 'Tandoori Masala Spread', 'c' => 'Spiced Pepper Jack', 'tops' => ['Paneer Cubes', 'Spanish Red Onions', 'Zesty Jalapeños']],
            ['name' => 'Schezwan Zing Fire', 'cat' => 'Bold Flavors', 'price' => 240, 'd' => 'Thin & Crispy', 's' => 'Schezwan Chili Twist', 'c' => 'Local Amul Processed Blend', 'tops' => ['Golden Button Mushrooms', 'Sweet Juicy Corn', 'Zesty Jalapeños']],
            ['name' => 'Makhani Paneer Delight', 'cat' => 'Bold Flavors', 'price' => 270, 'd' => 'Classic Hand-Tossed', 's' => 'Tangy Tomato Makhani', 'c' => 'Premium Mozzarella Pearls', 'tops' => ['Paneer Cubes', 'Spanish Red Onions', 'Sweet Juicy Corn']],
            ['name' => 'Spicy Jalapeño Popper Pie', 'cat' => 'Bold Flavors', 'price' => 280, 'd' => 'Gourmet Cheese Burst', 's' => 'Spicy Peri-Peri', 'c' => 'Spiced Pepper Jack', 'tops' => ['Zesty Jalapeños', 'Fiery Red Paprika']],
            ['name' => 'Bullet Chilli Paneer Blast', 'cat' => 'Bold Flavors', 'price' => 290, 'd' => 'Stuffed Garlic Crust', 's' => 'Schezwan Chili Twist', 'c' => 'Spiced Pepper Jack', 'tops' => ['Tandoori Paneer strips', 'Zesty Jalapeños', 'Spanish Red Onions']],
            ['name' => 'The Green Oven Masterpiece', 'cat' => 'Premium Tier', 'price' => 370, 'd' => 'Artisanal Sourdough', 's' => 'Basil Pesto infusion', 'c' => 'Premium Mozzarella Pearls', 'tops' => ['Roasted Garlic Flakes', 'Sliced Black Olives', 'Juicy Cherry Tomatoes', 'Golden Button Mushrooms']],
            ['name' => 'The Tuscan Harvest', 'cat' => 'Premium Tier', 'price' => 310, 'd' => 'Whole Wheat Thin Crust', 's' => 'Creamy Roasted Garlic Alfredo', 'c' => 'Creamy Feta Crumbles', 'tops' => ['Sliced Black Olives', 'Juicy Cherry Tomatoes', 'Roasted Garlic Flakes']],
            ['name' => 'Mushroom & Truffle Essence', 'cat' => 'Premium Tier', 'price' => 290, 'd' => 'Artisanal Sourdough', 's' => 'Creamy Roasted Garlic Alfredo', 'c' => 'Smoked Gouda Shreds', 'tops' => ['Golden Button Mushrooms', 'Roasted Garlic Flakes']],
            ['name' => 'Pesto Paneer Elegance', 'cat' => 'Premium Tier', 'price' => 330, 'd' => 'Artisanal Sourdough', 's' => 'Basil Pesto infusion', 'c' => 'Premium Mozzarella Pearls', 'tops' => ['Paneer Cubes', 'Juicy Cherry Tomatoes', 'Spanish Red Onions']],
            ['name' => 'Four-Cheese Gourmet Melt', 'cat' => 'Premium Tier', 'price' => 460, 'd' => 'Gourmet Cheese Burst', 's' => 'Creamy Roasted Garlic Alfredo', 'c' => 'Premium Mozzarella Pearls', 'tops' => []],
            ['name' => 'The Mediterranean Orchard', 'cat' => 'Premium Tier', 'price' => 360, 'd' => 'Whole Wheat Thin Crust', 's' => 'Basil Pesto infusion', 'c' => 'Creamy Feta Crumbles', 'tops' => ['Sliced Black Olives', 'Juicy Cherry Tomatoes', 'Crunchy Green Capsicum', 'Golden Button Mushrooms']],
        ];

        foreach ($menu as $item) {
            $pizzaId = DB::table('inhouse_pizzas')->insertGetId([
                'name' => $item['name'], 'category' => $item['cat'], 'baseline_price_inr' => $item['price'],
                'dough_id' => $d[$item['d']], 'sauce_id' => $s[$item['s']], 'cheese_id' => $c[$item['c']],
                'created_at' => now(), 'updated_at' => now()
            ]);
            foreach ($item['tops'] as $toppingName) {
                DB::table('inhouse_pizza_topping')->insert([
                    'inhouse_pizza_id' => $pizzaId, 'topping_id' => $t[$toppingName], 'created_at' => now(), 'updated_at' => now()
                ]);
            }
        }
    }
}
