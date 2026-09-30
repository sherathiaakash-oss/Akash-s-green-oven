@extends('layouts.app')

@section('content')
    <div class="min-h-screen py-16 px-4 bg-slate-900 overflow-hidden relative flex items-center justify-center">
        <!-- Ambient Backdrop Underlays -->
        <div
            class="absolute inset-0 opacity-15 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-size-[4rem_4rem]">
        </div>
        <div class="absolute top-1/2 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Master Form Card Container Wrapper -->
        <div
            class="relative bg-white rounded-3xl shadow-2xl border border-slate-100 w-full max-w-2xl overflow-hidden transform transition-all duration-300 z-10">

            <!-- Top Branding Stripe Header Banner -->
            <div
                class="bg-slate-950 px-8 py-8 border-b-4 border-red-600 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-black tracking-tight text-white uppercase">Join The Green Oven Club</h1>
                    <p class="text-slate-400 text-xs mt-1 font-medium leading-relaxed">Create your permanent club profile to
                        track order milestones and unlock dynamic reward multipliers.</p>
                </div>
                <div
                    class="bg-amber-500/10 border border-amber-500/30 text-amber-400 px-4 py-2 rounded-xl text-center shrink-0 select-none">
                    <span class="block text-xs font-black uppercase tracking-wider">Club Perk</span>
                    <span class="text-[10px] font-bold text-slate-300">Authentic Slices</span>
                </div>
            </div>

            <!-- Form Content Body Wrapper -->
            <form id="regClubForm" action="/register-membership" method="POST" class="p-8 sm:p-10 space-y-6">
                @csrf

                <!-- Grid Row 1: Mandatory Full Name Slots Split Columns -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">First Name
                            <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">👤</span>
                            <input type="text" name="first_name" placeholder="Enter first name" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Last Name
                            <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">👤</span>
                            <input type="text" name="last_name" placeholder="Enter last name" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm">
                        </div>
                    </div>
                </div>
                <!-- Grid Row 2: Unique User ID Slot -->
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Unique User ID
                        <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">🆔</span>
                        <input type="text" id="reg_user_id" name="user_id" placeholder="Choose a unique login ID" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm">
                    </div>
                    <div id="status_user_id" class="text-[10px] font-bold mt-1.5 hidden"></div>
                </div>

                <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-4 flex items-start space-x-3 select-none">
                    <span class="text-xl mt-0.5 select-none">💡</span>
                    <div class="flex flex-col">
                        <span class="text-xs font-black text-blue-900 uppercase tracking-wide">Identity Contact Rule</span>
                        <p class="text-[11px] text-blue-700 font-medium leading-relaxed mt-0.5">
                            To protect your profile, you must provide <span class="font-bold">either an Email Address, a
                                Mobile Number, or both</span>. You can safely leave one blank if you prefer.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Email
                            Address</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">✉️</span>
                            <input type="email" id="reg_email" name="email" placeholder="name@example.com"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-sm">
                        </div>
                        <div id="status_email" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Confirm
                            Email Address</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">✉️</span>
                            <input type="email" id="reg_confirm_email" placeholder="Re-enter email address"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-sm">
                        </div>
                        <div id="status_confirm_email" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    </div>
                </div>
                <!-- Grid Row 5: Mobile Number Field Slot -->
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Mobile Phone
                        Number</label>
                    <div class="relative">
                        <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">📱</span>
                        <input type="tel" id="reg_mobile" name="mobile" placeholder="10-digit phone number"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-sm">
                    </div>
                    <div id="status_mobile" class="text-[10px] font-bold mt-1.5 hidden"></div>
                </div>

                <!-- MEMBER REGISTRATION MANDATORY TEXTAREA ADDRESS INPUT BLOCK WITH LIVE STATUS LOG PORTS -->
                <div class="block w-full">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Mandatory
                        Delivery Address <span class="text-red-500">*</span></label>
                    <div class="relative flex items-start">
                        <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm z-10">📍</span>
                        <textarea id="reg_address" name="address" rows="3" required
                            placeholder="Enter your full building name, house number, street details, and landmark in Rajkot..."
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm block relative z-0 resize-none leading-relaxed">{{ old('address') }}</textarea>
                    </div>
                    <!-- Live Client-side Validation Feedback Message Slot Box -->
                    <div id="status_address" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    @error('address')
                        <span class="text-[10px] font-bold mt-1.5 text-red-600 block">✕ {{ $message }}</span>
                    @enderror
                </div>

                <!-- Grid Row 6: Passwords Verification Split Columns Group -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Secure
                            Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">🔒</span>
                            <input type="password" id="reg_password" name="password" placeholder="Min. 6 characters"
                                required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm">
                        </div>
                        <div id="status_password_length" class="text-[10px] font-bold mt-1.5 text-red-600 hidden">Password
                            must be at least 6 characters long.</div>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Confirm
                            Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-3.5 text-slate-400 select-none text-sm">🔒</span>
                            <input type="password" id="reg_confirm_password" placeholder="Confirm your password" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3.5 pl-11 pr-4 font-bold text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-sm">
                        </div>
                        <div id="status_confirm_password" class="text-[10px] font-bold mt-1.5 hidden"></div>
                    </div>
                </div>

                <!-- Bottom Action Controls Hub -->
                <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs font-bold text-slate-500 text-center sm:text-left leading-normal">
                        Already registered?
                        <button type="button" onclick="openAuthModal()"
                            class="text-red-600 hover:text-red-700 underline font-black uppercase cursor-pointer tracking-wider text-xs ml-1">Log
                            In Here</button>
                    </p>
                    <button type="submit" id="regSubmitBtn"
                        class="w-full sm:w-auto bg-red-600 hover:bg-red-700 text-white font-black uppercase tracking-wider text-sm px-10 py-4 rounded-xl shadow-lg shadow-red-600/20 transform hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer text-center disabled:bg-slate-300 disabled:text-slate-500 disabled:cursor-not-allowed disabled:shadow-none">
                        Activate Membership ✨
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // UI DOM Input References
            const form = document.getElementById("regClubForm");
            const userIdInput = document.getElementById("reg_user_id");
            const emailInput = document.getElementById("reg_email");
            const confirmEmailInput = document.getElementById("reg_confirm_email");
            const mobileInput = document.getElementById("reg_mobile");
            const addressInput = document.getElementById("reg_address"); // Added target anchor element
            const passwordInput = document.getElementById("reg_password");
            const confirmPasswordInput = document.getElementById("reg_confirm_password");
            const submitBtn = document.getElementById("regSubmitBtn");

            // UI Feedback Text Elements
            const statusUserId = document.getElementById("status_user_id");
            const statusEmail = document.getElementById("status_email");
            const statusConfirmEmail = document.getElementById("status_confirm_email");
            const statusMobile = document.getElementById("status_mobile");
            const statusAddress = document.getElementById("status_address"); // Added target feedback text row
            const statusPasswordLength = document.getElementById("status_password_length");
            const statusConfirmPassword = document.getElementById("status_confirm_password");

            // Unified Function to manage submit button state based on full validation
            //  REPLACE WITH THIS CORRECT DEFINITION:
            function checkFormValidity() {
                // Safely look up input node fields directly by checking their input element references
                const firstNameInput = form.querySelector('input[name="first_name"]');
                const lastNameInput = form.querySelector('input[name="last_name"]');

                const isFirstNameFilled = firstNameInput && firstNameInput.value.trim().length > 0;
                const isLastNameFilled = lastNameInput && lastNameInput.value.trim().length > 0;

                const userIdFilledAndValid = userIdInput.value.trim().length >= 3 && !statusUserId.classList.contains('text-red-600') && statusUserId.innerText.includes('✓');
                const passwordLengthValid = passwordInput.value.length >= 6;
                const passwordsMatch = passwordInput.value === confirmPasswordInput.value && passwordLengthValid;

                // Enforce address validation metric constraints directly inside button states checklist
                const isAddressValid = addressInput.value.trim().length >= 10 && !statusAddress.classList.contains('text-red-600');

                // Flexible identity constraint rule verification
                const hasEmail = emailInput.value.trim().length > 0;
                const hasMobile = mobileInput.value.trim().length > 0;
                const dynamicContactProvided = hasEmail || hasMobile;

                let emailStateValid = true;
                if (hasEmail) {
                    emailStateValid = (emailInput.value === confirmEmailInput.value) && !statusEmail.classList.contains('text-red-600') && !statusConfirmEmail.classList.contains('text-red-600');
                }

                let mobileStateValid = true;
                if (hasMobile) {
                    mobileStateValid = /^\d{10}$/.test(mobileInput.value) && !statusMobile.classList.contains('text-red-600');
                }

                if (isFirstNameFilled && isLastNameFilled && userIdFilledAndValid && passwordsMatch && dynamicContactProvided && emailStateValid && mobileStateValid && isAddressValid) {
                    submitBtn.removeAttribute("disabled");
                } else {
                    submitBtn.setAttribute("disabled", "true");
                }
            }

            // Helper function to handle async unique check calls directly into XAMPP
            async function verifyUniqueness(field, value, outputElement) {
                if (value.trim().length === 0) {
                    outputElement.classList.add("hidden");
                    return true;
                }
                try {
                    const response = await fetch('/check-field-uniqueness', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify({ field: field, value: value })
                    });
                    const data = await response.json();

                    outputElement.classList.remove("hidden");
                    if (data.available) {
                        outputElement.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                        outputElement.innerText = "✓ Available and verified inside database records.";
                        return true;
                    } else {
                        outputElement.className = "text-[10px] font-bold mt-1.5 text-red-600";
                        outputElement.innerText = "✕ Already claimed by another account. Please select a unique identifier.";
                        return false;
                    }
                } catch (err) {
                    console.error("Database connection failure:", err);
                    return false;
                }
            }
            // --- LIVE ADAPTIVE TEXTAREA ADDRESS ACCORDANCE VALIDATOR ---
            addressInput.addEventListener("input", function () {
                const textValue = addressInput.value.trim();
                statusAddress.classList.remove("hidden");

                if (textValue.length === 0) {
                    statusAddress.classList.add("hidden");
                } else if (textValue.length < 10) {
                    statusAddress.className = "text-[10px] font-bold mt-1.5 text-red-600 animate-pulse";
                    statusAddress.innerText = "✕ Incomplete Details: Please enter your complete building name, flat number, and street in Rajkot (Min. 10 characters).";
                } else {
                    statusAddress.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                    statusAddress.innerText = "✓ Valid Structure verified for delivery dispatching loops.";
                }
                checkFormValidity();
            });

            // --- ASYNC DATABASE CHECK HANDLERS ---
            userIdInput.addEventListener("input", async () => {
                if (userIdInput.value.trim().length < 3) {
                    statusUserId.classList.remove("hidden");
                    statusUserId.className = "text-[10px] font-bold mt-1.5 text-red-600";
                    statusUserId.innerText = "User ID must be at least 3 characters long.";
                    checkFormValidity();
                    return;
                }
                await verifyUniqueness('user_id', userIdInput.value, statusUserId);
                checkFormValidity();
            });

            emailInput.addEventListener("input", async () => {
                const emailValue = emailInput.value.trim();
                if (emailValue.length === 0) {
                    statusEmail.classList.add("hidden");
                    statusConfirmEmail.classList.add("hidden");
                    confirmEmailInput.value = "";
                    checkFormValidity();
                    return;
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailValue)) {
                    statusEmail.classList.remove("hidden");
                    statusEmail.className = "text-[10px] font-bold mt-1.5 text-red-600";
                    statusEmail.innerText = "✕ Invalid format";
                    checkFormValidity();
                    return;
                }

                await verifyUniqueness('email', emailValue, statusEmail);
                if (confirmEmailInput.value.trim().length > 0) {
                    confirmEmailInput.dispatchEvent(new Event('input'));
                }
                checkFormValidity();
            });

            mobileInput.addEventListener("input", async () => {
                const mobileValue = mobileInput.value.trim();
                if (mobileValue.length === 0) {
                    statusMobile.classList.add("hidden");
                    checkFormValidity();
                    return;
                }
                if (!/^\d{10}$/.test(mobileValue)) {
                    statusMobile.classList.remove("hidden");
                    statusMobile.className = "text-[10px] font-bold mt-1.5 text-red-600";
                    statusMobile.innerText = "Mobile number must be exactly 10 numeric digits.";
                    checkFormValidity();
                    return;
                }
                await verifyUniqueness('mobile', mobileValue, statusMobile);
                checkFormValidity();
            });

            // --- CLIENT-SIDE MATCH CHECK HANDLERS ---
            confirmEmailInput.addEventListener("input", () => {
                if (emailInput.value.trim().length === 0) {
                    statusConfirmEmail.classList.add("hidden");
                    checkFormValidity();
                    return;
                }
                statusConfirmEmail.classList.remove("hidden");
                if (emailInput.value === confirmEmailInput.value) {
                    statusConfirmEmail.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                    statusConfirmEmail.innerText = "✓ Email entries match perfectly.";
                } else {
                    statusConfirmEmail.className = "text-[10px] font-bold mt-1.5 text-red-600";
                    statusConfirmEmail.innerText = "✕ Email fields do not match.";
                }
                checkFormValidity();
            });

            passwordInput.addEventListener("input", () => {
                if (passwordInput.value.length > 0 && passwordInput.value.length < 6) {
                    statusPasswordLength.classList.remove("hidden");
                } else {
                    statusPasswordLength.classList.add("hidden");
                }
                if (confirmPasswordInput.value.length > 0) {
                    confirmPasswordInput.dispatchEvent(new Event('input'));
                }
                checkFormValidity();
            });

            confirmPasswordInput.addEventListener("input", () => {
                if (confirmPasswordInput.value.trim().length === 0) {
                    statusConfirmPassword.classList.add("hidden");
                    checkFormValidity();
                    return;
                }
                statusConfirmPassword.classList.remove("hidden");
                if (passwordInput.value === confirmPasswordInput.value) {
                    if (passwordInput.value.length >= 6) {
                        statusConfirmPassword.className = "text-[10px] font-bold mt-1.5 text-emerald-600";
                        statusConfirmPassword.innerText = "✓ Passwords match perfectly.";
                    } else {
                        statusConfirmPassword.className = "text-[10px] font-bold mt-1.5 text-red-600";
                        statusConfirmPassword.innerText = "Password must be at least 6 characters.";
                    }
                } else {
                    statusConfirmPassword.className = "text-[10px] font-bold mt-1.5 text-red-600";
                    statusConfirmPassword.innerText = "✕ Passwords do not match.";
                }
                checkFormValidity();
            });

            // Run verification on casual field changes
            document.querySelectorAll('input, textarea').forEach(input => {
                input.addEventListener('change', checkFormValidity);
            });
        });
    </script>
@endsection