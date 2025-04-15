<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">

            <!-- Profile Header -->
            <div class="relative h-48 bg-gradient-to-r from-[#7badef] to-[#057e5b] flex items-center justify-center">
                <img src="
                @if($customer->profile->profile_picture)
                {{ asset('uploads/customers/' . ($customer->profile->profile_picture)) }}
                @else
                {{   asset('images/demo_user.png') }}
                @endif
                "
                    alt=" Profile Picture"
                    class="w-32 h-32 rounded-full border-2 border-white shadow-lg absolute -bottom-16">
            </div>

            <!-- Profile Content -->
            <div class="p-6 mt-12">
                <!-- Name and Bio -->
                <div class="flex items-center justify-center space-x-1">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $customer->fullname }}</h1>
                    @if($customer->profile->is_verified == 1)
                    <svg data-tooltip-target="verified-tooltip" data-tooltip-trigger="hover" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="#008c47" d="M12.65 3.797c.487.131.908.458 1.42.854l.297.23c.243.187.301.23.359.261a1 1 0 0 0 .196.081c.063.019.134.03.438.07l.373.047c.642.082 1.17.149 1.607.4c.383.22.7.537.92.92c.251.436.318.965.4 1.607l.048.373c.039.304.05.375.069.438q.03.102.08.196c.032.058.075.116.262.359l.23.297c.396.512.723.933.854 1.42a2.5 2.5 0 0 1 0 1.3c-.131.487-.458.908-.854 1.42l-.23.297c-.187.243-.23.301-.261.359q-.051.094-.081.196c-.019.063-.03.134-.07.438l-.047.373c-.082.642-.149 1.17-.4 1.607a2.5 2.5 0 0 1-.92.92c-.436.251-.965.318-1.607.4l-.373.048c-.304.039-.375.05-.438.069q-.102.03-.196.08c-.058.032-.116.075-.359.262l-.297.23c-.512.396-.933.723-1.42.854a2.5 2.5 0 0 1-1.3 0c-.487-.131-.908-.458-1.42-.854l-.297-.23c-.243-.187-.301-.23-.359-.261a1 1 0 0 0-.196-.081c-.063-.019-.134-.03-.438-.07l-.373-.047c-.642-.082-1.17-.149-1.607-.4a2.5 2.5 0 0 1-.92-.92c-.251-.436-.318-.965-.4-1.607l-.048-.373c-.039-.304-.05-.375-.069-.438a1 1 0 0 0-.08-.196c-.032-.058-.075-.116-.262-.359l-.23-.297c-.396-.512-.723-.933-.854-1.42a2.5 2.5 0 0 1 0-1.3c.131-.487.458-.908.854-1.42l.23-.297c.187-.243.23-.301.261-.359a1 1 0 0 0 .081-.196c.019-.063.03-.134.07-.438l.047-.373c.082-.642.149-1.17.4-1.607a2.5 2.5 0 0 1 .92-.92c.436-.251.965-.318 1.607-.4l.373-.048c.304-.039.375-.05.438-.069a1 1 0 0 0 .196-.08c.058-.032.116-.075.359-.262l.297-.23c.512-.396.933-.723 1.42-.854a2.5 2.5 0 0 1 1.3 0m3.057 5.496a1 1 0 0 0-1.414 0L11 12.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414" />
                    </svg>
                    @else
                    <svg data-tooltip-target="non-verified-tooltip" data-tooltip-trigger="hover" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="#e31025" d="M8.15 21.75L6.7 19.3l-2.75-.6q-.375-.075-.6-.387t-.175-.688L3.45 14.8l-1.875-2.15q-.25-.275-.25-.65t.25-.65L3.45 9.2l-.3-3.25L2.1 4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l17 17q.275.275.275.7t-.275.7t-.7.275t-.7-.275L17 19.8l-1.15 1.95q-.2.325-.55.437t-.7-.037l-2.6-1.1l-2.6 1.1q-.35.15-.7.037t-.55-.437m12.4-6.95l.175 1.875q.05.35-.275.5t-.575-.1L14.65 11.85l1.25-1.25q.3-.3.288-.7t-.288-.7q-.3-.3-.712-.312t-.713.287l-1.25 1.25l-5.675-5.7q-.25-.25-.287-.575t.137-.625l.75-1.275q.2-.325.55-.437t.7.037l2.6 1.1l2.6-1.1q.35-.15.7-.038t.55.438L17.3 4.7l2.75.6q.375.075.6.388t.175.687L20.55 9.2l1.875 2.15q.25.275.25.65t-.25.65zM8.1 12.7l2.15 2.15q.3.3.7.3t.7-.3l.2-.2l-1.275-1.275L8.3 11.1l-.1.1l-.1.1q-.3.3-.3.7t.3.7" />
                    </svg>
                    @endif

                    <div id="verified-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                        This user is verified through email and phone number.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <div id="non-verified-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                        This user is not yet verified through email or phone.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                </div>


                @if($customer->profile->bio)
                <p class="text-gray-600 text-justify mt-2">{{ ($customer->profile->bio) }}</p>
                @endif

                <!-- Key Information -->
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6b7280">
                            <path d="M19 4H5a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3m0 2l-6.5 4.47a1 1 0 0 1-1 0L5 6Z" stroke-width="0.5" stroke="#3d3d3d" />
                        </svg>
                        <span class="text-gray-700">{{ $customer->email }}</span>
                    </div>

                    @if($customer->profile->phone)
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6b7280">
                            <path stroke="#3d3d3d" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M8 3c0.5 0 2.5 4.5 2.5 5c0 1 -1.5 2 -2 3c-0.5 1 0.5 2 1.5 3c0.39 0.39 2 2 3 1.5c1 -0.5 2 -2 3 -2c0.5 0 5 2 5 2.5c0 2 -1.5 3.5 -3 4c-1.5 0.5 -2.5 0.5 -4.5 0c-2 -0.5 -3.5 -1 -6 -3.5c-2.5 -2.5 -3 -4 -3.5 -6c-0.5 -2 -0.5 -3 0 -4.5c0.5 -1.5 2 -3 4 -3Z" />
                        </svg>
                        <span class="text-gray-700">{{ $customer->profile->phone }}</span>
                    </div>
                    @endif

                    @if($customer->profile->dob)
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6b7280">
                            <path d="M7.75 2.5a.75.75 0 0 0-1.5 0v1.58c-1.44.115-2.384.397-3.078 1.092c-.695.694-.977 1.639-1.093 3.078h19.842c-.116-1.44-.398-2.384-1.093-3.078c-.694-.695-1.639-.977-3.078-1.093V2.5a.75.75 0 0 0-1.5 0v1.513C15.585 4 14.839 4 14 4h-4c-.839 0-1.585 0-2.25.013z" stroke-width="0.5" stroke="#3d3d3d" />
                            <path fill-rule="evenodd" d="M2 12c0-.839 0-1.585.013-2.25h19.974C22 10.415 22 11.161 22 12v2c0 3.771 0 5.657-1.172 6.828S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.172S2 17.771 2 14zm15 2a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2m-4-5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m0 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-6-3a1 1 0 1 0 0-2a1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2a1 1 0 0 0 0 2" clip-rule="evenodd" stroke-width="0.5" stroke="#3d3d3d" />
                        </svg>
                        <?php
                        $dob = \Carbon\Carbon::parse($customer->profile->dob);
                        $age = $dob->diffInYears(\Carbon\Carbon::now());
                        ?>
                        <span class="text-gray-700">{{ round($age) }} years old</span>
                    </div>
                    @endif

                    @if($customer->profile->gender)
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6b7280">
                            <path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2S7.5 4.019 7.5 6.5M20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1z" stroke-width="0.5" stroke="#3d3d3d" />
                        </svg>
                        <span class="text-gray-700">{{ ucfirst($customer->profile->gender) }}</span>
                    </div>
                    @endif

                    @if($customer->profile->timezone)
                    <div class="flex items-center space-x-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6b7280">
                            <path d="M12.25 2c-5.514 0-10 4.486-10 10s4.486 10 10 10s10-4.486 10-10s-4.486-10-10-10M18 13h-6.75V6h2v5H18z" stroke-width="0.5" stroke="#3d3d3d" />
                        </svg>
                        <span class="text-gray-700">{{ $customer->profile->timezone }}</span>
                    </div>
                    @endif

                    @if($customer->profile->address && $customer->profile->country)
                    <div class="flex items-center space-x-2 col-span-2">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6b7280">
                            <path fill-rule="evenodd" d="M20.48 7.519c1.214-2.55-1.448-5.213-3.999-3.999L4.822 9.072c-2.39 1.138-2.242 4.589.237 5.518l2.739 1.027a1 1 0 0 1 .585.585l1.027 2.74c.93 2.478 4.38 2.626 5.518.236z" clip-rule="evenodd" stroke-width="0.5" stroke="#3d3d3d" />
                        </svg>
                        <span class="text-gray-700">{{ $customer->profile->address }}, {{ $customer->profile->country }}</span>
                    </div>
                    @endif
                </div>

                <!-- Social Links -->
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                    <div class="text-gray-700 font-medium">My Socials:</div>
                    <div class="flex items-center space-x-2">
                        <!-- Website -->
                        <a href="{{ $customer->profile->website ?? "#" }}"
                            @if(!$customer->profile->website)
                            target="_self"
                            @else
                            target="_blank"
                            @endif
                            class="text-gray-500 hover:text-blue-500 transition duration-300 flex items-center gap-1">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2M14.34 14H9.66c-.1-.66-.16-1.32-.16-2s.06-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2M12 19.96c-.83-1.2-1.5-2.53-1.91-3.96h3.82c-.41 1.43-1.08 2.76-1.91 3.96M8 8H5.08A7.92 7.92 0 0 1 9.4 4.44C8.8 5.55 8.35 6.75 8 8m-2.92 8H8c.35 1.25.8 2.45 1.4 3.56A8 8 0 0 1 5.08 16m-.82-2C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2M12 4.03c.83 1.2 1.5 2.54 1.91 3.97h-3.82c.41-1.43 1.08-2.77 1.91-3.97M18.92 8h-2.95a15.7 15.7 0 0 0-1.38-3.56c1.84.63 3.37 1.9 4.33 3.56M12 2C6.47 2 2 6.5 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" stroke-width="0.5" stroke="#3d3d3d" />
                            </svg>
                            <span class="hidden sm:inline">Website</span>
                        </a>

                        <!-- LinkedIn -->
                        <a href="{{ $customer->profile->linkedin ?? "#" }}"
                            @if(!$customer->profile->linkedin)
                            target="_self"
                            @else
                            target="_blank"
                            @endif
                            class="text-gray-500 hover:text-blue-500 transition duration-300 flex items-center gap-1">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248c-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586c.173-.431.568-.878 1.232-.878c.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252c-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                            </svg>
                            <span class="hidden sm:inline">LinkedIn</span>
                        </a>

                        <!-- Twitter -->
                        <a href="{{ $customer->profile->twitter ?? "#" }}"
                            @if(!$customer->profile->twitter)
                            target="_self"
                            @else
                            target="_blank"
                            @endif
                            class="text-gray-500 hover:text-blue-500 transition duration-300 flex items-center gap-1">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1536" fill="currentColor">
                                <path d="M1280 482q-56 25-121 34q68-40 93-117q-65 38-134 51q-61-66-153-66q-87 0-148.5 61.5T755 594q0 29 5 48q-129-7-242-65T326 422q-29 50-29 106q0 114 91 175q-47-1-100-26v2q0 75 50 133.5T461 885q-29 8-51 8q-13 0-39-4q21 63 74.5 104t121.5 42q-116 90-261 90q-26 0-50-3q148 94 322 94q112 0 210-35.5t168-95t120.5-137t75-162T1176 618q0-18-1-27q63-45 105-109m256-194v960q0 119-84.5 203.5T1248 1536H288q-119 0-203.5-84.5T0 1248V288Q0 169 84.5 84.5T288 0h960q119 0 203.5 84.5T1536 288" />
                            </svg>
                            <span class="hidden sm:inline">Twitter</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>