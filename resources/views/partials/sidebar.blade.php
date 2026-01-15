<!-- Sidebar Overlay -->
<div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity"></div>

<!-- Sidebar -->
<aside id="sidebar-menu" class="fixed md:relative inset-y-0 left-0 bg-[#232336] border-r border-sidebarBorder z-50 flex flex-col h-full transition-all duration-300 ease-in-out
    w-64 -translate-x-full md:translate-x-0 md:w-64 overflow-hidden">
    
    <!-- Header -->
    <div class="h-20 flex items-center justify-center border-b border-sidebarBorder gap-3 whitespace-nowrap px-4">
        <img src="{{ asset('image/logo.png') }}" alt="Sleepy Panda" class="w-8 h-8 object-contain shrink-0">
        <h1 class="text-xl font-bold tracking-wider text-white sidebar-text transition-opacity duration-300">Sleepy Panda</h1>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-6 px-4 space-y-2">
        
        <!-- Dashboard -->
        <button id="btn-dashboard" onclick="switchTab('dashboard')" 
            class="nav-btn block w-full border border-gray-500 bg-white/10 text-white rounded-2xl py-3 text-center text-sm font-medium transition duration-200 whitespace-nowrap">
            Dashboard
        </button>

        <!-- Jurnal -->
        <button id="btn-jurnal" onclick="switchTab('jurnal')" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap">
            Jurnal
        </button>

        <!-- Report -->
        <button id="btn-report" onclick="switchTab('report')" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap">
            Report
        </button>

        <!-- Database User (Parent) -->
        <button id="btn-database-parent" onclick="toggleSubmenu('submenu-database')" 
            class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 px-4 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap relative">
            Database User
            <span id="dropdown-icon" class="absolute right-4 top-1/2 -translate-y-1/2 text-xs opacity-50 transition-transform duration-300">▼</span>
        </button>

        <!-- Submenu Database User -->
        <div id="submenu-database" class="hidden space-y-2 transition-all duration-300">
            
            <!-- Update Data -->
            <button id="btn-database" onclick="switchTab('database')" 
                class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap">
                Update Data
            </button>
            
            <!-- Reset Password -->
            <button id="btn-reset" onclick="switchTab('reset')" 
                class="nav-btn block w-full border border-gray-600 text-gray-400 rounded-2xl py-3 text-center text-sm font-medium hover:text-white hover:border-gray-500 transition duration-200 whitespace-nowrap">
                Reset Password
            </button>
        </div>

    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-sidebarBorder">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center justify-center gap-2 w-full text-red-400 hover:text-red-300 hover:bg-white/5 py-3 rounded-xl transition whitespace-nowrap">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="text-sm font-medium">Log Out</span>
            </button>
        </form>
    </div>

</aside>

<script>
// Toggle Sidebar untuk Mobile
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar-menu');
    const overlay = document.getElementById('sidebar-overlay');
    
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}

// Toggle Submenu Database User
function toggleSubmenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    const icon = document.getElementById('dropdown-icon');
    const parentBtn = document.getElementById('btn-database-parent');
    
    if (submenu.classList.contains('hidden')) {
        submenu.classList.remove('hidden');
        icon.style.transform = 'translateY(-50%) rotate(180deg)';
    } else {
        submenu.classList.add('hidden');
        icon.style.transform = 'translateY(-50%) rotate(0deg)';
    }
}

// Switch Tab Function
function switchTab(tabName) {
    // Reset semua button ke state default
    const allButtons = document.querySelectorAll('.nav-btn');
    allButtons.forEach(btn => {
        btn.classList.remove('bg-white/10', 'text-white', 'border-gray-500');
        btn.classList.add('text-gray-400', 'border-gray-600');
    });
    
    // Aktifkan button yang dipilih
    const activeButton = document.getElementById(`btn-${tabName}`);
    if (activeButton) {
        activeButton.classList.remove('text-gray-400', 'border-gray-600');
        activeButton.classList.add('bg-white/10', 'text-white', 'border-gray-500');
    }
    
    // Jika submenu item diklik, aktifkan juga parent button
    if (tabName === 'database' || tabName === 'reset') {
        const parentBtn = document.getElementById('btn-database-parent');
        parentBtn.classList.remove('text-gray-400', 'border-gray-600');
        parentBtn.classList.add('bg-white/10', 'text-white', 'border-gray-500');
        
        // Buka submenu jika belum terbuka
        const submenu = document.getElementById('submenu-database');
        const icon = document.getElementById('dropdown-icon');
        if (submenu.classList.contains('hidden')) {
            submenu.classList.remove('hidden');
            icon.style.transform = 'translateY(-50%) rotate(180deg)';
        }
    }
    
    // Tutup sidebar di mobile setelah memilih
    if (window.innerWidth < 768) {
        toggleSidebar();
    }
    
    // Di sini tambahkan logika untuk menampilkan konten tab yang sesuai
    console.log('Switched to tab:', tabName);
    
    // Contoh: Hide/Show content sections
    // document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
    // document.getElementById(`content-${tabName}`).classList.remove('hidden');
}

// Initialize - Set dashboard as active on page load
document.addEventListener('DOMContentLoaded', function() {
    switchTab('dashboard');
});
</script>

<style>
/* Custom Scrollbar untuk Sidebar */
#sidebar-menu::-webkit-scrollbar {
    width: 6px;
}

#sidebar-menu::-webkit-scrollbar-track {
    background: transparent;
}

#sidebar-menu::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
}

#sidebar-menu::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.2);
}

/* Smooth transition untuk submenu */
#submenu-database {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease-in-out;
}

#submenu-database:not(.hidden) {
    max-height: 200px;
}

/* Border color variables (tambahkan ke CSS global jika belum ada) */
:root {
    --sidebar-border: rgba(255, 255, 255, 0.1);
}

.border-sidebarBorder {
    border-color: var(--sidebar-border);
}
</style>