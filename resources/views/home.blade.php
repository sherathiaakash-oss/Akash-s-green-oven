@extends('layouts.app')

@section('content')
    <!-- High-Impact Hero Dashboard Banner -->
    <div class="relative bg-sky-900 overflow-hidden py-16 md:py-24 px-4 sm:px-6 text-center border-b border-slate-950">
        <div
            class="absolute inset-0 opacity-15 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-size-[4rem_4rem]">
        </div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none">
        </div>

        <!-- UPDATED: Added a solid translucent backdrop container wrapper card to protect the text field lines -->
        <div
            class="relative max-w-2xl mx-auto text-center bg-sky-950/60 backdrop-blur-md rounded-3xl p-6 sm:p-10 border border-sky-800/30 shadow-xl max-w-2xl">
            <span
                class="bg-blue-500/10 text-blue-400 text-xs font-black uppercase tracking-widest px-4 py-2 rounded-full border border-blue-500/20 inline-flex items-center gap-2 mb-6 select-none">
                <span class="w-1.5 h-1.5 bg-blue-400 rounded-full animate-pulse"></span>
                Traditional Neapolitan Stone Hearth
            </span>
            <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tighter leading-none mb-4 uppercase">
                Smokey Crust.<br><span class="text-red-500 drop-shadow-[0_4px_12px_rgba(239,68,68,0.2)]">Pure Greens.</span>
            </h1>
            <p class="text-slate-200 text-xs md:text-sm max-w-md mx-auto font-medium leading-relaxed px-2">
                Experience the intense flavor of wood-fired sourdough pizzas baked at 450°C. 100% vegetarian, loaded with
                fresh artisanal toppings in Rajkot.
            </p>
        </div>
    </div>

    <!-- Main Core Menu Deck Section Boundary Wrapper -->
    <div id="pizzeria-menu-deck" class="bg-white min-h-screen relative z-10">

        <!-- STICKY SUB-NAVIGATION DECK WITH AUTO-CENTERING & HIDDEN SCROLLBARS -->
        <div
            class="sticky top-[90px] z-50 bg-white border-b border-slate-200 shadow-md overflow-x-auto select-none [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4 h-16 bg-white">

                <!-- Horizontal Interactive Navigation Button Cluster -->
                <div id="tabMenuBarContainer"
                    class="flex items-center space-x-2 font-black text-xs uppercase tracking-wider overflow-x-auto py-2 scroll-smooth [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">
                    <button onclick="switchActiveMenuTab(this, 'cat-classics')"
                        class="menu-tab-nav-btn active-tab bg-slate-900 text-white px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-800 shadow-sm">Classic</button>
                    <button onclick="switchActiveMenuTab(this, 'cat-bold')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Bold
                        Flavors</button>
                    <button onclick="switchActiveMenuTab(this, 'cat-premium')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Premium
                        Range</button>
                    <button onclick="switchActiveMenuTab(this, 'sec-custom-builder')" class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm font-black text-xs uppercase tracking-wider">Create Your Own</button>
                    <button onclick="switchActiveMenuTab(this, 'sec-sides')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Sides</button>
                    <button onclick="switchActiveMenuTab(this, 'sec-drinks')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Cold
                        Drinks</button>
                    <button onclick="switchActiveMenuTab(this, 'sec-desserts')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Desserts</button>
                    <button onclick="switchActiveMenuTab(this, 'deal-combo')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Combo
                        Meals</button>
                    <button onclick="switchActiveMenuTab(this, 'deal-daily')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Daily
                        Deals</button>
                    <button onclick="switchActiveMenuTab(this, 'deal-weekly')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Weekly
                        Deals</button>
                    <button onclick="switchActiveMenuTab(this, 'deal-monthly')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Monthly
                        Deals</button>
                    <button onclick="switchActiveMenuTab(this, 'deal-seasonal')"
                        class="menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm">Seasonal
                        Deals</button>
                </div>

                <!-- Rajkot City Green Location Badge -->
                <span
                    class="hidden lg:inline-flex text-[10px] font-black text-red-600 bg-red-50 border border-red-100 px-3 py-1.5 rounded-xl uppercase tracking-wider whitespace-nowrap shrink-0 select-none animate-pulse">
                    🌱 100% Green Kitchen • Rajkot
                </span>
            </div>
        </div>

        <!-- Active Single-Tab View Workspace Grid Shell -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <!-- 1. CLASSICS MENU TAB PANEL -->
            <div id="cat-classics" class="menu-view-display-panel space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Freshly assembled and baked in our
                    stone-hearth oven upon order submission.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($pizzas->get('Classics', []) as $pizza)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span
                                    class="text-4xl transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">🍕</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3
                                    class="text-lg font-black text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors duration-200">
                                    {{ $pizza->name }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">Prepared on a premium
                                    {{ strtolower($pizza->dough->name) }} canvas, spread with artisanal
                                    {{ strtolower($pizza->sauce->name) }}, and loaded with fresh toppings.</p>
                                <div class="flex items-center justify-between pt-4 border-t border-slate-100 mt-auto">
                                    <div class="flex flex-col"><span
                                            class="text-[9px] font-black text-slate-400 uppercase tracking-wider">Regular
                                            10"</span><span
                                            class="text-2xl font-black text-slate-900">₹{{ $pizza->baseline_price_inr }}</span>
                                    </div>
                                    <button
                                        onclick="public_function_openCustomizer('{{ $pizza->name }}', '{{ $pizza->baseline_price_inr }}', '{{ $pizza->dough->name }}', '{{ $pizza->sauce->name }}', '{{ $pizza->cheese->name }}')"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl transition-all duration-200 shadow-md shadow-blue-600/10 cursor-pointer transform active:scale-95">Choose
                                        Size</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 2. BOLD FLAVORS MENU TAB PANEL -->
            <div id="cat-bold" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Intense spices, fiery peri-peri drops, and
                    rich charcoal fusions.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($pizzas->get('Bold Flavors', []) as $pizza)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span
                                    class="text-4xl transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">🍕</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3
                                    class="text-lg font-black text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors duration-200">
                                    {{ $pizza->name }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">Prepared on a premium
                                    {{ strtolower($pizza->dough->name) }} canvas, spread with artisanal
                                    {{ strtolower($pizza->sauce->name) }}, and loaded with fresh toppings.</p>
                                <div class="flex items-center justify-between pt-4 border-t border-slate-100 mt-auto">
                                    <div class="flex flex-col"><span
                                            class="text-[9px] font-black text-slate-400 uppercase tracking-wider">Regular
                                            10"</span><span
                                            class="text-2xl font-black text-slate-900">₹{{ $pizza->baseline_price_inr }}</span>
                                    </div>
                                    <button
                                        onclick="public_function_openCustomizer('{{ $pizza->name }}', '{{ $pizza->baseline_price_inr }}', '{{ $pizza->dough->name }}', '{{ $pizza->sauce->name }}', '{{ $pizza->cheese->name }}')"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl transition-all duration-200 shadow-md shadow-blue-600/10 cursor-pointer transform active:scale-95">Choose
                                        Size</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- 3. PREMIUM RANGE MENU TAB PANEL -->
            <div id="cat-premium" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Artisanal pesto drizzles, gourmet feta
                    crumbles, and exotic wild mushrooms.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($pizzas->get('Premium Tier', []) as $pizza)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span
                                    class="text-4xl transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">🍕</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3
                                    class="text-lg font-black text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors duration-200">
                                    {{ $pizza->name }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">Prepared on a premium
                                    {{ strtolower($pizza->dough->name) }} canvas with fresh
                                    {{ strtolower($pizza->sauce->name) }} and loads of premium toppings.</p>
                                <div class="flex items-center justify-between pt-4 border-t border-slate-100 mt-auto">
                                    <div class="flex flex-col"><span
                                            class="text-[9px] font-black text-slate-400 uppercase tracking-wider">Regular
                                            10"</span><span
                                            class="text-2xl font-black text-slate-900">₹{{ $pizza->baseline_price_inr }}</span>
                                    </div>
                                    <button
                                        onclick="public_function_openCustomizer('{{ $pizza->name }}', '{{ $pizza->baseline_price_inr }}', '{{ $pizza->dough->name }}', '{{ $pizza->sauce->name }}', '{{ $pizza->cheese->name }}')"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl transition-all duration-200 shadow-md shadow-blue-600/10 cursor-pointer transform active:scale-95">Choose
                                        Size</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- ========================================================================= -->
<!-- NEW: CREATE YOUR OWN PIZZA MENU SELECTION LISTING CARD VIEW PANEL         -->
<!-- ========================================================================= -->
<div id="sec-custom-builder" class="menu-view-display-panel hidden space-y-4">
    <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Unleash your inner chef. Choose your crust, mix artisanal sauces, and precisely map your favorite premium toppings.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- The Master Custom Builder Trigger Card Listing -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:-translate-y-1 transition-all duration-300 bg-gradient-to-b from-white to-red-50/10">
            <div class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                <span class="text-5xl transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">👨‍🍳</span>
                <div class="absolute inset-0 bg-red-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <div class="p-6 flex flex-col grow">
                <h3 class="text-lg font-black text-slate-900 mb-1 tracking-tight group-hover:text-red-600 transition-colors duration-200 uppercase">The Master Chef Canvas</h3>
                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">100% customized wood-fired creation. Control the dough base, layer multi-sauce blends, tweak cooking levels, and partition toppings on different sides.</p>
                <div class="flex items-center justify-between pt-4 border-t border-slate-100 mt-auto">
                    <div class="flex flex-col">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-wider">Starting From</span>
                        <span class="text-2xl font-black text-slate-900">₹110</span>
                    </div>
                    <button onclick="public_function_openCustomPizzaBuilderModal()" class="bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl transition-all duration-200 shadow-md shadow-red-600/10 cursor-pointer transform active:scale-95">
                        Design Pizza ⚙️
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

            <!-- 4. SIDES MENU TAB PANEL -->
            <div id="sec-sides" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Crispy baked appetizers and golden garlic
                    bread crusts to complete your slice.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($sides as $side)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span
                                    class="text-4xl transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">🥖</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="text-lg font-black text-slate-900 mb-1 tracking-tight">{{ $side->name }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6">Freshly baked hot savory appetizers
                                    constructed on site daily.</p>
                                <<div id="counter-wrapper-Sides-{{ Str::slug($side->name) }}" class="flex items-center justify-end w-full">
    <button onclick="public_function_addDirectItemToBasket('{{ $side->name }}', '{{ $side->base_price_inr }}', 'Sides')" 
            class="bg-red-600 hover:bg-red-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl shadow-md transition-all cursor-pointer transform active:scale-95">
            Add To Basket 🛒
    </button>
</div>


                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- 5. COLD DRINKS MENU TAB PANEL -->
            <div id="sec-drinks" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Ice-cold refreshments, fizzy sodas, and
                    cooling local mint mojitos.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($drinks as $drink)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span
                                    class="text-4xl transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">🥤</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="text-lg font-black text-slate-900 mb-1 tracking-tight">{{ $drink->name }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6">Chilled carbonated beverages and custom
                                    refreshing local fruit blenders.</p>
                                <div id="counter-wrapper-ColdDrinks-{{ Str::slug($drink->name) }}" class="flex items-center justify-end w-full">
    <button onclick="public_function_addDirectItemToBasket('{{ $drink->name }}', '{{ $drink->base_price_inr }}', 'Cold Drinks')" 
            class="bg-red-600 hover:bg-red-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl shadow-md transition-all cursor-pointer transform active:scale-95">
            Add To Basket 🛒
    </button>
</div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 6. DESSERTS MENU TAB PANEL -->
            <div id="sec-desserts" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Warm molten chocolate centers and rich
                    premium ice cream scoops.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($desserts as $dessert)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span
                                    class="text-4xl transform group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300">🍨</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="text-lg font-black text-slate-900 mb-1 tracking-tight">{{ $dessert->name }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6">Artisanal rich confectionery puddings and
                                    gourmet dessert options.</p>
                                <div id="counter-wrapper-Desserts-{{ Str::slug($dessert->name) }}" class="flex items-center justify-end w-full">
    <button onclick="public_function_addDirectItemToBasket('{{ $dessert->name }}', '{{ $dessert->base_price_inr }}', 'Desserts')" 
            class="bg-red-600 hover:bg-red-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl shadow-md transition-all cursor-pointer transform active:scale-95">
            Add To Basket 🛒
    </button>
</div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- 7. COMBO MEALS DISPLAY TAB PANEL -->
            <div id="deal-combo" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Curated box sets combining pizzas, sides,
                    and sips for maximum savings.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($deals->get('Combo Meals', []) as $deal)
                        <div
                            class="bg-amber-50/40 rounded-3xl border-2 border-amber-200 overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-300 relative">
                            @if($deal->is_members_only)<span
                                class="absolute top-4 right-4 bg-slate-900 text-amber-400 text-[9px] font-black uppercase px-2 py-1 rounded-md z-10">🔒
                            Club Only</span>@endif
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span class="text-4xl transform group-hover:scale-110 transition-transform">⭐</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="font-black text-slate-900 text-lg mb-1 tracking-tight">{{ $deal->title }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">{{ $deal->description }}</p>
                                <div id="counter-wrapper-ComboBundle-{{ Str::slug($deal->title) }}" class="flex items-center justify-between w-full pt-4 border-t border-amber-200 mt-auto">
    <span class="text-3xl font-black text-slate-900">₹{{ $deal->combo_price }}</span>
    <button onclick="evaluateComboMealClaim({{ $deal->is_members_only ? 'true' : 'false' }}, '{{ $deal->title }}', '{{ $deal->combo_price }}')" 
            class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-black text-xs px-5 py-3 rounded-xl shadow-md uppercase transition-all tracking-wider transform active:scale-95 cursor-pointer">
            Claim Bundle
    </button>
</div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- 8. DAILY DEALS DISPLAY TAB PANEL -->
            <div id="deal-daily" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Flash discount values and hot hours to
                    satisfy immediate hunger spikes.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($deals->get('Daily', []) as $deal)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-300 relative">
                            @if($deal->is_members_only)<span
                                class="absolute top-4 right-4 bg-slate-900 text-amber-400 text-[9px] font-black uppercase px-2 py-1 rounded-md z-10">🔒
                            Club Only</span>@endif
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span class="text-4xl transform group-hover:scale-110 transition-transform">🎁</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="font-black text-slate-900 text-lg mb-1 tracking-tight">{{ $deal->title }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">{{ $deal->description }}</p>
                                <!--  CORRECT BUTTON ROW: -->
<button onclick="evaluatePromoCouponClaim({{ $deal->is_members_only ? 'true' : 'false' }}, '{{ $deal->title }}', '{{ $deal->discount_type }}', '{{ $deal->discount_value }}')" 
        class="w-full bg-red-600 hover:bg-red-700 text-white font-black text-xs py-3.5 rounded-xl uppercase shadow-md transition-all transform active:scale-95 cursor-pointer mt-auto">
        Apply Coupon
</button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 9. WEEKLY DEALS DISPLAY TAB PANEL -->
            <div id="deal-weekly" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Midweek madness solutions and weekend family
                    gathering bundles.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($deals->get('Weekly', []) as $deal)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-300 relative">
                            @if($deal->is_members_only)<span
                                class="absolute top-4 right-4 bg-slate-900 text-amber-400 text-[9px] font-black uppercase px-2 py-1 rounded-md z-10">🔒
                            Club Only</span>@endif
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span class="text-4xl transform group-hover:scale-110 transition-transform">🎁</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="font-black text-slate-900 text-lg mb-1 tracking-tight">{{ $deal->title }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">{{ $deal->description }}</p>
                                <!--  CORRECT BUTTON ROW: -->
<button onclick="evaluatePromoCouponClaim({{ $deal->is_members_only ? 'true' : 'false' }}, '{{ $deal->title }}', '{{ $deal->discount_type }}', '{{ $deal->discount_value }}')" 
        class="w-full bg-red-600 hover:bg-red-700 text-white font-black text-xs py-3.5 rounded-xl uppercase shadow-md transition-all transform active:scale-95 cursor-pointer mt-auto">
        Apply Coupon
</button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 10. MONTHLY DEALS DISPLAY TAB PANEL -->
            <div id="deal-monthly" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Payday mega-savers and massive corporate
                    event showstopper values.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($deals->get('Monthly', []) as $deal)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-300 relative">
                            @if($deal->is_members_only)<span
                                class="absolute top-4 right-4 bg-slate-900 text-amber-400 text-[9px] font-black uppercase px-2 py-1 rounded-md z-10">🔒
                            Club Only</span>@endif
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span class="text-4xl transform group-hover:scale-110 transition-transform">🎁</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="font-black text-slate-900 text-lg mb-1 tracking-tight">{{ $deal->title }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">{{ $deal->description }}</p>
                                <!--  CORRECT BUTTON ROW: -->
<button onclick="evaluatePromoCouponClaim({{ $deal->is_members_only ? 'true' : 'false' }}, '{{ $deal->title }}', '{{ $deal->discount_type }}', '{{ $deal->discount_value }}')" 
        class="w-full bg-red-600 hover:bg-red-700 text-white font-black text-xs py-3.5 rounded-xl uppercase shadow-md transition-all transform active:scale-95 cursor-pointer mt-auto">
        Apply Coupon
</button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- 11. SEASONAL DEALS DISPLAY TAB PANEL -->
            <div id="deal-seasonal" class="menu-view-display-panel hidden space-y-4">
                <p class="text-slate-500 text-sm font-bold tracking-tight mb-8">Limited-time festival celebrations and rich
                    weather-inspired special culinary boxes.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($deals->get('Seasonal', []) as $deal)
                        <div
                            class="bg-white rounded-3xl border border-slate-200 overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-300 relative">
                            @if($deal->is_members_only)<span
                                class="absolute top-4 right-4 bg-slate-900 text-amber-400 text-[9px] font-black uppercase px-2 py-1 rounded-md z-10">🔒
                            Club Only</span>@endif
                            <div
                                class="bg-slate-950 h-44 flex items-center justify-center relative overflow-hidden shrink-0 select-none">
                                <span class="text-4xl transform group-hover:scale-110 transition-transform">🍁</span>
                            </div>
                            <div class="p-6 flex flex-col grow">
                                <h3 class="font-black text-slate-900 text-lg mb-1 tracking-tight">{{ $deal->title }}</h3>
                                <p class="text-slate-500 text-xs leading-relaxed mb-6 grow">{{ $deal->description }}</p>
                                <!--  CORRECT BUTTON ROW: -->
<button onclick="evaluatePromoCouponClaim({{ $deal->is_members_only ? 'true' : 'false' }}, '{{ $deal->title }}', '{{ $deal->discount_type }}', '{{ $deal->discount_value }}')" 
        class="w-full bg-red-600 hover:bg-red-700 text-white font-black text-xs py-3.5 rounded-xl uppercase shadow-md transition-all transform active:scale-95 cursor-pointer mt-auto">
        Apply Coupon
</button>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!-- ========================================================================= -->
    <!-- SLIDING DRAWER ACCENT PIZZA CUSTOMIZER PANEL MODULE (MIDDLE POPUP STYLE)  -->
    <!-- ========================================================================= -->
    <div id="customizerDrawer" onclick="closeCustomizer()"
        class="hidden fixed inset-0 z-50 bg-slate-950/60 backdrop-blur-sm transition-all duration-300 flex items-center justify-center p-4">
        <div onclick="event.stopPropagation()"
            class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden relative transform transition-transform duration-300 scale-95"
            id="drawerContentCard">

            <div class="p-6 bg-slate-900 text-white text-center border-b-4 border-red-600 select-none">
                <h3 id="customizerPizzaName" class="text-xl font-black uppercase tracking-tight">Configure Pizza</h3>
                <p id="customizerPizzaMeta" class="text-slate-400 text-[10px] uppercase font-bold tracking-wider mt-0.5">
                    Custom Stone-Hearth Prep</p>
            </div>

            <div class="p-6 max-h-[60vh] overflow-y-auto space-y-6 select-none">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">1. Select
                        Pizza Dimension Size</label>
                    <div class="grid grid-cols-2 gap-3" id="sizeSelectorRadioGroup">
                        @foreach($sizes as $size)
                            <button type="button"
                                onclick="selectPizzaSize(this, {{ $size->price_multiplier }}, '{{ $size->name }}')"
                                data-size-name="{{ $size->name }}"
                                class="size-option-btn border-2 border-slate-200 rounded-xl p-3 flex flex-col items-center justify-center font-bold text-slate-800 transition-all text-center cursor-pointer transform hover:scale-102 hover:border-slate-400 active:scale-98">
                                <span class="text-sm font-black">{{ $size->name }}</span>
                                <span
                                    class="text-[9px] text-slate-400 tracking-wider font-semibold uppercase mt-0.5">{{ $size->price_multiplier }}x
                                    Scale</span>
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 space-y-3">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">2. Standard Included
                        Recipe Maps</span>
                    <div class="text-xs space-y-2 font-semibold text-slate-600">
                        <div class="flex items-center gap-2"><span>🥖</span> <span>Crust Canvas: <span id="lblDoughInfo"
                                    class="text-slate-900 font-bold"></span></span></div>
                        <div class="flex items-center gap-2"><span>🥫</span> <span>Spread Base: <span id="lblSauceInfo"
                                    class="text-slate-900 font-bold"></span></span></div>
                        <div class="flex items-center gap-2"><span>🧀</span> <span>Melting Core: <span id="lblCheeseInfo"
                                    class="text-slate-900 font-bold"></span></span></div>
                    </div>
                </div>
            </div>

            <div
                class="p-6 border-t border-slate-100 bg-slate-50 flex items-center justify-between gap-4 mt-auto select-none">
                <div class="flex flex-col"><span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Total
                        Configured Price</span><span class="text-3xl font-black text-slate-900"
                        id="customizerCalculatedTotalPrice">₹0</span></div>
                <button onclick="addConfiguredPizzaToBasket()"
                    class="bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-wider text-xs px-6 py-4 rounded-xl shadow-lg shadow-red-600/20 transform hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer">Add
                    To Basket 🛒</button>
            </div>
        </div>
    </div>
    <script>
        const tabContainer = document.getElementById('tabMenuBarContainer');
        const customizerDrawer = document.getElementById('customizerDrawer');
        const customizerCard = document.getElementById('drawerContentCard');
        const pzName = document.getElementById('customizerPizzaName');
        const pzPriceTag = document.getElementById('customizerCalculatedTotalPrice');
        const lblDough = document.getElementById('lblDoughInfo');
        const lblSauce = document.getElementById('lblSauceInfo');
        const lblCheese = document.getElementById('lblCheeseInfo');

        let activePizzaBaselinePrice = 0;
        let selectedMultiplierValue = 1.0;
        let selectedSizeNameString = 'Regular-10"';

        function switchActiveMenuTab(clickedButton, targetSectionId) {
            document.querySelectorAll('.menu-tab-nav-btn').forEach(btn => {
                btn.className = "menu-tab-nav-btn bg-slate-100 text-slate-700 hover:text-slate-900 px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-200 shadow-sm";
            });
            clickedButton.className = "menu-tab-nav-btn active-tab bg-slate-900 text-white px-5 py-3 rounded-xl transition-all duration-300 transform active:scale-95 whitespace-nowrap cursor-pointer hover:bg-slate-800 shadow-sm";
            document.querySelectorAll('.menu-view-display-panel').forEach(panel => { panel.classList.add('hidden'); });
            document.getElementById(targetSectionId).classList.remove('hidden');
            clickedButton.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }

        public_function_openCustomizer = function (name, baselinePrice, dough, sauce, cheese) {
            activePizzaBaselinePrice = parseInt(baselinePrice);
            pzName.innerText = name; lblDough.innerText = dough; lblSauce.innerText = sauce; lblCheese.innerText = cheese;
            selectedMultiplierValue = 1.0; selectedSizeNameString = 'Regular-10"';

            document.querySelectorAll('.size-option-btn').forEach(btn => {
                if (btn.getAttribute('data-size-name') === 'Regular-10"') {
                    btn.className = "size-option-btn border-2 border-slate-900 bg-slate-950 text-white rounded-xl p-3 flex flex-col items-center justify-center font-bold transition-all text-center cursor-pointer";
                } else {
                    btn.className = "size-option-btn border-2 border-slate-200 rounded-xl p-3 flex flex-col items-center justify-center font-bold text-slate-800 transition-all text-center cursor-pointer transform hover:scale-102 hover:border-slate-400 active:scale-98";
                }
            });

            customizerDrawer.classList.remove('hidden');
            customizerDrawer.classList.add('flex');
            setTimeout(() => { customizerCard.className = "w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden relative transform transition-transform duration-300 scale-100"; }, 50);
            calculateLiveDynamicCartPrice();
        }

        function closeCustomizer() {
            customizerCard.className = "w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden relative transform transition-transform duration-300 scale-95";
            setTimeout(() => { customizerDrawer.classList.add('hidden'); customizerDrawer.classList.remove('flex'); }, 200);
        }

        function selectPizzaSize(selectedButtonElement, multiplierValue, sizeName) {
            selectedMultiplierValue = parseFloat(multiplierValue); selectedSizeNameString = sizeName;
            document.querySelectorAll('.size-option-btn').forEach(btn => {
                btn.className = "size-option-btn border-2 border-slate-200 rounded-xl p-3 flex flex-col items-center justify-center font-bold text-slate-800 transition-all text-center cursor-pointer transform hover:scale-102 hover:border-slate-400 active:scale-98";
            });
            selectedButtonElement.className = "size-option-btn border-2 border-slate-900 bg-slate-950 text-white rounded-xl p-3 flex flex-col items-center justify-center font-bold transition-all text-center cursor-pointer";
            calculateLiveDynamicCartPrice();
        }

        function calculateLiveDynamicCartPrice() {
            const finalCalculatedRupeeCost = Math.round(activePizzaBaselinePrice * selectedMultiplierValue);
            pzPriceTag.innerText = "₹" + finalCalculatedRupeeCost;
        }

        function addConfiguredPizzaToBasket() {
            // alert("Success! Added " + selectedSizeNameString + " " + pzName.innerText + " into your order selection basket.");
            closeCustomizer();
        }
    </script>
@endsection