@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto space-y-10">

        
        <div class="bg-slate-900 text-white rounded-3xl p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6 border-b-4 border-red-600 shadow-xl">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-red-600 rounded-2xl flex items-center justify-center text-3xl shadow-md rotate-3 select-none">⭐</div>
                <div class="flex flex-col">
                    <h2 class="text-2xl font-black uppercase tracking-tight">Welcome, {{ Auth::user()->first_name }}!</h2>
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mt-0.5">AGO Club Member Dashboard Account Profile Ledger</p>
                </div>
            </div>
            <a href="/" class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-black uppercase tracking-wider px-5 py-3 rounded-xl transition-all shadow-md text-center">➔ Return To Kitchen Menu</a>
        </div>

        <!-- 2-COLUMN MODULAR DESIGN INTERFACE CONTAINER -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <!-- LEFT PANEL: SECTION 1 - EDIT PERSONAL DETAILS LEDGER SHEET -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 space-y-6">
                <div class="border-b border-slate-100 pb-3 select-none">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Section One</span>
                    <h3 class="text-base font-black text-slate-900 uppercase tracking-tight mt-0.5">Personal Details</h3>
                </div>

                <form id="frmDashboardDetailsSync" class="space-y-4">
                    @csrf
                    <!-- User ID Display Row (Strictly Static & Locked) -->
                    <div class="select-none">
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Database User ID (Locked)</label>
                        <div class="bg-slate-100 border border-slate-200 rounded-xl px-4 py-3 font-mono text-xs font-bold text-slate-500 shadow-inner">
                            @<span>{{ Auth::user()->user_id }}</span>
                        </div>
                    </div>

                    <!-- Editable Fields Rows -->
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">First Name <span class="text-red-500">*</span></label>
                        <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 text-xs focus:ring-2 focus:ring-red-500 focus:bg-white transition-all">
                    </div>

                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Last Name</label>
                        <input type="text" name="last_name" value="{{ Auth::user()->last_name ?? '' }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 text-xs focus:ring-2 focus:ring-red-500 focus:bg-white transition-all">
                    </div>

                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" id="dashboardEmailField" name="email" value="{{ Auth::user()->email ?? '' }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 text-xs focus:ring-2 focus:ring-red-500 focus:bg-white transition-all">
                        </div>
                        <div id="valMsgEmailFeedback" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Phone Number <span class="text-red-500">*</span></label>
                        <input type="text" id="dashboardPhoneField" name="mobile" value="{{ Auth::user()->mobile ?? '' }}" placeholder="Enter 10-digit number" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 text-xs focus:ring-2 focus:ring-red-500 focus:bg-white transition-all">
                        <div id="valMsgPhoneFeedback" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    </div>

                    <div>
                        <label class="block text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Delivery Address <span class="text-red-500">*</span></label>
                        <textarea name="address" rows="3" required placeholder="Enter full building name, street details, and landmark in Rajkot..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 font-bold text-slate-800 text-xs focus:ring-2 focus:ring-red-500 focus:bg-white transition-all resize-none leading-relaxed">{{ Auth::user()->address ?? '' }}</textarea>
                        <div id="status_dashboard_address" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    </div>

                    <!-- Async Status Feedback Alert Line -->
                    <div id="lblDetailsFormFeedbackMsg" class="text-[10px] font-bold py-2.5 px-3 rounded-lg border hidden select-none"></div>

                    <button type="submit" id="btnSyncDetailsSubmit" class="w-full bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-wider text-xs py-3.5 rounded-xl shadow-lg shadow-red-600/10 cursor-pointer text-center transition-all transform active:scale-98">
                        Save Profile Updates
                    </button>
                </form>
            </div>
            <!-- RIGHT PANEL: SECTION 2 - TRANSACTION TRACKING DECKS & SMART SORTING CONTROLLER -->
            <div class="lg:grid lg:col-span-2 space-y-6">
                
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 select-none">
                    <div class="flex flex-col">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Section Two</span>
                        <h3 class="text-base font-black text-slate-900 uppercase tracking-tight mt-0.5">Order Tracking Ledger</h3>
                    </div>

                    <!-- IMMERSIVE INTERACTIVE DROPDOWN SORTING CONTROL MATRIX -->
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Sort Matrix:</span>
                        <select id="dropdownOrderSortValve" onchange="public_function_executeHistorySorting()" class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs font-black text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 cursor-pointer shadow-sm">
                            <option value="date-new" selected>Newest Orders First</option>
                            <option value="date-old">Oldest Orders First</option>
                            <option value="price-high">Highest Price Total</option>
                            <option value="price-low">Lowest Price Total</option>
                        </select>
                    </div>
                </div>

                <!-- DYNAMIC ORDERS TIMELINE HISTORY STACK BLOCK AREA -->
                <div id="targetOrdersTimelineContainer" class="space-y-4">
                    @forelse($orderHistoryCollection as $order)
                        <div class="bg-white rounded-3xl border border-slate-200 p-6 flex flex-col md:flex-row md:items-center justify-between gap-6 hover:shadow-md transition-all duration-200 historical-order-card"
                             data-timestamp="{{ strtotime($order->order_date . ' ' . $order->order_time) }}"
                             data-price="{{ $order->total_final_price }}">
                            
                            <div class="space-y-3 grow">
                                <div class="flex flex-wrap items-center gap-2 select-none">
                                    <span class="font-mono text-sm font-black bg-slate-950 text-amber-400 px-3 py-1 rounded-xl tracking-wider uppercase border border-slate-900">AGO-{{ $order->order_no }}</span>
                                    <span class="text-[9px] font-black uppercase px-2.5 py-1 rounded-md border tracking-wider
                                        {{ $order->status === 'Completed' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-blue-50 text-blue-600 border-blue-100 animate-pulse' }}">
                                        ● Status: {{ $order->status }}
                                    </span>
                                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wide ml-1">📅 {{ date('d-M-Y', strtotime($order->order_date)) }} at {{ date('h:i A', strtotime($order->order_time)) }}</span>
                                </div>

                                <!-- Granular Item Row Columns Rendering Matrix -->
                                <div class="divide-y divide-slate-100 font-medium text-slate-700 text-xs">
                                    @foreach($order->items as $item)
                                        <div class="py-2 flex items-center justify-between gap-4">
                                            <div class="flex flex-col grow">
                                                <span class="font-bold text-slate-900 text-sm">{{ $item->item }}</span>
                                                @if($item->custom_recipe_details)
                                                    <p class="text-[10px] text-orange-600 font-bold leading-normal mt-0.5 select-text bg-orange-50/50 p-2 rounded-xl border border-orange-100/50 max-w-xl">{{ $item->custom_recipe_details }}</p>
                                                @endif
                                            </div>
                                            <span class="text-slate-400 font-bold shrink-0 text-center select-none">x{{ $item->no_of_items }}</span>
                                            <span class="font-black text-slate-900 shrink-0 select-none">₹{{ $item->total_of_individual_item }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Right Side Pricing Block Totals Column -->
                            <div class="md:text-right shrink-0 flex flex-col justify-center select-none md:border-l md:border-slate-100 md:pl-6 min-w-[8rem] gap-1">
                                <div class="flex items-center justify-between md:justify-end gap-2 text-xs font-bold text-slate-400">
                                    <span>Subtotal:</span><span>₹{{ $order->basket_total }}</span>
                                </div>
                                @if($order->coupon_applied)
                                    <div class="flex items-center justify-between md:justify-end gap-2 text-[10px] font-black text-emerald-600 uppercase tracking-wide">
                                        <span>🏷️ Coupon Applied:</span><span>-₹{{ $order->coupon_discount }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center justify-between md:justify-end gap-2 pt-1 border-t border-slate-100 md:border-0 md:pt-0">
                                    <span class="text-xs font-black text-slate-400 md:hidden uppercase">Grand Total:</span>
                                    <span class="text-2xl font-black text-slate-950 tracking-tight">₹{{ $order->total_final_price }}</span>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="bg-white rounded-3xl border border-slate-200 text-center py-16 text-slate-400 font-bold text-xs space-y-2 select-none shadow-sm">
                            <span class="text-4xl block">🛒</span>
                            <span>You haven't ordered any custom or signature pizzas yet!<br>Add something delicious from the kitchen flow menu deck above.</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        // --- REAL-TIME LIVE DASHBOARD EMAIL FIELD INTERCEPTOR VALIDATOR ---
    const dshEmailField = document.getElementById('dashboardEmailField');
    const dshEmailMsg = document.getElementById('valMsgEmailFeedback');
    const dshSubmitBtn = document.getElementById('btnSyncDetailsSubmit');

    // Cache the initial page load value to bypass database lookups if unchanged
    const dshOriginalEmail = dshEmailField.value.trim();

    dshEmailField.addEventListener('input', async function() {
        const emailValue = this.value.trim();
        
        // Strict Standard Email RFC Format Pattern Matching Expression
        const emailPatternRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Condition A: If input text perfectly matches current session state, clear flags and unlock
        if (emailValue === dshOriginalEmail) {
            dshEmailMsg.classList.add('hidden');
            dshSubmitBtn.removeAttribute('disabled');
            return;
        }

        // Condition B: Clear container if string box gets wiped out completely
        if (emailValue.length === 0) {
            dshEmailMsg.classList.remove('hidden');
            dshEmailMsg.className = "text-[10px] font-bold mt-1.5 text-red-600 animate-pulse";
            dshEmailMsg.innerText = "✕ Email field cannot be empty. Please specify a communication address.";
            dshSubmitBtn.setAttribute('disabled', 'true');
            return;
        }

        // Condition C: Format Checking Constraint Valve
        if (!emailPatternRegex.test(emailValue)) {
            dshEmailMsg.classList.remove('hidden');
            dshEmailMsg.className = "text-[10px] font-bold mt-1.5 text-red-600 animate-pulse";
            dshEmailMsg.innerText = "✕ Invalid Format: Please match standard formatting syntax layout blocks (e.g., user@domain.com).";
            dshSubmitBtn.setAttribute('disabled', 'true');
            return;
        }

        // Condition D: Hit XAMPP Database to inspect if value is already claimed by another row
        try {
            const uniqueResponse = await fetch('/check-field-uniqueness', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json', 
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value 
                },
                body: JSON.stringify({ field: 'email', value: emailValue })
            });
            const dataResult = await uniqueResponse.json();

            dshEmailMsg.classList.remove('hidden');
            
            if (dataResult.available) {
                // Unlock form action controls and append high-impact green confirmation status text
                dshEmailMsg.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                dshEmailMsg.innerText = "✓ Available: This email address is verified and available for updates.";
                dshSubmitBtn.removeAttribute('disabled');
            } else {
                // Lock form execution layers and display bold red collision alert prompts
                dshEmailMsg.className = "text-[10px] font-bold mt-1.5 text-red-600 animate-pulse";
                dshEmailMsg.innerText = "✕ Claimed Error: This specific email address is already bound to another active Club Account.";
                dshSubmitBtn.setAttribute('disabled', 'true');
            }
        } catch (errConnection) { 
            console.error("XAMPP Validation Highway Timeout exception:", errConnection); 
        }
    });

    // --- JAVASCRIPT SECTION: DETAILED COLUMN INPUT EDIT AJAX HANDLING ENGINE ---
    document.getElementById('frmDashboardDetailsSync').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const feedbackAlert = document.getElementById('lblDetailsFormFeedbackMsg');
        const submitBtn = document.getElementById('btnSyncDetailsSubmit');
        
        feedbackAlert.classList.add('hidden');
        submitBtn.setAttribute('disabled', 'true');
        submitBtn.innerText = "Synchronizing Details...";

        try {
            const response = await fetch('/member/profile/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({
                    first_name: this.elements['first_name'].value,
                    last_name: this.elements['last_name'].value,
                    email: this.elements['email'].value,
                    mobile: this.elements['mobile'].value,
                    address: this.elements['address'].value
                })
            });

            const data = await response.json();

            feedbackAlert.classList.remove('hidden');
            if (response.ok && data.success) {
                feedbackAlert.className = "text-[10px] font-bold py-2.5 px-3 rounded-lg border bg-emerald-50 border-emerald-100 text-emerald-600";
                feedbackAlert.innerText = data.message;
                document.querySelector('h2.text-2xl').innerText = `Welcome, ${this.elements['first_name'].value}!`;
            } else {
                feedbackAlert.className = "text-[10px] font-bold py-2.5 px-3 rounded-lg border bg-red-50 border-red-100 text-red-600";
                feedbackAlert.innerText = data.message || "Details update mapping failure.";
            }
        } catch (err) {
            console.error("Profile sync exception:", err);
            feedbackAlert.classList.remove('hidden');
            feedbackAlert.className = "text-[10px] font-bold py-2.5 px-3 rounded-lg border bg-red-50 border-red-100 text-red-600";
            feedbackAlert.innerText = "Connection timeout. Try restarting XAMPP server stacks.";
        } finally {
            submitBtn.removeAttribute('disabled');
            submitBtn.innerText = "Save Profile Updates";
        }
    });

    // --- REAL-TIME LIVE VALIDATION & ASYNC UNIQUENESS LOOKUPS LOOP ---
    const emailField = document.getElementById('dashboardEmailField');
    const phoneField = document.getElementById('dashboardPhoneField');
    const emailMsg = document.getElementById('valMsgEmailFeedback');
    const phoneMsg = document.getElementById('valMsgPhoneFeedback');
    const syncSubmitBtn = document.getElementById('btnSyncDetailsSubmit');

    const originalEmail = emailField.value.trim();
    const originalPhone = phoneField.value.trim();
    document.getElementById('dashboardAddressField').addEventListener('input', function() {
    const msg = document.getElementById('status_dashboard_address');
    const saveBtn = document.getElementById('btnSyncDetailsSubmit');
    msg.classList.remove('hidden');

    if (this.value.trim().length < 10) {
        msg.className = "text-[10px] font-bold mt-1.5 text-red-600 animate-pulse";
        msg.innerText = "✕ Please enter a complete building and street address for Rajkot logistics.";
        saveBtn.setAttribute('disabled', 'true');
    } else {
        msg.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
        msg.innerText = "✓ Valid address layout verified.";
        saveBtn.removeAttribute('disabled');
    }
});


    emailField.addEventListener('input', async function() {
        const val = this.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+\$/;

        if (val === originalEmail) {
            emailMsg.classList.add('hidden');
            syncSubmitBtn.removeAttribute('disabled');
            return;
        }

        if (!emailRegex.test(val)) {
            emailMsg.classList.remove('hidden');
            emailMsg.className = "text-[10px] font-bold mt-1.5 text-red-600";
            emailMsg.innerText = "✕ Invalid email format configuration.";
            syncSubmitBtn.setAttribute('disabled', 'true');
            return;
        }

        try {
            const response = await fetch('/check-field-uniqueness', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value },
                body: JSON.stringify({ field: 'email', value: val })
            });
            const data = await response.json();
            
            emailMsg.classList.remove('hidden');
            if (data.available) {
                emailMsg.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                emailMsg.innerText = "✓ This email address is available.";
                syncSubmitBtn.removeAttribute('disabled');
            } else {
                emailMsg.className = "text-[10px] font-bold mt-1.5 text-red-600";
                emailMsg.innerText = "✕ This email address is already bound to another club account.";
                syncSubmitBtn.setAttribute('disabled', 'true');
            }
        } catch (e) { console.error(e); }
    });

    phoneField.addEventListener('input', async function() {
        const val = this.value.trim();
        const phoneRegex = /^[6-9]\d{9}\$/;

        if (val === originalPhone) {
            phoneMsg.classList.add('hidden');
            syncSubmitBtn.removeAttribute('disabled');
            return;
        }

        if (!phoneRegex.test(val)) {
            phoneMsg.classList.remove('hidden');
            phoneMsg.className = "text-[10px] font-bold mt-1.5 text-red-600";
            phoneMsg.innerText = "✕ Must be a valid 10-digit number starting with 6-9.";
            syncSubmitBtn.setAttribute('disabled', 'true');
            return;
        }

        try {
            const response = await fetch('/check-field-uniqueness', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value },
                body: JSON.stringify({ field: 'mobile', value: val }) // Updated matching field to column: mobile
            });
            const data = await response.json();

            phoneMsg.classList.remove('hidden');
            if (data.available) {
                phoneMsg.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                phoneMsg.innerText = "✓ This mobile number is available.";
                syncSubmitBtn.removeAttribute('disabled');
            } else {
                phoneMsg.className = "text-[10px] font-bold mt-1.5 text-red-600";
                phoneMsg.innerText = "✕ This mobile number is already registered.";
                syncSubmitBtn.setAttribute('disabled', 'true');
            }
        } catch (e) { console.error(e); }
    });

    // --- CLIENT-SIDE TRANSACTION CARDS ADVANCED SORTING VALVE MECHANICS ---
    function public_function_executeHistorySorting() {
        const sortModeToken = document.getElementById('dropdownOrderSortValve').value;
        const timelineCanvas = document.getElementById('targetOrdersTimelineContainer');
        const orderCardsArray = Array.from(timelineCanvas.getElementsByClassName('historical-order-card'));

        if (orderCardsArray.length === 0) return;

        orderCardsArray.sort((cardA, cardB) => {
            const timeA = parseInt(cardA.getAttribute('data-timestamp'));
            const timeB = parseInt(cardB.getAttribute('data-timestamp'));
            const priceA = parseInt(cardA.getAttribute('data-price'));
            const priceB = parseInt(cardB.getAttribute('data-price'));

            switch(sortModeToken) {
                case 'date-new': return timeB - timeA;
                case 'date-old': return timeA - timeB;
                case 'price-high': return priceB - priceA;
                case 'price-low': return priceA - priceB;
                default: return timeB - timeA;
            }
        });

        timelineCanvas.innerHTML = "";
        orderCardsArray.forEach(sortedCard => timelineCanvas.appendChild(sortedCard));
    }
</script>
@endsection
