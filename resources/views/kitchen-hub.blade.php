@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-screen text-slate-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-10">
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 flex flex-col md:flex-row md:items-center justify-between gap-6 shadow-2xl border-b-4 border-red-600 select-none">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-red-600/10 border border-red-500/20 text-red-500 rounded-2xl flex items-center justify-center text-3xl shadow-md rotate-3">👨‍🍳</div>
                <div class="flex flex-col">
                    <h2 class="text-2xl font-black uppercase tracking-tight text-white">Green Oven Admin Kitchen Hub</h2>
                    <p class="text-slate-400 text-xs font-semibold uppercase tracking-wider mt-0.5">Control product variations, ingredients availability parameters, and deals loops matrix</p>
                </div>
            </div>
            <button onclick="public_function_toggleAddProductModal(true)" class="bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 text-white font-black text-xs uppercase tracking-wider px-6 py-4 rounded-xl transition-all shadow-lg shadow-red-600/10 cursor-pointer transform active:scale-95">
                + Append New Product Item
            </button>
        </div>

        <div class="flex flex-wrap items-center bg-slate-900 p-2 rounded-2xl border border-slate-800/60 shadow-inner select-none gap-2">
            <button onclick="public_function_switchKitchenTab('tab-sides', this)" class="px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all bg-slate-950 text-white shadow border border-slate-800">Sides</button>
            <button onclick="public_function_switchKitchenTab('tab-drinks', this)" class="px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all text-slate-400 hover:text-white">Cold Drinks</button>
            <button onclick="public_function_switchKitchenTab('tab-desserts', this)" class="px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all text-slate-400 hover:text-white">Desserts</button>
            <button onclick="public_function_switchKitchenTab('tab-combos', this)" class="px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all text-slate-400 hover:text-white">Combo Meals</button>
            <button onclick="public_function_switchKitchenTab('tab-daily', this)" class="px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all text-slate-400 hover:text-white">Daily Deals</button>
            <button onclick="public_function_switchKitchenTab('tab-weekly', this)" class="px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all text-slate-400 hover:text-white">Weekly Deals</button>
            <button onclick="public_function_switchKitchenTab('tab-monthly', this)" class="px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all text-slate-400 hover:text-white">Monthly Deals</button>
        </div>

        <div id="modalAddProductFrame" class="hidden fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md items-center justify-center p-4">
            <div class="bg-slate-900 border border-slate-800 text-white rounded-3xl w-full max-w-md overflow-hidden p-6 space-y-5 shadow-2xl">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <h3 class="text-sm font-black uppercase tracking-wider text-orange-500">Add New Entry to Restaurant Grid</h3>
                    <button onclick="public_function_toggleAddProductModal(false)" class="text-slate-400 hover:text-white font-black text-sm cursor-pointer">✕</button>
                </div>
                <form id="frmKitchenHubProductCreate" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Target Destination Table</label>
                        <select id="selCreateProductTargetTable" name="target_table" onchange="public_function_evaluateCreateDealFieldsVisibility(this.value)" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 font-bold text-slate-200 text-xs focus:ring-2 focus:ring-red-600 focus:outline-none cursor-pointer">
                            <option value="sides">Sides Catalog Table</option>
                            <option value="cold_drinks">Cold Drinks Catalog Table</option>
                            <option value="desserts">Desserts Catalog Table</option>
                            <option value="deals">Restaurant Promotional Deals Engine</option>
                        </select>
                    </div>
                    <div id="rowCreateDealTypeSelectorBlock" class="hidden">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Deal Type Category Matrix</label>
                        <select name="deal_type" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 font-bold text-slate-200 text-xs focus:ring-2 focus:ring-red-600 focus:outline-none cursor-pointer">
                            <option value="Combo Meals">Combo Meals Display Row</option>
                            <option value="Daily Deals">Daily Deals Display Row</option>
                            <option value="Weekly Deals">Weekly Deals Display Row</option>
                            <option value="Monthly Deals">Monthly Deals Display Row</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Product Title Name</label>
                        <input type="text" name="name" required placeholder="e.g., Rajkot Spice Stix" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 font-bold text-slate-200 text-xs focus:ring-2 focus:ring-red-600 focus:bg-slate-950 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Baseline Sales Price (₹)</label>
                        <input type="number" name="price" required placeholder="180" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 font-bold text-slate-200 text-xs focus:ring-2 focus:ring-red-600 focus:bg-slate-950 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Detailed Marketing Description</label>
                        <textarea name="description" rows="3" required placeholder="Specify ingredients breakdown parameters..." class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 font-bold text-slate-200 text-xs focus:ring-2 focus:ring-red-600 focus:bg-slate-950 focus:outline-none resize-none leading-relaxed"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-black text-xs py-4 rounded-xl uppercase tracking-wider shadow-lg transition-all cursor-pointer">
                        Confirm Data Table Append ➔
                    </button>
                </form>
            </div>
        </div>
        <div id="kitchenHubTabsCanvas">

            @foreach([
                'tab-sides' => ['items' => $sides, 'table' => 'sides'],
                'tab-drinks' => ['items' => $coldDrinks, 'table' => 'cold_drinks'],
                'tab-desserts' => ['items' => $desserts, 'table' => 'desserts'],
                'tab-combos' => ['items' => $deals->where('deal_type', 'Combo Meals'), 'table' => 'deals'],
                'tab-daily' => ['items' => $deals->where('deal_type', 'Daily Deals'), 'table' => 'deals'],
                'tab-weekly' => ['items' => $deals->where('deal_type', 'Weekly Deals'), 'table' => 'deals'],
                'tab-monthly' => ['items' => $deals->where('deal_type', 'Monthly Deals'), 'table' => 'deals']
            ] as $tabId => $config)
                
                <div id="{{ $tabId }}" class="kitchen-view-panel {{ $loop->first ? '' : 'hidden' }} space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($config['items'] as $item)
                            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-5 flex flex-col space-y-4 hover:border-slate-700 transition-all shadow-xl item-hub-modifier-card">
                                
                                <div class="flex items-center justify-between text-[10px] font-mono font-bold text-slate-500 uppercase select-none">
                                    <span>Database ID: #{{ $item->id }}</span>
                                    <span class="bg-slate-950 px-2 py-0.5 rounded border border-slate-800 text-orange-500">{{ $config['table'] }}</span>
                                </div>

                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-[8px] font-black text-slate-500 uppercase tracking-widest mb-1 select-none">Product Title</label>
                                        <input type="text" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs font-bold text-white focus:ring-1 focus:ring-red-600 focus:outline-none hub-input-name" value="{{ $item->name }}">
                                    </div>

                                    @if($config['table'] === 'deals')
                                        <div>
                                            <label class="block text-[8px] font-black text-slate-500 uppercase tracking-widest mb-1 select-none">Deal Category Type</label>
                                            <input type="text" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs font-bold text-amber-400 focus:ring-1 focus:ring-red-600 focus:outline-none hub-input-deal-type" value="{{ $item->deal_type }}" readonly>
                                        </div>
                                    @endif

                                    <div>
                                        <label class="block text-[8px] font-black text-slate-500 uppercase tracking-widest mb-1 select-none">Sales Unit Price (₹)</label>
                                        <!-- Fixed column mapping rule context bypass: reads deal_price for deals table, otherwise reads standard price -->
                                        <input type="number" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs font-black text-emerald-400 focus:ring-1 focus:ring-red-600 focus:outline-none hub-input-price" 
                                            value="{{ isset($item->price) ? $item->price : ($item->deal_price ?? 0) }}">
                                    </div>

                                    <div>
                                        <label class="block text-[8px] font-black text-slate-500 uppercase tracking-widest mb-1 select-none">Menu Card Subtitle Description</label>
                                        <textarea rows="2" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs font-medium text-slate-300 focus:ring-1 focus:ring-red-600 focus:outline-none resize-none leading-relaxed hub-input-desc">{{ isset($item->description) ? $item->description : ($item->drink_description ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between gap-3 select-none mt-auto">
                                    <button onclick="public_function_executeHubItemDelete({{ $item->id }}, '{{ $config['table'] }}')" class="text-xs font-bold text-red-500 hover:text-red-400 px-2 py-1 rounded cursor-pointer transition-colors">
                                        🗑️ Purge
                                    </button>
                                    <button onclick="public_function_executeInlineHubUpdate({{ $item->id }}, '{{ $config['table'] }}', this.closest('.item-hub-modifier-card'))" class="bg-slate-950 border border-slate-800 hover:border-slate-700 text-white font-black text-[10px] uppercase tracking-wider px-4 py-2.5 rounded-xl shadow transition-all cursor-pointer transform active:scale-95">
                                        Save Changes
                                    </button>
                                </div>

                            </div>
                        @empty
                            <div class="col-span-full bg-slate-900/40 border border-slate-800/50 rounded-3xl text-center py-12 text-slate-500 font-bold text-xs space-y-1 select-none">
                                <span class="text-3xl block">📦</span>
                                <span>No data available inside this catalog dataset matrix yet.<br>Click the append button above to add fresh inventory lines!</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<script>
    function public_function_switchKitchenTab(targetTabId, clickedButton) {
        document.querySelectorAll('.kitchen-view-panel').forEach(panel => {
            panel.classList.add('hidden');
        });

        clickedButton.parentElement.querySelectorAll('button').forEach(btn => {
            btn.className = "px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all text-slate-400 hover:text-white";
        });

        document.getElementById(targetTabId).classList.remove('hidden');
        clickedButton.className = "px-5 py-3 rounded-xl text-xs font-black uppercase tracking-wider cursor-pointer transition-all bg-slate-950 text-white shadow border border-slate-800";
    }

    function public_function_toggleAddProductModal(shouldShow) {
        const frame = document.getElementById('modalAddProductFrame');
        if (shouldShow) {
            frame.classList.remove('hidden');
            frame.classList.add('flex');
        } else {
            frame.classList.add('hidden');
            frame.classList.remove('flex');
            document.getElementById('frmKitchenHubProductCreate').reset();
        }
    }

    function public_function_evaluateCreateDealFieldsVisibility(tableNameValue) {
        const rowBlock = document.getElementById('rowCreateDealTypeSelectorBlock');
        if (tableNameValue === 'deals') {
            rowBlock.classList.remove('hidden');
        } else {
            rowBlock.classList.add('hidden');
        }
    }

    document.getElementById('frmKitchenHubProductCreate').addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const dataObj = Object.fromEntries(formData.entries());

        try {
            const res = await fetch('/kitchen-hub/store', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json', 
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(dataObj)
            });
            const data = await res.json();
            if (data.success) {
                alert(data.message);
                window.location.reload();
            } else { alert("Operation failed: " + data.message); }
        } catch (err) { console.error(err); }
    });

    async function public_function_executeInlineHubUpdate(id, tableName, cardElement) {
        const payload = {
            id: id,
            target_table: tableName,
            name: cardElement.querySelector('.hub-input-name').value.trim(),
            price: cardElement.querySelector('.hub-input-price').value.trim(),
            description: cardElement.querySelector('.hub-input-desc').value.trim()
        };

        const dealTypeField = cardElement.querySelector('.hub-input-deal-type');
        if (dealTypeField) { payload.deal_type = dealTypeField.value; }

        try {
            const res = await fetch('/kitchen-hub/update', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json', 
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                },
                body: JSON.stringify(payload)
            });
            const data = await res.json();
            if (data.success) { alert("✨ Configuration locked down perfectly!"); }
        } catch (e) { console.error(e); }
    }

    async function public_function_executeHubItemDelete(id, tableName) {
        if (!confirm("Are you sure you want to permanently drop this menu variation out of your database rows?")) return;

        try {
            const res = await fetch('/kitchen-hub/delete', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json', 
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                },
                body: JSON.stringify({ id: id, target_table: tableName })
            });
            const data = await res.json();
            if (data.success) { window.location.reload(); }
        } catch (e) { console.error(e); }
    }
</script>
@endsection
