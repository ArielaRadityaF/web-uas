<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleepy Panda - User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #2d3561 0%, #1a1d3a 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen text-white p-3 sm:p-6">
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 mb-6 sm:mb-8">
        <!-- Total Users -->
        <div class="bg-[#3a4068] p-4 sm:p-6 rounded-xl sm:rounded-2xl">
            <p class="text-xs sm:text-sm text-gray-300 mb-2 sm:mb-4 font-medium">Total Users</p>
            <div class="flex items-center gap-2 sm:gap-4">
                <svg class="w-8 h-8 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <h2 class="text-3xl sm:text-5xl font-bold">4500</h2>
            </div>
        </div>
        
        <!-- Active Users -->
        <div class="bg-[#3a4068] p-4 sm:p-6 rounded-xl sm:rounded-2xl">
            <p class="text-xs sm:text-sm text-gray-300 mb-2 sm:mb-4 font-medium">Active Users</p>
            <div class="flex items-center gap-2 sm:gap-4">
                <svg class="w-8 h-8 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <h2 class="text-3xl sm:text-5xl font-bold">3500</h2>
            </div>
        </div>
        
        <!-- New Users -->
        <div class="bg-[#3a4068] p-4 sm:p-6 rounded-xl sm:rounded-2xl">
            <p class="text-xs sm:text-sm text-gray-300 mb-2 sm:mb-4 font-medium">New Users</p>
            <div class="flex items-center gap-2 sm:gap-4">
                <div class="relative">
                    <svg class="w-8 h-8 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 text-2xl sm:text-3xl font-bold">+</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-bold">500</h2>
            </div>
        </div>
        
        <!-- Inactive Users -->
        <div class="bg-[#3a4068] p-4 sm:p-6 rounded-xl sm:rounded-2xl">
            <p class="text-xs sm:text-sm text-gray-300 mb-2 sm:mb-4 font-medium">Inactive Users</p>
            <div class="flex items-center gap-2 sm:gap-4">
                <div class="relative">
                    <svg class="w-8 h-8 sm:w-12 sm:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-10 sm:w-14 h-0.5 bg-white rotate-45"></div>
                    </div>
                </div>
                <h2 class="text-3xl sm:text-5xl font-bold">500</h2>
            </div>
        </div>
    </div>

    <!-- Search and Filter Bar -->
    <div class="bg-[#3a4068] p-3 sm:p-5 rounded-xl sm:rounded-2xl mb-4 sm:mb-6">
        <div class="flex flex-col gap-3 sm:gap-4">
            <!-- Search Input -->
            <div class="relative w-full">
                <svg class="w-4 h-4 sm:w-5 sm:h-5 absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Search by name, email, or ID" 
                    class="w-full bg-[#2d3561] text-white rounded-lg sm:rounded-xl py-2.5 sm:py-3 pl-10 sm:pl-12 pr-3 sm:pr-4 text-sm sm:text-base placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <!-- Buttons -->
            <div class="flex gap-2 sm:gap-3">
                <button class="flex items-center justify-center gap-2 px-4 sm:px-6 py-2.5 sm:py-3 bg-[#2d3561] rounded-lg sm:rounded-xl text-white hover:bg-[#252a4a] transition flex-1 sm:flex-initial text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V20l-4-2v-5.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    <span class="hidden sm:inline">Sort by</span>
                    <span class="sm:hidden">Sort</span>
                </button>
                <button class="flex items-center justify-center gap-2 px-4 sm:px-6 py-2.5 sm:py-3 bg-[#2d3561] rounded-lg sm:rounded-xl text-white hover:bg-[#252a4a] transition flex-1 sm:flex-initial text-sm sm:text-base">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    <span>Refresh</span>
                </button>
            </div>
        </div>
    </div>

    <!-- User Table -->
    <div class="bg-[#3a4068] rounded-xl sm:rounded-2xl overflow-hidden">
        <!-- Desktop Table View -->
        <div class="hidden lg:block">
            <!-- Table Header -->
            <div class="grid grid-cols-5 gap-4 p-6 border-b border-gray-600">
                <div class="text-gray-300 font-semibold text-lg">User</div>
                <div class="text-gray-300 font-semibold text-lg">Contact</div>
                <div class="text-gray-300 font-semibold text-lg">Sleep Status</div>
                <div class="text-gray-300 font-semibold text-lg">Status</div>
                <div class="text-gray-300 font-semibold text-lg">Last Active</div>
            </div>
            
            <!-- Table Rows -->
            <!-- Row 1 - Active -->
            <div class="grid grid-cols-5 gap-4 p-6 border-b border-gray-700 hover:bg-white/5 transition items-center">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-[#2d3561] flex items-center justify-center border-2 border-gray-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-base">Alfonso de</p>
                        <p class="text-gray-400 text-sm">ID #418230</p>
                    </div>
                </div>
                
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-white text-sm">Alfonso.de@gmail.com</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-white text-sm">+62123456789</span>
                    </div>
                </div>
                
                <div>
                    <p class="text-white font-medium">Avg. Sleep: 7.2h</p>
                    <p class="text-gray-400 text-sm">Quality: 85%</p>
                </div>
                
                <div>
                    <span class="inline-block bg-blue-600 text-white text-sm px-5 py-2 rounded-full font-semibold">Active</span>
                </div>
                
                <div class="text-white">
                    <p>2024-02-01</p>
                    <p>14:30</p>
                </div>
            </div>

            <!-- Row 2 - Not Active -->
            <div class="grid grid-cols-5 gap-4 p-6 hover:bg-white/5 transition items-center">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-[#2d3561] flex items-center justify-center border-2 border-gray-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-base">Alfonso de</p>
                        <p class="text-gray-400 text-sm">ID #418230</p>
                    </div>
                </div>
                
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-white text-sm">Alfonso.de@gmail.com</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-white text-sm">+62123456789</span>
                    </div>
                </div>
                
                <div>
                    <p class="text-white font-medium">Avg. Sleep: 1.2h</p>
                    <p class="text-gray-400 text-sm">Quality: 20%</p>
                </div>
                
                <div>
                    <span class="inline-block bg-red-500 text-white text-sm px-5 py-2 rounded-full font-semibold">Not Active</span>
                </div>
                
                <div class="text-white">
                    <p>2024-02-01</p>
                    <p>14:30</p>
                </div>
            </div>
        </div>

        <!-- Mobile/Tablet Card View -->
        <div class="lg:hidden">
            <!-- Card 1 - Active -->
            <div class="p-4 sm:p-5 border-b border-gray-700 hover:bg-white/5 transition">
                <div class="flex items-start gap-3 sm:gap-4 mb-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-[#2d3561] flex items-center justify-center border-2 border-gray-500 flex-shrink-0">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <div>
                                <p class="text-white font-semibold text-sm sm:text-base">Alfonso de</p>
                                <p class="text-gray-400 text-xs sm:text-sm">ID #418230</p>
                            </div>
                            <span class="inline-block bg-blue-600 text-white text-xs sm:text-sm px-3 sm:px-4 py-1 sm:py-1.5 rounded-full font-semibold whitespace-nowrap">Active</span>
                        </div>
                        
                        <div class="space-y-1.5 sm:space-y-2 mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-white text-xs sm:text-sm truncate">Alfonso.de@gmail.com</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span class="text-white text-xs sm:text-sm">+62123456789</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-3 sm:gap-4 text-xs sm:text-sm">
                            <div>
                                <span class="text-gray-400">Avg. Sleep:</span>
                                <span class="text-white font-medium ml-1">7.2h</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Quality:</span>
                                <span class="text-white font-medium ml-1">85%</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Last Active:</span>
                                <span class="text-white font-medium ml-1">2024-02-01 14:30</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 - Not Active -->
            <div class="p-4 sm:p-5 hover:bg-white/5 transition">
                <div class="flex items-start gap-3 sm:gap-4 mb-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-[#2d3561] flex items-center justify-center border-2 border-gray-500 flex-shrink-0">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2 mb-2">
                            <div>
                                <p class="text-white font-semibold text-sm sm:text-base">Alfonso de</p>
                                <p class="text-gray-400 text-xs sm:text-sm">ID #418230</p>
                            </div>
                            <span class="inline-block bg-red-500 text-white text-xs sm:text-sm px-3 sm:px-4 py-1 sm:py-1.5 rounded-full font-semibold whitespace-nowrap">Not Active</span>
                        </div>
                        
                        <div class="space-y-1.5 sm:space-y-2 mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-white text-xs sm:text-sm truncate">Alfonso.de@gmail.com</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <span class="text-white text-xs sm:text-sm">+62123456789</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-3 sm:gap-4 text-xs sm:text-sm">
                            <div>
                                <span class="text-gray-400">Avg. Sleep:</span>
                                <span class="text-white font-medium ml-1">1.2h</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Quality:</span>
                                <span class="text-white font-medium ml-1">20%</span>
                            </div>
                            <div>
                                <span class="text-gray-400">Last Active:</span>
                                <span class="text-white font-medium ml-1">2024-02-01 14:30</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>