<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akash's Green Oven - 100% Veg Wood-Fired Pizzeria</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-950 antialiased font-sans selection:bg-red-600 selection:text-white">

    <div
        class="bg-red-600 text-white text-xs font-bold py-2 px-4 text-center tracking-wider uppercase relative overflow-hidden shadow-sm">
        <div class="inline-flex items-center space-x-2">
            <span class="relative flex h-2 w-2">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
            </span>
            <span>🔥 Wood-Fired Oven Temp: 450°C • Accepting Live Delivery Orders in Rajkot 🔥</span>
        </div>
    </div>

    <nav
        class="bg-slate-900/95 backdrop-blur-md text-white shadow-xl sticky top-0 z-50 border-b-4 border-red-600 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between py-4 md:py-0 md:h-22 gap-4">

                <a href="/" class="flex items-center space-x-3 text-center md:text-left group select-none">
                    <div
                        class="bg-red-600 p-2.5 rounded-xl shadow-md transform rotate-3 group-hover:rotate-6 group-hover:scale-105 transition-all duration-300 shrink-0">
                        <span class="text-white font-black text-xl tracking-tighter">AGO</span>
                    </div>
                    <div class="flex flex-col">
                        <span
                            class="text-xl md:text-2xl font-black tracking-tight text-white group-hover:text-red-500 transition-colors duration-300 whitespace-nowrap">
                            Akash's <span
                                class="text-red-500 group-hover:text-white transition-colors duration-300">Green
                                Oven</span>
                        </span>
                        <span
                            class="text-[10px] md:text-xs font-bold text-slate-400 tracking-wider uppercase flex items-center gap-1 justify-center md:justify-start">
                            <span class="text-emerald-500">🌱</span> 100% Veg • Wood-fired
                        </span>
                    </div>
                </a>

                <div
                    class="flex flex-wrap items-center justify-center gap-4 md:gap-6 font-black text-xs md:text-sm tracking-wide uppercase w-full md:w-auto">
                    <a href="/#pizzeria-menu-deck"
                        class="text-slate-200 hover:text-red-500 transition-colors duration-200 py-1 border-b-2 border-transparent hover:border-red-500">Menu</a>

                    @if(Auth::check())
                        <div class="flex items-center gap-4 relative">
                            @if(Auth::user()->is_admin)
                                <a href="/kitchen-hub"
                                    class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-slate-950 px-3.5 py-1.5 rounded-xl font-black transition-all flex items-center gap-1.5 shadow-md shadow-orange-500/10 cursor-pointer text-xs md:text-sm tracking-wide uppercase select-none">
                                    👨‍🍳 Kitchen Hub
                                </a>
                            @endif
                            <button onclick="toggleProfileDropdownMenu(event)"
                                class="font-black cursor-pointer flex items-center gap-1.5 transition-colors text-xs md:text-sm tracking-wide uppercase select-none">
                                @if(Auth::user()->is_guest)
                                    {{-- REPLACE WITH THIS CORRECT FORMAT: --}}
                                    <span
                                        class="text-slate-300 hover:text-slate-200 flex items-center gap-1.5 select-none font-black tracking-wider text-xs md:text-sm uppercase">
                                        <span class="bg-slate-800 p-1.5 rounded-lg border border-slate-700 text-xs">📦</span>
                                        <span>Guest: {{ strtoupper(Auth::user()->user_id) }}</span>
                                    </span>

                                @else
                                    <span class="text-amber-400 flex items-center gap-1.5 hover:text-amber-300">
                                        <span
                                            class="bg-amber-400/10 p-1.5 rounded-lg border border-amber-400/20 text-xs">⭐</span>
                                        <span>{{ Auth::user()->first_name }}</span>
                                    </span>
                                @endif
                                <span class="text-[10px] text-slate-400 transition-transform duration-200"
                                    id="profileDropdownArrow">▼</span>
                            </button>
                            <div id="profileDropdownCard"
                                class="hidden absolute right-0 top-14 w-48 bg-white border border-slate-200 rounded-2xl shadow-xl overflow-hidden z-50 animate-scale-up py-2">
                                <div class="px-4 py-2 border-b border-slate-100 select-none">
                                    <span
                                        class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Signed
                                        In As</span>
                                    <span class="block text-xs font-bold text-slate-800 truncate mt-0.5"><a
                                            href="/member/dashboard"
                                            class="font-black text-slate-900 hover:text-red-600 transition-colors duration-200 block truncate tracking-tight">
                                            @<span>{{ Auth::user()->user_id }}</span> <span
                                                class="text-[9px] text-blue-500 font-bold tracking-widest bg-blue-50 px-1.5 py-0.5 rounded-md border border-blue-100 uppercase ml-1">Open
                                                Profile ➔</span>
                                        </a></span>
                                </div>
                                <form id="memberLogoutForm" action="/logout" method="POST" class="block w-full">
                                    @csrf
                                    <button type="button" onclick="document.getElementById('memberLogoutForm').submit()"
                                        class="w-full text-left px-4 py-3 text-xs font-black text-red-600 hover:bg-red-50 transition-colors uppercase tracking-wider flex items-center gap-2 cursor-pointer select-none">
                                        {{ Auth::user()->is_guest ? '✕ Clear Session' : '🚪 Log Out Club' }}
                                    </button>
                                </form>

                            </div>
                        </div>
                    @else
                        <button onclick="openAuthModal()"
                            class="text-amber-400 hover:text-white transition-colors duration-200 py-1 border-b-2 border-transparent hover:border-amber-400 font-black cursor-pointer flex items-center gap-1 text-xs md:text-sm tracking-wide uppercase select-none">
                            👤 Login / Join
                        </button>
                    @endif
                    <button onclick="toggleBasketDrawer(true)"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl flex items-center space-x-3 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 shadow-lg shadow-blue-600/30 group shrink-0 cursor-pointer select-none">
                        <span class="transform group-hover:scale-110 transition-transform">🛒</span>
                        <span class="font-bold tracking-wider">Basket</span>
                        <span id="globalBasketCounterBadge"
                            class="bg-slate-950 text-white text-xs px-2 py-0.5 rounded-lg font-black transition-all group-hover:bg-red-600">0</span>
                    </button>
                    <div id="basketSideDrawer" onclick="toggleBasketDrawer(false)"
                        class="hidden fixed inset-0 w-screen h-screen z-50 bg-slate-950/60 backdrop-blur-sm transition-opacity duration-300 flex justify-end select-none opacity-0">
                        <div onclick="event.stopPropagation()"
                            class="w-full max-w-md bg-white h-screen shadow-2xl border-l border-slate-100 flex flex-col transform translate-x-full transition-transform duration-300 ease-in-out"
                            id="basketContentCanvas">
                            <div
                                class="p-6 bg-slate-900 text-white flex items-center justify-between border-b-4 border-blue-600">
                                <div class="flex items-center gap-2">
                                    <span class="text-xl">🛒</span>
                                    <h3 class="text-lg font-black uppercase tracking-tight">Your Kitchen Basket</h3>
                                </div>
                                <button onclick="toggleBasketDrawer(false)"
                                    class="text-slate-400 hover:text-white font-black text-lg cursor-pointer transform active:scale-90">✕</button>
                            </div>
                            @if(Auth::check() && Auth::user()->is_guest)
                                <div
                                    class="bg-gradient-to-r from-amber-500/10 to-orange-500/10 border-b border-amber-200 p-4 flex items-start gap-2.5">
                                    <span class="text-lg mt-0.5 animate-bounce">✨</span>
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-black text-amber-800 uppercase tracking-wider">Unlock
                                            Premium Rewards</span>
                                        <p class="text-[11px] text-slate-600 font-semibold leading-relaxed mt-0.5">
                                            You are checking out as a temporary Guest. <a href="/register-membership"
                                                class="text-red-600 hover:text-red-700 underline font-black uppercase tracking-wide">Join
                                                the Club Here</a> to earn loyalty points and claim locked exclusive 🔒
                                            deals!
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <div id="basketItemsContainerRow"
                                class="p-6 overflow-y-auto space-y-4 grow flex flex-col justify-start">
                                <div class="text-center py-12 text-slate-400 font-bold text-xs space-y-2 my-auto">
                                    <span class="text-3xl block">🍕</span>
                                    <span>Your basket is currently empty.<br>Add something delicious from the
                                        menu!</span>
                                </div>
                            </div>
                            <div id="basketAppliedOffersLedger"
                                class="px-6 py-3 bg-slate-50 border-t border-slate-100 hidden flex flex-col gap-2">
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Active
                                    Discounts Applied</span>
                                <div id="basketOffersTargetList" class="space-y-1.5"></div>
                            </div>
                            <div class="p-6 border-t border-slate-100 bg-slate-50 space-y-4 mt-auto">
                                <div class="space-y-2 text-xs font-bold text-slate-600">
                                    <div class="flex items-center justify-between"><span>Basket Subtotal</span><span
                                            id="lblBasketSubtotal" class="text-slate-900">₹0</span></div>
                                    <div id="rowBasketPromoDeduction"
                                        class="flex items-center justify-between text-emerald-600 hidden"><span>Coupon
                                            Discount</span><span id="lblBasketDiscount">- [1]₹0</span></div>
                                    <div
                                        class="flex items-center justify-between pt-2 border-t border-slate-200 text-base text-slate-900 font-black">
                                        <span>Total Final Price</span><span id="lblBasketFinalTotal">₹0</span>
                                    </div>
                                </div>
                                <button onclick="executeBasketCheckoutOrder()"
                                    class="w-full bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-wider text-xs py-4 rounded-xl shadow-lg shadow-red-600/20 transform hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer text-center">
                                    Proceed To Secure Checkout ➔
                                </button>
                            </div>

                        </div>
                    </div>
                    <div id="clubWarningModal" onclick="closeClubWarningModal()"
                        class="hidden fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4">
                        <div onclick="event.stopPropagation()"
                            class="w-full max-w-sm bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden text-center p-6 space-y-4 transform transition-transform duration-300 scale-100">
                            <div
                                class="w-14 h-14 bg-amber-500/10 text-amber-500 border border-amber-500/20 rounded-2xl flex items-center justify-center text-2xl mx-auto shadow-md select-none">
                                🔒</div>
                            <div class="space-y-1">
                                <h3 class="text-lg font-black text-slate-900 uppercase tracking-tight">Pizzeria Club
                                    Locked</h3>
                                <p class="text-slate-500 text-xs font-semibold leading-relaxed px-2">
                                    This premium deal configuration is exclusively reserved for authenticated <span
                                        class="text-amber-500 font-bold">Green Oven Club Members</span> only.
                                </p>
                            </div>
                            <div class="pt-2 flex flex-col gap-2">
                                <a href="/register-membership"
                                    class="bg-slate-900 hover:bg-slate-800 text-amber-400 font-black text-xs py-3.5 rounded-xl uppercase tracking-wider shadow-md">✨
                                    Join Pizzeria Membership</a>
                                <button onclick="closeClubWarningModal()"
                                    class="text-slate-500 hover:text-slate-800 text-[10px] font-black uppercase tracking-widest pt-1 cursor-pointer">Dismiss
                                    Alert</button>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-12 border-t-4 border-slate-900 mt-20 font-medium">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center md:text-left border-b border-slate-900 pb-12 mb-8">
                <div class="space-y-3">
                    <span class="text-xl font-black text-white tracking-tight uppercase">Akash's <span
                            class="text-red-500">Green Oven</span></span>
                    <p class="text-xs text-slate-500 leading-relaxed max-w-sm mx-auto md:mx-0">Serving Rajkot's finest
                        authentic 100% vegetarian stone-hearth wood-fired pizzas, appetizers, and natural beverages
                        daily.</p>
                    <div id="status_member_login"
                        class="text-xs font-bold mt-3 p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl hidden">
                    </div>

                </div>
                <div class="space-y-2 text-xs">
                    <h4 class="text-white font-black uppercase tracking-wider text-[10px] text-slate-500 mb-3">Hotline
                        Support</h4>
                    <p class="flex items-center justify-center md:justify-start gap-2"><span
                            class="text-red-500">📞</span> +91 98765 43210</p>
                    <p class="flex items-center justify-center md:justify-start gap-2"><span
                            class="text-red-500">✉️</span> support@akashsgreenoven.com</p>
                </div>
                <div class="space-y-2 text-xs">
                    <h4 class="text-white font-black uppercase tracking-wider text-[10px] text-slate-500 mb-3">Stone
                        Hearth Oven Location</h4>
                    <p class="flex items-center justify-center md:justify-start gap-2"><span
                            class="text-emerald-500">📍</span> Race Course 8, Rajkot, Gujarat 360005</p>
                    <p class="text-[11px] text-slate-500 pl-5">Near newly developed Atal Sarovar [Mota Mava, Rajkot,
                        Gujarat, India](<queryLocation: //&lt;Mota Mava, Rajkot, Gujarat, India&gt;/&lt;Atal Sarovar
                            location details&gt;?type=LOCATION_TYPE_HOME>)</p>
                    <div class="pt-2 pl-5">
                        <a href="https://goo.gl" target="_blank"
                            class="inline-flex items-center gap-1.5 text-blue-400 hover:text-blue-300 font-bold uppercase text-[10px] tracking-wider transition-colors">
                            🗺️ Open in Google Maps ➔
                        </a>
                    </div>
                </div>

            </div>
            <div
                class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs tracking-wide text-slate-600">
                <p>&copy; {{ date('Y') }} Akash's Green Oven. Crafted for Rajkot.</p>
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-700">🌱 100% Vegetarian Hub</p>
            </div>
        </div>
    </footer>
    <div id="authModal" onclick="closeAuthModal()"
        class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-950/80 backdrop-blur-sm transition-all duration-300 flex items-center justify-center p-4 animate-fade-in">
        <div onclick="event.stopPropagation()"
            class="bg-white rounded-3xl shadow-2xl border border-slate-100 w-full max-w-md overflow-hidden relative transform transition-transform duration-300 scale-100 animate-scale-up">
            <div class="grid grid-cols-2 bg-slate-100 border-b border-slate-200 select-none">
                <button id="tabMember" onclick="switchAuthMode('member')"
                    class="py-4 font-black text-sm uppercase tracking-wider text-slate-900 bg-white border-b-4 border-red-600 text-center cursor-pointer transition-all">🔑
                    Member Login</button>
                <button id="tabGuest" onclick="switchAuthMode('guest')"
                    class="py-4 font-black text-sm uppercase tracking-wider text-slate-500 hover:text-slate-800 text-center cursor-pointer transition-all">🛒
                    Order As Guest</button>
            </div>
            <div class="p-8">
                <div class="mb-6">
                    <h3 id="modalTitle" class="text-2xl font-black text-slate-900 uppercase tracking-tight">Welcome Back
                    </h3>
                    <p id="modalDesc" class="text-slate-500 text-xs mt-1 font-medium leading-relaxed">Sign in with your
                        verified User ID to access saved delivery routes.</p>
                </div>
                <form id="memberLoginForm" action="/login-member" method="POST" class="space-y-5 block w-full">
                    @csrf
                    <div class="block w-full">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">User
                            ID</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-400 select-none text-sm z-10">🆔</span>
                            <input type="text" id="userIdInput" name="user_id" placeholder="Enter your User ID" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm block relative z-0">
                        </div>
                    </div>
                    <div class="block w-full">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Secure
                            Password</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-400 select-none text-sm z-10">🔒</span>
                            <input type="password" id="passwordInput" name="password" placeholder="••••••••" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm block relative z-0">
                        </div>
                    </div>
                    <div class="pt-2 block w-full">
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-wider text-sm py-4 rounded-xl shadow-lg shadow-red-600/20 transform hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer block">
                            Access Account Menu
                        </button>
                    </div>
                    <div id="membershipPromptPanel" class="mt-8 pt-6 border-t border-slate-100 text-center space-y-3">
                        <p class="text-xs font-medium text-slate-500">Not a club member yet? Join the club to earn
                            points!</p>
                        <a href="/register-membership"
                            class="w-full inline-block bg-slate-900 hover:bg-slate-800 text-amber-400 font-black uppercase tracking-wide text-xs py-3 rounded-xl shadow-md">✨
                            Create Pizzeria Membership Account</a>
                    </div>
                </form>
                <form id="guestLoginForm" action="/login/guest" method="POST" class="space-y-5 hidden w-full">
                    @csrf
                    <div class="block w-full">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Guest
                            User ID</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-400 select-none text-sm z-10">🆔</span>
                            <input type="text" id="guestIdInput" name="user_id"
                                placeholder="Choose a temporary Guest User ID" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm block relative z-0">
                        </div>
                        <div id="status_guest_id" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    </div>
                    <div class="block w-full">
                        <label
                            class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Delivery
                            Address <span class="text-red-500">*</span></label>
                        <div class="relative flex items-start">
                            <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm z-10">📍</span>
                            <textarea id="guestAddressInput" name="address" rows="2" required
                                placeholder="Provide your active delivery address in Rajkot..."
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-xs block relative z-0 resize-none leading-relaxed"></textarea>
                            <div id="status_guest_address" class="text-[10px] font-bold mt-1.5 hidden"></div>
                        </div>
                    </div>
                    <div class="pt-2 block w-full">
                        <button type="submit" id="guestSubmitBtn"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-wider text-sm py-4 rounded-xl shadow-lg shadow-red-600/20 transform hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer block">
                            Login As Guest 📦
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div id="customPizzaBuilderModal" onclick="closeCustomPizzaBuilderModal()"
        class="hidden fixed inset-0 z-50 bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4 select-none">
        <div onclick="event.stopPropagation()"
            class="w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-100 h-[85vh] flex flex-col overflow-hidden transform scale-95 transition-transform duration-300"
            id="customBuilderCardCanvas">
            <div
                class="p-6 bg-slate-900 text-white flex items-center justify-between border-b-4 border-orange-600 shrink-0">
                <div class="flex flex-col">
                    <h3 class="text-xl font-black uppercase tracking-tight">Stone-Hearth Custom Studio</h3>
                    <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider mt-0.5">Design Your Own
                        Signature 100% Vegetarian Pie</p>
                </div>
                <button onclick="closeCustomPizzaBuilderModal()"
                    class="text-slate-400 hover:text-white font-black text-lg cursor-pointer transform active:scale-90">✕</button>
            </div>
            <div class="p-6 overflow-y-auto space-y-8 grow bg-slate-50/50" id="customBuilderScrollBody">
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">1. Select Your
                        Sourdough Crust Canvas <span class="text-red-500">*</span></span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach([
                                'Classic Hand-Tossed' => 60,
                                'Thin & Crispy' => 60,
                                'Artisanal Sourdough' => 90,
                                'Gourmet Cheese Burst' => 120,
                                'Stuffed Garlic Crust' => 90,
                                'Gluten-Free Almond Crust' => 110,
                                'Whole Wheat Thin Crust' => 70,
                                'Ragi Millet Base' => 80
                            ] as $name => $price)
                            <label
                                class="border-2 border-slate-200 rounded-xl p-3 flex items-center justify-between cursor-pointer hover:border-slate-400 transition-all font-bold text-slate-800 active:scale-[0.99] select-none">
                                <div class="flex items-center gap-2.5">
                                    <input type="radio" name="custom_dough" value="{{ $name }}" data-price="{{ $price }}"
                                        class="accent-orange-600 w-4 h-4" {{ $loop->first ? 'checked' : '' }}>
                                    <span class="text-sm font-black tracking-tight">{{ $name }}</span>
                                </div>
                                <span
                                    class="text-xs font-black text-slate-500 bg-slate-100 px-2 py-1 rounded-md">₹{{ $price }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">2. Choose Pizza
                        Dimension Size <span class="text-red-500">*</span></span>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        @foreach([
                                'Pan-6"' => 0.50,
                                'Small-8"' => 0.75,
                                'Regular-10"' => 1.00,
                                'Medium-12"' => 1.30,
                                'Large-14"' => 1.60,
                                'X-Large-16"' => 2.00,
                                'Family-20"' => 3.00,
                                'Party-30"' => 6.50
                            ] as $name => $mult)
                            <label
                                class="border-2 border-slate-200 rounded-xl p-3 flex flex-col items-center text-center justify-center cursor-pointer hover:border-slate-400 transition-all font-bold text-slate-800 active:scale-[0.99] select-none">
                                <input type="radio" name="custom_size" value="{{ $name }}" data-multiplier="{{ $mult }}"
                                    class="accent-orange-600 w-4 h-4 mb-2" {{ $name === 'Regular-10"' ? 'checked' : '' }}>
                                <span class="text-xs font-black tracking-tight">{{ $name }}</span>
                                <span
                                    class="text-[9px] text-slate-400 uppercase tracking-wider font-bold mt-0.5">{{ $mult }}x
                                    Scale</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex flex-col">
                        <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">3. Select
                            Spread Bases (Multi-Mix Blenders Allowed)</span>
                        <span class="text-[10px] font-semibold text-slate-400 leading-normal mt-0.5">Checked items are
                            blended together. The highest base price option dictates the pricing layer.</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach([
                                'Classic Marinara' => 30,
                                'Spicy Peri-Peri' => 40,
                                'Smokey Hickory BBQ' => 40,
                                'Creamy Roasted Garlic Alfredo' => 50,
                                'Basil Pesto infusion' => 60,
                                'Tandoori Masala Spread' => 40,
                                'Schezwan Chili Twist' => 30,
                                'Tangy Tomato Makhani' => 40
                            ] as $name => $price)
                            <label
                                class="border-2 border-slate-200 rounded-xl p-3 flex items-center justify-between cursor-pointer hover:border-slate-400 transition-all font-bold text-slate-800 active:scale-[0.99] select-none">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" name="custom_sauces" value="{{ $name }}"
                                        data-price="{{ $price }}" class="accent-orange-600 rounded w-4 h-4" {{ $name === 'Classic Marinara' ? 'checked' : '' }}>
                                    <span class="text-sm font-black tracking-tight">{{ $name }}</span>
                                </div>
                                <span
                                    class="text-xs font-black text-slate-500 bg-slate-100 px-2 py-1 rounded-md">₹{{ $price }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">4. Specify Sauce
                        Portion Quantity Density</span>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        @foreach([
                                'Light' => 0.75,
                                'Regular' => 1.00,
                                'Extra' => 1.35,
                                'Double' => 1.75
                            ] as $portion => $mult)
                            <label
                                class="border-2 border-slate-200 rounded-xl p-3 flex flex-col items-center text-center justify-center cursor-pointer hover:border-slate-400 transition-all font-bold text-slate-800 active:scale-[0.99] select-none">
                                <input type="radio" name="custom_sauce_amount" value="{{ $portion }}"
                                    data-multiplier="{{ $mult }}" class="accent-orange-600 w-4 h-4 mb-2" {{ $portion === 'Regular' ? 'checked' : '' }}>
                                <span class="text-xs font-black tracking-tight">{{ $portion }}</span>
                                <span
                                    class="text-[9px] text-slate-400 uppercase tracking-wider font-bold mt-0.5">{{ $mult }}x
                                    Cost</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">5. Stone-Hearth
                        Baking Level Upgrade</span>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach(['Light Bake', 'Normal Hearth', 'Well Done Crisp'] as $level)
                            <label
                                class="border-2 border-slate-200 rounded-xl p-3 flex flex-col items-center text-center justify-center cursor-pointer hover:border-slate-400 transition-all font-bold text-slate-800 active:scale-[0.99] select-none">
                                <input type="radio" name="custom_baking" value="{{ $level }}"
                                    class="accent-orange-600 w-4 h-4 mb-2" {{ $level === 'Normal Hearth' ? 'checked' : '' }}>
                                <span class="text-xs font-black tracking-tight">{{ $level }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
                    <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">6. Select Core
                        Melting Cheese Selection <span class="text-red-500">*</span></span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach([
                                'Premium Mozzarella Pearls' => 70,
                                'Sharp Cheddar Blend' => 60,
                                'Smoked Gouda Shreds' => 80,
                                'Artisanal Monterey Jack' => 70,
                                'Creamy Feta Crumbles' => 80,
                                'Vegan Cashew Mozzarella' => 90,
                                'Local Amul Processed Blend' => 50,
                                'Spiced Pepper Jack' => 60
                            ] as $name => $price)
                            <label
                                class="border-2 border-slate-200 rounded-xl p-3 flex items-center justify-between cursor-pointer hover:border-slate-400 transition-all font-bold text-slate-800 active:scale-[0.99] select-none">
                                <div class="flex items-center gap-2.5">
                                    <input type="radio" name="custom_cheese" value="{{ $name }}" data-price="{{ $price }}"
                                        class="accent-orange-600 w-4 h-4" {{ $loop->first ? 'checked' : '' }}>
                                    <span class="text-sm font-black tracking-tight">{{ $name }}</span>
                                </div>
                                <span
                                    class="text-xs font-black text-slate-500 bg-slate-100 px-2 py-1 rounded-md">₹{{ $price }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-3 gap-2">
                        <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">7. Load
                            Toppings Partition Grid</span>
                        <span id="lblCustomMaxToppingAlert"
                            class="text-[10px] font-bold text-orange-600 uppercase tracking-wider bg-orange-50 border border-orange-100 px-2.5 py-1 rounded-lg">Max
                            Per Item: 3 units</span>
                    </div>
                    <div class="space-y-4 divide-y divide-slate-100">
                        @foreach([
                                'Paneer Cubes' => 50,
                                'Tandoori Paneer strips' => 60,
                                'Golden Button Mushrooms' => 40,
                                'Sweet Juicy Corn' => 30,
                                'Crunchy Green Capsicum' => 30,
                                'Fiery Red Paprika' => 30,
                                'Zesty Jalapeños' => 30,
                                'Sliced Black Olives' => 40,
                                'Spanish Red Onions' => 20,
                                'Juicy Cherry Tomatoes' => 40,
                                'Fresh Basil Leaves' => 20,
                                'Roasted Garlic Flakes' => 30
                            ] as $name => $price)
                            <div class="pt-4 flex flex-col md:flex-row md:items-center justify-between gap-4 row-custom-topping-item"
                                data-topping-name="{{ $name }}" data-base-price="{{ $price }}">
                                <div class="flex items-center justify-between md:justify-start gap-4">
                                    <span class="text-sm font-black text-slate-900 tracking-tight">{{ $name }}</span>
                                    <span class="text-[10px] font-black text-slate-400">₹{{ $price }}/ea</span>
                                </div>
                                <div class="flex items-center justify-between md:justify-end gap-5">
                                    <div
                                        class="flex items-center gap-1.5 text-[10px] font-black text-slate-500 uppercase tracking-wider bg-slate-50 p-1 border border-slate-200 rounded-xl hidden element-side-radio-container">
                                        <label
                                            class="flex items-center gap-1 px-2 py-1 rounded-lg cursor-pointer hover:bg-slate-200/60"><input
                                                type="radio" name="side_{{ Str::slug($name) }}" value="Left"
                                                class="accent-slate-900 w-3 h-3"> L</label>
                                        <label
                                            class="flex items-center gap-1 px-2 py-1 rounded-lg cursor-pointer hover:bg-slate-200/60"><input
                                                type="radio" name="side_{|  |}$name) }}" value="Right"
                                                class="accent-slate-900 w-3 h-3"> R</label>
                                        <label
                                            class="flex items-center gap-1 px-2 py-1 rounded-lg cursor-pointer hover:bg-slate-200/60"><input
                                                type="radio" name="side_{{ Str::slug($name) }}" value="Both"
                                                class="accent-slate-900 w-3 h-3" checked> Both</label>
                                    </div>
                                    <div
                                        class="inline-flex items-center bg-slate-900 text-white rounded-xl shadow-md p-0.5 border border-slate-800">
                                        <button type="button" onclick="public_function_changeStudioToppingCount(this, -1)"
                                            class="w-7 h-7 flex items-center justify-center font-black hover:bg-slate-800 text-red-400 rounded-lg text-xs transition-colors cursor-pointer">−</button>
                                        <span
                                            class="px-2.5 font-black text-xs text-center min-w-[1.25rem] tracking-tight label-topping-qty-display">0</span>
                                        <button type="button" onclick="public_function_changeStudioToppingCount(this, 1)"
                                            class="w-7 h-7 flex items-center justify-center font-black hover:bg-slate-800 text-emerald-400 rounded-lg text-xs transition-colors cursor-pointer">+</button>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div
                class="p-6 border-t border-slate-100 bg-slate-50 flex items-center justify-between gap-4 shrink-0 mt-auto">
                <div class="flex flex-col">
                    <span id="lblCustomBuilderPromoBanner"
                        class="text-[9px] font-black text-orange-600 bg-orange-50 border border-orange-100 px-2 py-0.5 rounded uppercase tracking-wider mb-1 hidden">🎁
                        Party Deal Applied (-₹500)</span>
                    <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider">Estimated Creation
                        Price</span>
                    <span class="text-3xl font-black text-slate-900" id="lblCustomStudioCalculatedTotal">₹0</span>
                </div>
                <button type="button" onclick="public_function_submitCustomPizzaToBasket()"
                    class="bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 text-white font-black uppercase tracking-wider text-xs px-6 py-4 rounded-xl shadow-lg shadow-orange-600/20 transform hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer">
                    Add Custom Creation 🛒
                </button>
            </div>

        </div>
    </div>
    <div id="checkoutSuccessModal"
        class="hidden fixed inset-0 z-[150] bg-slate-950/80 backdrop-blur-md flex items-center justify-center p-4 select-none">
        <div
            class="bg-white rounded-3xl shadow-2xl border border-slate-100 w-full max-w-sm overflow-hidden text-center p-8 space-y-5 transform scale-100 transition-transform duration-300">
            <div
                class="w-16 h-14 bg-emerald-500/10 text-emerald-500 border border-emerald-500/20 rounded-2xl flex items-center justify-center text-3xl mx-auto shadow-md">
                🍕</div>
            <div class="space-y-1">
                <span
                    class="text-[10px] font-black text-emerald-600 uppercase tracking-widest bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-100">Order
                    Placed</span>
                <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight pt-2">Enjoy Your Meal!</h3>
                <p class="text-slate-500 text-xs font-semibold leading-relaxed px-1">
                    Your kitchen slip has been confirmed under secure tracking code reference:
                </p>
                <div class="bg-slate-950 text-amber-400 font-mono text-2xl font-black py-3 rounded-2xl border-2 border-slate-900 shadow-inner tracking-widest my-4 uppercase select-text"
                    id="lblPopupGeneratedOrderNo">-----</div>
                <p class="text-[11px] text-slate-400 font-medium">
                    Our stone-hearth oven is fired up to 450°C. Your fresh vegetarian order will arrive hot shortly! 🔥
                </p>
            </div>
            <button onclick="public_function_closeSuccessModalAndFlushCart()"
                class="w-full bg-slate-900 hover:bg-slate-800 text-white font-black text-xs py-4 rounded-xl uppercase tracking-wider shadow-lg transition-all transform active:scale-98 cursor-pointer">
                Return To Pizzeria Kitchen Hub ➔
            </button>
        </div>
    </div>

    <script>
        const modal = document.getElementById('authModal');
        const tabMember = document.getElementById('tabMember');
        const tabGuest = document.getElementById('tabGuest');
        const modalTitle = document.getElementById('modalTitle');
        const modalDesc = document.getElementById('modalDesc');
        const memberLoginForm = document.getElementById('memberLoginForm');
        const guestLoginForm = document.getElementById('guestLoginForm');
        const userIdInput = document.getElementById('userIdInput');
        const guestIdInput = document.getElementById('guestIdInput');
        const passwordInput = document.getElementById('passwordInput');
        const guestSubmitBtn = document.getElementById('guestSubmitBtn');
        const statusGuestId = document.getElementById('status_guest_id');
        const statusMemberLogin = document.getElementById('status_member_login');
        const memberSubmitBtn = memberLoginForm.querySelector('button[type="submit"]');
        const basketDrawer = document.getElementById('basketSideDrawer');
        const basketContent = document.getElementById('basketContentCanvas');
        const basketContainer = document.getElementById('basketItemsContainerRow');
        const badgeCounter = document.getElementById('globalBasketCounterBadge');
        const lblSubtotal = document.getElementById('lblBasketSubtotal');
        const lblDiscount = document.getElementById('lblBasketDiscount');
        const lblFinalTotal = document.getElementById('lblBasketFinalTotal');
        const rowDiscount = document.getElementById('rowBasketPromoDeduction');
        const ledgerOffers = document.getElementById('basketAppliedOffersLedger');
        const listOffersTarget = document.getElementById('basketOffersTargetList');
        const warningModal = document.getElementById('clubWarningModal');
        let activeBasketItemsCollection = [];
        let currentlyAppliedCouponToken = null;
        const isClientUserGuestAccount = @json(Auth::check() ? Auth::user()->is_guest : true);
        const isClientUserLoggedIn = @json(Auth::check());
        function toggleBasketDrawer(shouldOpen) {
            if (shouldOpen) {
                basketDrawer.classList.remove('hidden');
                basketDrawer.classList.add('flex');
                renderDynamicBasketContents();
                setTimeout(() => {
                    basketDrawer.classList.remove('opacity-0');
                    basketContent.classList.remove('translate-x-full');
                    basketContent.classList.add('translate-x-0');
                }, 10);
            } else {
                basketDrawer.classList.add('opacity-0');
                basketContent.classList.remove('translate-x-0');
                basketContent.classList.add('translate-x-full');
                setTimeout(() => {
                    basketDrawer.classList.add('hidden');
                    basketDrawer.classList.remove('flex');
                }, 300);
            }
        }

        function closeClubWarningModal() {
            warningModal.classList.add('hidden');
            warningModal.classList.remove('flex');
        }
        
        function generateStringSlugTrack(text) {
            return text.toString().toLowerCase().trim()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-');
        }

        function triggerCouponSuccessPopupToast(messageText) {
            const oldToast = document.getElementById('couponDynamicSuccessToast');
            if (oldToast) oldToast.remove();
            const toastFrameNode = document.createElement('div');
            toastFrameNode.id = 'couponDynamicSuccessToast';
            toastFrameNode.className = "fixed top-28 left-1/2 -translate-x-1/2 z-[100] bg-slate-900 border-2 border-emerald-500 text-white font-black text-xs md:text-sm tracking-wide uppercase px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 transition-all duration-300 opacity-0 -translate-y-4 scale-95 select-none";
            toastFrameNode.innerHTML = `<span>🎉</span> <span>${messageText}</span>`;
            document.body.appendChild(toastFrameNode);
            
            setTimeout(() => {
                toastFrameNode.classList.remove('opacity-0', '-translate-y-4', 'scale-95');
                toastFrameNode.classList.add('opacity-100', 'translate-y-0', 'scale-100');
            }, 50);

            setTimeout(() => {
                toastFrameNode.classList.remove('opacity-100', 'translate-y-0', 'scale-100');
                toastFrameNode.classList.add('opacity-0', '-translate-y-4', 'scale-95');
                setTimeout(() => { toastFrameNode.remove(); }, 300);
            }, 3000);
        }
        
        function evaluatePromoCouponClaim(isLockedDeal, couponTitle, discountType, discountValue) {
            if (isLockedDeal && (!isClientUserLoggedIn || isClientUserGuestAccount)) {
                warningModal.classList.remove('hidden');
                warningModal.classList.add('flex');
                return;
            }

            currentlyAppliedCouponToken = {
                title: couponTitle,
                type: discountType,
                value: parseInt(discountValue)
            };

            let visualDiscountDisplayString = discountType === 'percentage' ? `${discountValue}%` : `₹${discountValue}`;
            triggerCouponSuccessPopupToast(`Congratulations! Discount of ${visualDiscountDisplayString} Applied.`);

            calculateLiveDynamicBasketMetrics();
            renderDynamicBasketContents();
        }

        function evaluateComboMealClaim(isMembersOnlyDeal, comboTitle, bundlePrice) {
            if (isMembersOnlyDeal && (!isClientUserLoggedIn || isClientUserGuestAccount)) {
                warningModal.classList.remove('hidden');
                warningModal.classList.add('flex');
                return;
            }

            public_function_addDirectItemToBasket(comboTitle, bundlePrice, "Combo Bundle");
        }

        public_function_addDirectItemToBasket = function (itemName, basePrice, itemCategory) {
            const compiledDirectItem = {
                id: Date.now() + Math.random(),
                name: itemName,
                category: itemCategory,
                dough: itemCategory,
                sauce: "Standard Prep",
                cheese: "Included",
                size: "Fixed Unit",
                cost: parseInt(basePrice)
            };

            activeBasketItemsCollection.push(compiledDirectItem);
            badgeCounter.innerText = activeBasketItemsCollection.length;

            renderDynamicBasketContents();
            updateMenuCardCounterUI(itemName, itemCategory, basePrice);
        };

        public_function_removeDirectItemUnit = function (itemName, itemCategory, basePrice) {
            const targetIndex = activeBasketItemsCollection.findIndex(item => item.name === itemName);
            if (targetIndex !== -1) {
                activeBasketItemsCollection.splice(targetIndex, 1);
            }

            badgeCounter.innerText = activeBasketItemsCollection.length;
            renderDynamicBasketContents();
            updateMenuCardCounterUI(itemName, itemCategory, basePrice);
        };
        function updateMenuCardCounterUI(itemName, itemCategory, basePrice) {
            const cleanCategorySlug = itemCategory.replace(/\s+/g, '');
            const cleanItemSlug = generateStringSlugTrack(itemName);
            const targetWrapperNode = document.getElementById(`counter-wrapper-${cleanCategorySlug}-${cleanItemSlug}`);

            if (!targetWrapperNode) return;

            const activeQuantityCount = activeBasketItemsCollection.filter(item => item.name === itemName).length;

            if (activeQuantityCount > 0) {
                const innerCounterHTML = `
                    <div class="inline-flex items-center bg-slate-900 text-white rounded-xl shadow-md p-1 border border-slate-800 select-none">
                        <button onclick="public_function_removeDirectItemUnit('${itemName}', '${itemCategory}', ${basePrice})" 
                                class="w-8 h-8 flex items-center justify-center font-black hover:bg-slate-800 text-red-400 rounded-lg transition-colors text-sm transform active:scale-90 cursor-pointer">
                                −
                        </button>
                        <span class="px-4 font-black text-xs text-center min-w-[2rem] tracking-tight">${activeQuantityCount}</span>
                        <button onclick="public_function_addDirectItemToBasket('${itemName}', '${basePrice}', '${itemCategory}')" 
                                class="w-8 h-8 flex items-center justify-center font-black hover:bg-slate-800 text-emerald-400 rounded-lg transition-colors text-sm transform active:scale-90 cursor-pointer">
                                +
                        </button>
                    </div>`;

                if (itemCategory === "Combo Bundle") {
                    targetWrapperNode.innerHTML = `<span class="text-3xl font-black text-slate-900">₹${basePrice}</span>` + innerCounterHTML;
                } else {
                    targetWrapperNode.innerHTML = innerCounterHTML;
                }
            } else {
                if (itemCategory === "Combo Bundle") {
                    targetWrapperNode.innerHTML = `
                        <span class="text-3xl font-black text-slate-900">₹${basePrice}</span>
                        <button onclick="evaluateComboMealClaim(${isClientUserGuestAccount ? 'false' : 'true'}, '${itemName}', '${basePrice}')" 
                                class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-black text-xs px-5 py-3 rounded-xl shadow-md uppercase transition-all tracking-wider transform active:scale-95 cursor-pointer">
                                Claim Bundle
                        </button>`;
                } else {
                    targetWrapperNode.innerHTML = `
                        <button onclick="public_function_addDirectItemToBasket('${itemName}', '${basePrice}', '${itemCategory}')" 
                                class="bg-red-600 hover:bg-red-700 text-white font-black text-[10px] uppercase tracking-wider px-5 py-3 rounded-xl shadow-md transition-all cursor-pointer transform active:scale-95">
                                Add To Basket 🛒
                        </button>`;
                }
            }
        }

        function removeBasketItemRowElement(itemUniqueId, itemName, itemCategory, basePrice) {
            activeBasketItemsCollection = activeBasketItemsCollection.filter(item => item.id !== itemUniqueId);
            badgeCounter.innerText = activeBasketItemsCollection.length;

            renderDynamicBasketContents();

            const fixedPriceCategories = ["Sides", "Cold Drinks", "Desserts", "Combo Bundle"];
            if (itemCategory && fixedPriceCategories.includes(itemCategory)) {
                updateMenuCardCounterUI(itemName, itemCategory, basePrice);
            }
        }

        function addConfiguredPizzaToBasket() {
            const compiledPizzaItem = {
                id: Date.now() + Math.random(),
                name: pzName.innerText,
                category: "Pizza",
                dough: lblDough.innerText,
                sauce: lblSauce.innerText,
                cheese: lblCheese.innerText,
                size: selectedSizeNameString,
                cost: Math.round(activePizzaBaselinePrice * selectedMultiplierValue)
            };

            activeBasketItemsCollection.push(compiledPizzaItem);
            badgeCounter.innerText = activeBasketItemsCollection.length;

            closeCustomizer();
            calculateLiveDynamicBasketMetrics();
            renderDynamicBasketContents();
        }

        public_function_executeCartInlineIncrement = function (name, category, unitCost, dough, sauce, cheese, size) {
            const replicatedItemUnit = {
                id: Date.now() + Math.random(),
                name: name,
                category: category,
                dough: dough,
                sauce: sauce,
                cheese: cheese,
                size: size,
                cost: parseInt(unitCost)
            };

            activeBasketItemsCollection.push(replicatedItemUnit);
            badgeCounter.innerText = activeBasketItemsCollection.length;

            renderDynamicBasketContents();
            if (category !== "Pizza" && category !== "Combo Bundle") {
                updateMenuCardCounterUI(name, category, unitCost);
            } else if (category === "Combo Bundle") {
                updateMenuCardCounterUI(name, "Combo Bundle", unitCost);
            }
        };
        function calculateLiveDynamicBasketMetrics() {
            let runningSubtotalAggregate = 0;
            activeBasketItemsCollection.forEach(item => { runningSubtotalAggregate += item.cost; });

            let finalCalculatedDeduction = 0;

            if (currentlyAppliedCouponToken && runningSubtotalAggregate > 0) {
                if (currentlyAppliedCouponToken.type === 'percentage') {
                    finalCalculatedDeduction = Math.round(runningSubtotalAggregate * (currentlyAppliedCouponToken.value / 100));
                } else if (currentlyAppliedCouponToken.type === 'fixed_amount') {
                    finalCalculatedDeduction = currentlyAppliedCouponToken.value;
                }
            }

            const netAbsoluteCheckoutCost = Math.max(0, runningSubtotalAggregate - finalCalculatedDeduction);

            lblSubtotal.innerText = "₹" + runningSubtotalAggregate;
            if (finalCalculatedDeduction > 0) {
                lblDiscount.innerText = "-₹" + finalCalculatedDeduction;
                rowDiscount.classList.remove('hidden');
            } else {
                rowDiscount.classList.add('hidden');
            }
            lblFinalTotal.innerText = "₹" + netAbsoluteCheckoutCost;
        }

        function renderDynamicBasketContents() {
            calculateLiveDynamicBasketMetrics();
            basketContainer.innerHTML = "";

            if (activeBasketItemsCollection.length === 0) {
                basketContainer.innerHTML = `
                    <div class="text-center py-12 text-slate-400 font-bold text-xs space-y-2 my-auto">
                        <span class="text-3xl block">🍕</span>
                        <span>Your basket is currently empty.<br>Add something delicious from the menu!</span>
                    </div>`;
                ledgerOffers.classList.add('hidden');
                return;
            }

            const visualGroupMapping = [];

            activeBasketItemsCollection.forEach(item => {
                const itemTrackingCategory = item.category || item.dough;
                const matchingGroup = visualGroupMapping.find(group =>
                    group.name === item.name &&
                    group.size === item.size &&
                    group.dough === item.dough &&
                    group.cost === item.cost
                );

                if (matchingGroup) {
                    matchingGroup.quantity += 1;
                    matchingGroup.idsArray.push(item.id);
                } else {
                    visualGroupMapping.push({
                        name: item.name,
                        category: itemTrackingCategory,
                        dough: item.dough,
                        sauce: item.sauce,
                        cheese: item.cheese,
                        size: item.size,
                        cost: item.cost,
                        quantity: 1,
                        idsArray: [item.id]
                    });
                }
            });

            visualGroupMapping.forEach(groupItem => {
                const secondaryLabelDescription = groupItem.size === "Fixed Unit"
                    ? groupItem.category
                    : `${groupItem.size} • ${groupItem.dough}`;

                const computedRowPrice = groupItem.cost * groupItem.quantity;
                const topItemIdReference = groupItem.idsArray[groupItem.idsArray.length - 1];

                const rowItemCardShell = document.createElement('div');
                rowItemCardShell.className = "p-4 bg-slate-50 border border-slate-200 rounded-2xl flex items-center justify-between gap-4 group";
                rowItemCardShell.innerHTML = `
                    <div class="flex flex-col grow">
                        <span class="text-sm font-black text-slate-900">${groupItem.name}</span>
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wide mt-0.5">${secondaryLabelDescription}</span>
                    </div>
                    <div class="flex items-center gap-4 shrink-0 select-none">
                        <span class="text-base font-black text-slate-900">₹${computedRowPrice}</span>
                        
                        <div class="inline-flex items-center bg-slate-900 text-white rounded-xl shadow-sm p-0.5 border border-slate-800">
                            <button onclick="removeBasketItemRowElement(${topItemIdReference}, '${groupItem.name}', '${groupItem.category}', ${groupItem.cost})" 
                                    class="w-6 h-6 flex items-center justify-center font-black hover:bg-slate-800 text-red-400 rounded-lg transition-colors text-xs cursor-pointer transform active:scale-90">
                                    −
                            </button>
                            <span class="px-2 font-black text-[11px] text-center min-w-[1.25rem] tracking-tight">${groupItem.quantity}</span>
                            
                            <button onclick="public_function_executeCartInlineIncrement('${groupItem.name}', '${groupItem.category}', ${groupItem.cost}, '${groupItem.dough}', '${groupItem.sauce}', '${groupItem.cheese}', '${groupItem.size}')" 
                                    class="w-6 h-6 flex items-center justify-center font-black hover:bg-slate-800 text-emerald-400 rounded-lg transition-colors text-xs cursor-pointer transform active:scale-90">
                                    +
                            </button>
                        </div>
                    </div>`;
                basketContainer.appendChild(rowItemCardShell);
            });

            if (currentlyAppliedCouponToken) {
                ledgerOffers.classList.remove('hidden');
                listOffersTarget.innerHTML = `
                    <div class="flex items-center justify-between text-[11px] font-bold text-emerald-600 bg-emerald-50/50 border border-emerald-100 p-2 rounded-lg">
                        <span>🏷️ ${currentlyAppliedCouponToken.title}</span>
                        <button onclick="purgeActiveBasketCoupon()" class="text-slate-400 hover:text-red-600 ml-2">✕</button>
                    </div>`;
            } else {
                ledgerOffers.classList.add('hidden');
            }
        }

        function purgeActiveBasketCoupon() {
            currentlyAppliedCouponToken = null;
            calculateLiveDynamicBasketMetrics();
            renderDynamicBasketContents();
        }

        function executeBasketCheckoutOrder() {
            if (activeBasketItemsCollection.length === 0) {
                alert("Your kitchen basket is empty! Configure a hot signature pizza before proceeding.");
                return;
            }

            let subtotalVal = parseInt(lblSubtotal.innerText.replace('₹', ''));
            let discountVal = parseInt(lblDiscount.innerText.replace('-₹', '').replace('₹', '')) || 0;
            let finalPriceVal = parseInt(lblFinalTotal.innerText.replace('₹', ''));
            let appliedCouponName = currentlyAppliedCouponToken ? currentlyAppliedCouponToken.title : null;
            const itemsDataPayloadGrid = [];
            activeBasketItemsCollection.forEach(item => {
                itemsDataPayloadGrid.push({
                    name: item.name,
                    category: item.category || "Pizza",
                    dough: item.dough || "Standard",
                    sauce: item.sauce || "Included",
                    cheese: item.cheese || "Included",
                    size: item.size || "Fixed Unit",
                    quantity: 1,
                    cost: item.cost
                });
            });
            
            fetch('/process-secure-checkout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({
                    basket_items: itemsDataPayloadGrid,
                    basket_total: subtotalVal,
                    coupon_applied: appliedCouponName,
                    coupon_discount: discountVal,
                    total_final_price: finalPriceVal
                })
            })
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        document.getElementById('lblPopupGeneratedOrderNo').innerText = data.order_no;
                        toggleBasketDrawer(false);
                        const successModal = document.getElementById('checkoutSuccessModal');
                        if (successModal) {
                            successModal.classList.remove('hidden');
                            successModal.classList.add('flex');
                        }
                    }
                })
                .catch(error => {
                    console.error("Secure Checkout Pipeline Failure:", error);
                    alert("Order Dispatch Error: Check your database connection settings or XAMPP MariaDB port logs.");
                });
        }
        function public_function_closeSuccessModalAndFlushCart() {
            activeBasketItemsCollection = [];
            currentlyAppliedCouponToken = null;
            if (badgeCounter) badgeCounter.innerText = "0";
            if (rowDiscount) rowDiscount.classList.add('hidden');

            const successModal = document.getElementById('checkoutSuccessModal');
            if (successModal) {
                successModal.classList.remove('flex');
                successModal.classList.add('hidden');
            }
            window.location.reload();
        }

        function openAuthModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            switchAuthMode('member');
        }

        function closeAuthModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
            userIdInput.value = "";
            guestIdInput.value = "";
            passwordInput.value = "";
            userIdInput.style.borderColor = "#e2e8f0";
            guestIdInput.style.borderColor = "#e2e8f0";
            statusGuestId.classList.add('hidden');
            statusMemberLogin.classList.add('hidden');
            statusMemberLogin.innerText = "";
        }

        function switchAuthMode(mode) {
            if (mode === 'member') {
                tabMember.className = "py-4 font-black text-sm uppercase tracking-wider text-slate-900 bg-white border-b-4 border-red-600 text-center cursor-pointer transition-all";
                tabGuest.className = "py-4 font-black text-sm uppercase tracking-wider text-slate-500 hover:text-slate-800 text-center cursor-pointer transition-all";

                modalTitle.innerText = "Welcome Back";
                modalDesc.innerText = "Sign in with your verified User ID to access saved delivery routes.";

                memberLoginForm.classList.remove('hidden');
                memberLoginForm.classList.add('block');
                guestLoginForm.classList.remove('block');
                guestLoginForm.classList.add('hidden');

                userIdInput.setAttribute('required', 'true');
                userIdInput.removeAttribute('disabled');
                passwordInput.setAttribute('required', 'true');
                passwordInput.removeAttribute('disabled');

                guestIdInput.removeAttribute('required');
                guestIdInput.setAttribute('disabled', 'true');
            } else {
                tabGuest.className = "py-4 font-black text-sm uppercase tracking-wider text-slate-900 bg-white border-b-4 border-red-600 text-center cursor-pointer transition-all";
                tabMember.className = "py-4 font-black text-sm uppercase tracking-wider text-slate-500 hover:text-slate-800 text-center cursor-pointer transition-all";

                modalTitle.innerText = "Temporary Guest Login";
                modalDesc.innerText = "Provide a temporary unique User ID name to identify your kitchen basket tracking slips.";

                memberLoginForm.classList.remove('block');
                memberLoginForm.classList.add('hidden');
                guestLoginForm.classList.remove('hidden');
                guestLoginForm.classList.add('block');

                userIdInput.removeAttribute('required');
                userIdInput.setAttribute('disabled', 'true');
                passwordInput.removeAttribute('required');
                passwordInput.setAttribute('disabled', 'true');

                guestIdInput.setAttribute('required', 'true');
                guestIdInput.removeAttribute('disabled');

                guestIdInput.dispatchEvent(new Event('input'));
            }
        }

        memberLoginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const userIdValue = userIdInput.value.trim();
            const passwordValue = passwordInput.value;
            if (!userIdValue || !passwordValue) return;

            try {
                memberSubmitBtn.setAttribute("disabled", "true");
                memberSubmitBtn.innerText = "Authenticating...";
                statusMemberLogin.classList.add('hidden');

                const response = await fetch('/login-member', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ user_id: userIdValue, password: passwordValue })
                });

                const data = await response.json();

                if (!response.ok) {
                    statusMemberLogin.classList.remove("hidden");
                    statusMemberLogin.innerText = data.message || "Invalid credentials setup.";
                    userIdInput.style.borderColor = "#ef4444";
                    passwordInput.style.borderColor = "#ef4444";
                    memberSubmitBtn.removeAttribute("disabled");
                    memberSubmitBtn.innerText = "Access Account Menu";
                    return;
                }

                if (data.success) { window.location.reload(); }
            } catch (err) {
                console.error("Member authentication workflow failure:", err);
                memberSubmitBtn.removeAttribute("disabled");
                memberSubmitBtn.innerText = "Access Account Menu";
            }
        });
        document.getElementById('guestAddressInput').addEventListener('input', function () {
            const feedback = document.getElementById('status_guest_address');
            const submitBtn = document.getElementById('guestSubmitBtn');
            feedback.classList.remove('hidden');

            if (this.value.trim().length < 10) {
                feedback.className = "text-[10px] font-bold mt-1.5 text-red-600 animate-pulse";
                feedback.innerText = "✕ Please enter a complete delivery address for Rajkot logistics (Min. 10 characters).";
                submitBtn.setAttribute('disabled', 'true');
            } else {
                feedback.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                feedback.innerText = "✓ Valid delivery structure verified.";
                submitBtn.removeAttribute('disabled');
            }
        });
        guestLoginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const guestValue = guestIdInput.value.trim();
            const guestAddressValue = document.getElementById('guestAddressInput').value.trim();
            if (!guestValue || !guestAddressValue) return;

            try {
                guestSubmitBtn.setAttribute("disabled", "true");
                guestSubmitBtn.innerText = "Verifying Identity...";

                const response = await fetch('/login/guest', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        user_id: guestValue,
                        address: guestAddressValue
                    })
                });


                const data = await response.json();

                if (!response.ok) {
                    statusGuestId.classList.remove("hidden");
                    statusGuestId.className = "text-[10px] font-bold mt-1.5 text-red-600";
                    statusGuestId.innerText = data.message || "✕ Already in use warning";
                    guestIdInput.style.borderColor = "#ef4444";
                    guestSubmitBtn.setAttribute("disabled", "true");
                    guestSubmitBtn.innerText = "Login As Guest 📦";
                    return;
                }

                if (data.success) { window.location.reload(); }
            } catch (err) {
                console.error("Guest authentication workflow failure:", err);
                guestSubmitBtn.removeAttribute("disabled");
                guestSubmitBtn.innerText = "Login As Guest 📦";
            }
        });

        guestIdInput.addEventListener("input", async () => {
            const guestValue = guestIdInput.value.trim();
            if (guestValue.length === 0) {
                statusGuestId.classList.add("hidden");
                guestSubmitBtn.setAttribute("disabled", "true");
                guestIdInput.style.borderColor = "#e2e8f0";
                return;
            }
            try {
                const response = await fetch('/check-field-uniqueness', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({ field: 'user_id', value: guestValue })
                });
                const data = await response.json();

                statusGuestId.classList.remove("hidden");
                if (data.available) {
                    statusGuestId.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                    statusGuestId.innerText = "✓ Unique identity verified inside database records.";
                    guestSubmitBtn.removeAttribute("disabled");
                    guestIdInput.style.borderColor = "#10b981";
                } else {
                    statusGuestId.className = "text-[10px] font-bold mt-1.5 text-red-600";
                    statusGuestId.innerText = "✕ Already in use warning";
                    guestSubmitBtn.setAttribute("disabled", "true");
                    guestIdInput.style.borderColor = "#ef4444";
                }
            } catch (err) {
                console.error("Database lookup connection failure:", err);
            }
        });

        function toggleProfileDropdownMenu(event) {
            event.stopPropagation();
            const dropdown = document.getElementById('profileDropdownCard');
            const arrow = document.getElementById('profileDropdownArrow');

            if (dropdown && dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                if (arrow) arrow.style.transform = "rotate(180deg)";
            } else if (dropdown) {
                dropdown.classList.add('hidden');
                if (arrow) arrow.style.transform = "rotate(0deg)";
            }
        }

        window.addEventListener('click', function () {
            const dropdown = document.getElementById('profileDropdownCard');
            const arrow = document.getElementById('profileDropdownArrow');
            if (dropdown && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
                if (arrow) arrow.style.transform = "rotate(0deg)";
            }
        });
        let selectedCustomDoughPrice = 60;
        let selectedCustomDoughName = 'Classic Hand-Tossed';
        let selectedCustomSizeMultiplier = 1.00;
        let selectedCustomSizeName = 'Regular-10"';
        let customSauceAmountMultiplier = 1.00;
        let customSauceAmountName = 'Regular';
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('input[name="custom_dough"]').forEach(radio => {
                radio.addEventListener('change', function () {
                    selectedCustomDoughPrice = parseInt(this.getAttribute('data-price'));
                    selectedCustomDoughName = this.value;
                    calculateLiveCustomPizzaStudioPrice();
                });
            });

            document.querySelectorAll('input[name="custom_size"]').forEach(radio => {
                radio.addEventListener('change', function () {
                    selectedCustomSizeMultiplier = parseFloat(this.getAttribute('data-multiplier'));
                    selectedCustomSizeName = this.value;
                    calculateLiveCustomPizzaStudioPrice();
                });
            });

            document.querySelectorAll('input[name="custom_sauces"]').forEach(box => {
                box.addEventListener('change', function () {
                    calculateLiveCustomPizzaStudioPrice();
                });
            });

            document.querySelectorAll('input[name="custom_sauce_amount"]').forEach(radio => {
                radio.addEventListener('change', function () {
                    customSauceAmountMultiplier = parseFloat(this.getAttribute('data-multiplier'));
                    customSauceAmountName = this.value;
                    calculateLiveCustomPizzaStudioPrice();
                });
            });
            
            document.querySelectorAll('input[name="custom_cheese"]').forEach(radio => {
                radio.addEventListener('change', function () {
                    calculateLiveCustomPizzaStudioPrice();
                });
            });
        });
        
        function public_function_openCustomPizzaBuilderModal() {
            const builderModalFrame = document.getElementById('customPizzaBuilderModal');
            const builderContentCard = document.getElementById('customBuilderCardCanvas');
            selectedCustomDoughPrice = 60;
            selectedCustomDoughName = 'Classic Hand-Tossed';
            selectedCustomSizeMultiplier = 1.00;
            selectedCustomSizeName = 'Regular-10"';
            customSauceAmountMultiplier = 1.00;
            customSauceAmountName = 'Regular';
            document.querySelectorAll('.label-topping-qty-display').forEach(lbl => lbl.innerText = "0");
            document.querySelectorAll('.element-side-radio-container').forEach(div => { div.classList.add('hidden'); });
            builderModalFrame.classList.remove('hidden');
            builderModalFrame.classList.add('flex');
            document.body.classList.add('overflow-hidden');
            setTimeout(() => {
                builderContentCard.className = "w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-100 h-[85vh] flex flex-col overflow-hidden transform scale-100 transition-transform duration-300";
            }, 50);

            calculateLiveCustomPizzaStudioPrice();
        }

        function closeCustomPizzaBuilderModal() {
            const builderModalFrame = document.getElementById('customPizzaBuilderModal');
            const builderContentCard = document.getElementById('customBuilderCardCanvas');
            builderContentCard.className = "w-full max-w-2xl bg-white rounded-3xl shadow-2xl border border-slate-100 h-[85vh] flex flex-col overflow-hidden transform scale-95 transition-transform duration-300";

            setTimeout(() => {
                builderModalFrame.classList.add('hidden');
                builderModalFrame.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }, 200);
        }
        
        function public_function_changeStudioToppingCount(buttonElement, operationValue) {
            const rowItemCardShell = buttonElement.closest('.row-custom-topping-item');
            const toppingName = rowItemCardShell.getAttribute('data-topping-name');
            const quantityLabelField = rowItemCardShell.querySelector('.label-topping-qty-display');
            const sideLayoutControlsBlock = rowItemCardShell.querySelector('.element-side-radio-container');
            let currentActiveCount = parseInt(quantityLabelField.innerText);
            const sizeInput = document.querySelector('input[name="custom_size"]:checked');
            const sizeName = sizeInput ? sizeInput.value : 'Regular-10"';

            let maximumAllowedCapLimit = 3;
            if (sizeName.includes('6"') || sizeName.includes('8"')) {
                maximumAllowedCapLimit = 2;
            } else if (sizeName.includes('10"') || sizeName.includes('12"')) {
                maximumAllowedCapLimit = 3;
            } else if (sizeName.includes('14"') || sizeName.includes('16"') || sizeName.includes('20"')) {
                maximumAllowedCapLimit = 4;
            } else if (sizeName.includes('30"')) {
                maximumAllowedCapLimit = 6;
            }

            const maxAlertBadge = document.getElementById('lblCustomMaxToppingAlert');
            if (maxAlertBadge) {
                maxAlertBadge.innerText = `Max Per Item: ${maximumAllowedCapLimit} units`;
            }

            currentActiveCount += operationValue;
            if (currentActiveCount < 0) currentActiveCount = 0;
            if (currentActiveCount > maximumAllowedCapLimit) currentActiveCount = maximumAllowedCapLimit;

            quantityLabelField.innerText = currentActiveCount;

            if (currentActiveCount > 0) {
                if (sideLayoutControlsBlock) sideLayoutControlsBlock.classList.remove('hidden');
            } else {
                if (sideLayoutControlsBlock) sideLayoutControlsBlock.classList.add('hidden');
            }

            calculateLiveCustomPizzaStudioPrice();
        }
        function calculateLiveCustomPizzaStudioPrice() {
            const activeDoughInput = document.querySelector('input[name="custom_dough"]:checked');
            if (activeDoughInput) {
                selectedCustomDoughPrice = parseInt(activeDoughInput.getAttribute('data-price'));
                selectedCustomDoughName = activeDoughInput.value;
            }

            const activeSizeInput = document.querySelector('input[name="custom_size"]:checked');
            if (activeSizeInput) {
                selectedCustomSizeMultiplier = parseFloat(activeSizeInput.getAttribute('data-multiplier'));
                selectedCustomSizeName = activeSizeInput.value;
            }

            let pizzaCoreBaselineCost = selectedCustomDoughPrice;

            let highestCheckedSaucePrice = 0;
            let totalSaucesCheckedCount = 0;

            document.querySelectorAll('input[name="custom_sauces"]:checked').forEach(box => {
                const individualSaucePrice = parseInt(box.getAttribute('data-price'));
                totalSaucesCheckedCount++;
                if (individualSaucePrice > highestCheckedSaucePrice) {
                    highestCheckedSaucePrice = individualSaucePrice;
                }
            });

            const activeSauceAmountInput = document.querySelector('input[name="custom_sauce_amount"]:checked');
            if (activeSauceAmountInput) {
                customSauceAmountMultiplier = parseFloat(activeSauceAmountInput.getAttribute('data-multiplier'));
                customSauceAmountName = activeSauceAmountInput.value;
            }

            if (totalSaucesCheckedCount > 0) {
                pizzaCoreBaselineCost += Math.round(highestCheckedSaucePrice * customSauceAmountMultiplier);
            }
            
            const activeCheeseInput = document.querySelector('input[name="custom_cheese"]:checked');
            if (activeCheeseInput) {
                pizzaCoreBaselineCost += parseInt(activeCheeseInput.getAttribute('data-price'));
            }
            
            let calculatedSubtotalValue = Math.round(pizzaCoreBaselineCost * selectedCustomSizeMultiplier);

            document.querySelectorAll('.row-custom-topping-item').forEach(row => {
                const basePrice = parseInt(row.getAttribute('data-base-price'));
                const quantityLabel = row.querySelector('.label-topping-qty-display');
                const activeCount = quantityLabel ? parseInt(quantityLabel.innerText) : 0;

                if (activeCount > 0) {
                    calculatedSubtotalValue += (activeCount * basePrice);
                }
            });

            let finalCorporateDeductionValue = 0;
            const discountBannerRow = document.getElementById('lblCustomBuilderPromoBanner');

            if (selectedCustomSizeName === 'Party-30"') {
                finalCorporateDeductionValue = 500;
                if (discountBannerRow) discountBannerRow.classList.remove('hidden');
            } else {
                if (discountBannerRow) discountBannerRow.classList.add('hidden');
            }

            const checkoutGrandTotalCost = Math.max(0, calculatedSubtotalValue - finalCorporateDeductionValue);

            const displayLabel = document.getElementById('lblCustomStudioCalculatedTotal');
            if (displayLabel) {
                displayLabel.innerText = "₹" + checkoutGrandTotalCost;
            }
        }
        
        function public_function_submitCustomPizzaToBasket() {
            let checkedSaucesArray = [];
            document.querySelectorAll('input[name="custom_sauces"]:checked').forEach(box => {
                checkedSaucesArray.push(box.value);
            });

            if (checkedSaucesArray.length === 0) {
                alert("Chef's Warning: Please select at least one base sauce spread to bake your custom pizza!");
                return;
            }

            const activeBakingInput = document.querySelector('input[name="custom_baking"]:checked');
            const bakingLevel = activeBakingInput ? activeBakingInput.value : 'Normal Hearth';
            let recipeSummaryTextString = `Sauces: (${checkedSaucesArray.join(' + ')} [${customSauceAmountName}]); Baking: ${bakingLevel}; `;
            let selectedToppingsList = [];
            document.querySelectorAll('.row-custom-topping-item').forEach(row => {
                const toppingName = row.getAttribute('data-topping-name');
                const qty = parseInt(row.querySelector('.label-topping-qty-display').innerText);
                const sideInput = row.querySelector('input[type="radio"]:checked');
                const sideAlignment = sideInput ? sideInput.value : 'Both';

                if (qty > 0) {
                    selectedToppingsList.push(`${toppingName} (x${qty} - ${sideAlignment} Side)`);
                }
            });

            if (selectedToppingsList.length > 0) {
                recipeSummaryTextString += `Toppings: ${selectedToppingsList.join(', ')}`;
            } else {
                recipeSummaryTextString += `Toppings: Cheese Only Base`;
            }

            let finalPriceText = document.getElementById('lblCustomStudioCalculatedTotal').innerText;
            let computedCheckoutCost = parseInt(finalPriceText.replace('₹', ''));

            const customPizzaPayloadObj = {
                id: Date.now() + Math.random(),
                name: "Your Custom Recipe",
                category: "Custom Pizza Design",
                dough: selectedCustomDoughName,
                sauce: recipeSummaryTextString,
                cheese: document.querySelector('input[name="custom_cheese"]:checked').value,
                size: selectedCustomSizeName,
                cost: computedCheckoutCost
            };

            activeBasketItemsCollection.push(customPizzaPayloadObj);
            badgeCounter.innerText = activeBasketItemsCollection.length;
            closeCustomPizzaBuilderModal();
            renderDynamicBasketContents();
            triggerCouponSuccessPopupToast("Custom Pizza Design Loaded Into Basket!");
        }

    </script>

</body>

</html>
