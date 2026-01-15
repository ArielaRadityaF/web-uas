<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleepy Panda - Jurnal Tidur Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #2d3561 0%, #1a1d3a 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="min-h-screen text-white p-6">
    
    
    <!-- Title -->
    <h2 class="text-3xl font-bold text-center mb-8">Jurnal Tidur Report</h2>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left Column - Summary Cards -->
        <div class="lg:col-span-1 space-y-4 scrollbar-hide" style="max-height: 600px; overflow-y: auto;">
            <div id="summaryCards" class="space-y-4">
                <!-- Cards will be inserted here by JavaScript -->
            </div>
        </div>

        <!-- Right Column - Chart -->
        <div class="lg:col-span-2 bg-[#3a4068]/60 p-8 rounded-3xl">
            <!-- Period Selector at Top Right -->
            <div class="flex justify-end mb-6">
                <div class="relative">
                    <select id="periodFilter" onchange="updatePeriod(this.value)" 
                        class="bg-[#2d3561] text-white text-lg font-bold py-3 px-6 pr-12 rounded-xl appearance-none cursor-pointer focus:outline-none border-2 border-transparent hover:border-blue-400 transition">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-white">
                        <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Chart Header -->
            <div class="mb-6">
                <div id="chartHeaderLayout">
                    <div id="chartHeaderLeft">
                        <h3 class="text-xl text-gray-300 mb-2">Users</h3>
                        <p class="text-5xl font-bold" id="totalUsers">2500</p>
                    </div>
                    <div class="flex justify-end mt-4">
                        <div class="relative">
                            <select id="chartDateFilter" onchange="updateChartDate(this.value)" 
                                class="bg-[#2d3561] text-white text-sm font-medium py-2 px-4 pr-10 rounded-xl appearance-none cursor-pointer focus:outline-none">
                                <option value="date1">12 Agustus 2023</option>
                                <option value="date2">1 Juni -7 Juni 2023</option>
                                <option value="date3">Juni 2023</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="h-[450px]">
                <canvas id="mainChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        let chartInstance = null;

        const periodData = {
            daily: {
                cards: [
                    {
                        title: '12 Agustus 2023',
                        users: 1000,
                        avgSleep: '7 jam 2 menit',
                        avgWake: '21:30 - 06:10'
                    },
                    {
                        title: '12 Agustus 2023',
                        users: 1000,
                        avgSleep: '7 jam 2 menit',
                        avgWake: '21:30 - 06:10'
                    },
                    {
                        title: '12 Agustus 2023',
                        users: 1000,
                        avgSleep: '7 jam 2 menit',
                        avgWake: '21:30 - 06:10'
                    }
                ],
                chart: {
                    labels: ['0j', '2j', '4j', '6j', '8j'],
                    data: [2, 1000, 100, 50, 2200],
                    type: 'line',
                    maxValue: 2500
                }
            },
            weekly: {
                cards: [
                    {
                        title: '1 Juni - 7 Juni 2023',
                        users: 4000,
                        avgSleep: '8 jam 2 menit',
                        avgWake: '21:08',
                        avgWakeTime: '06:30'
                    }
                ],
                chart: {
                    labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    data: [5000, 7500, 4000, 9000, 7000, 7000, 3500],
                    type: 'bar',
                    maxValue: 10000
                }
            },
            monthly: {
                cards: [
                    {
                        title: 'Juni 2023',
                        users: 5000,
                        avgSleep: '8 jam 2 menit',
                        totalSleep: '60 jam 51 menit',
                        avgWake: '21:58',
                        avgWakeTime: '07:10'
                    },
                    {
                        title: 'Mei 2023',
                        users: 8000,
                        avgSleep: '7 jam 35 menit',
                        totalSleep: '63 jam 18 menit',
                        avgWake: '22:48',
                        avgWakeTime: '06:40'
                    }
                ],
                chart: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    data: [800, 4500, 9000, 10000],
                    type: 'bar',
                    maxValue: 10000
                }
            }
        };

        function renderSummaryCards(period) {
            const container = document.getElementById('summaryCards');
            const cards = periodData[period].cards;
            
            container.innerHTML = cards.map(card => `
                <div class="bg-[#4a5080] p-6 rounded-2xl">
                    <h3 class="text-base font-medium mb-4 text-center">${card.title}</h3>
                    <div class="flex items-center gap-3 mb-5">
                        <span class="text-3xl">😊</span>
                        <div>
                            <p class="text-xs text-gray-300">User</p>
                            <p class="text-xl font-bold">${card.users}</p>
                        </div>
                    </div>
                    <div class="grid ${card.totalSleep ? 'grid-cols-2' : 'grid-cols-1'} gap-4">
                        <div class="flex items-start gap-2">
                            <span class="text-xl mt-1">😴</span>
                            <div>
                                <p class="text-[11px] text-gray-300 leading-tight">Average Durasi Tidur</p>
                                <p class="text-sm font-semibold mt-1">${card.avgSleep}</p>
                            </div>
                        </div>
                        ${card.totalSleep ? `
                        <div class="flex items-start gap-2">
                            <span class="text-xl mt-1">⭐</span>
                            <div>
                                <p class="text-[11px] text-gray-300 leading-tight">Total Durasi Tidur</p>
                                <p class="text-sm font-semibold mt-1">${card.totalSleep}</p>
                            </div>
                        </div>
                        ` : ''}
                        <div class="flex items-start gap-2">
                            <span class="text-xl mt-1">🌙</span>
                            <div>
                                <p class="text-[11px] text-gray-300 leading-tight">${card.avgWakeTime ? 'Average Mulai Tidur' : 'Average Waktu Tidur'}</p>
                                <p class="text-sm font-semibold mt-1">${card.avgWake}</p>
                            </div>
                        </div>
                        ${card.avgWakeTime ? `
                        <div class="flex items-start gap-2">
                            <span class="text-xl mt-1">⏰</span>
                            <div>
                                <p class="text-[11px] text-gray-300 leading-tight">Average Bangun Tidur</p>
                                <p class="text-sm font-semibold mt-1">${card.avgWakeTime}</p>
                            </div>
                        </div>
                        ` : ''}
                    </div>
                </div>
            `).join('');
        }

        function renderChart(period) {
            const ctx = document.getElementById('mainChart').getContext('2d');
            const chartData = periodData[period].chart;

            if (chartInstance) {
                chartInstance.destroy();
            }

            const isLine = chartData.type === 'line';

            const config = {
                type: chartData.type,
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Users',
                        data: chartData.data,
                        backgroundColor: isLine ? 'transparent' : 
                            chartData.data.map((val) => {
                                const max = Math.max(...chartData.data);
                                return val === max ? '#ef4444' : '#cd5a64';
                            }),
                        borderColor: isLine ? '#fbbf24' : 'transparent',
                        borderWidth: isLine ? 3 : 0,
                        pointBackgroundColor: isLine ? '#fbbf24' : 'transparent',
                        pointBorderColor: isLine ? '#fbbf24' : 'transparent',
                        pointRadius: isLine ? 6 : 0,
                        pointHoverRadius: isLine ? 8 : 0,
                        tension: 0.4,
                        fill: false,
                        borderRadius: !isLine ? 5 : 0,
                        barThickness: !isLine ? 50 : undefined
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            type: isLine ? 'logarithmic' : 'linear',
                            max: chartData.maxValue,
                            grid: { 
                                color: 'rgba(255,255,255,0.05)',
                                drawBorder: false
                            },
                            ticks: { 
                                color: '#a0a0b0',
                                font: { size: 12 },
                                callback: function(value) {
                                    if (isLine) {
                                        if (value === 10) return '10';
                                        if (value === 100) return '100';
                                        if (value === 1000) return '1000';
                                        if (value === 2000) return '2000';
                                        if (value === 2500) return '2500';
                                        return '';
                                    }
                                    if (value === 0) return '0j';
                                    return (value / 1000) + 'j';
                                }
                            },
                            border: { display: false }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { 
                                color: '#a0a0b0',
                                font: { size: 13 }
                            },
                            border: { display: false }
                        }
                    }
                }
            };

            chartInstance = new Chart(ctx, config);
            
            // Update total users display
            const total = chartData.maxValue;
            document.getElementById('totalUsers').textContent = total;
        }

        function updatePeriod(period) {
            renderSummaryCards(period);
            renderChart(period);
            
            // Show/hide "Users" header based on period (only show for daily)
            const headerLeft = document.getElementById('chartHeaderLeft');
            if (period === 'daily') {
                headerLeft.style.display = 'block';
            } else {
                headerLeft.style.display = 'none';
            }
            
            // Update date filter based on period
            const dateFilter = document.getElementById('chartDateFilter');
            if (period === 'daily') {
                dateFilter.value = 'date1';
            } else if (period === 'weekly') {
                dateFilter.value = 'date2';
            } else {
                dateFilter.value = 'date3';
            }
        }

        function updateChartDate(dateValue) {
            // This function can be expanded to handle different date selections
            console.log('Date changed to:', dateValue);
        }

        // Initialize with daily view
        setTimeout(() => {
            renderSummaryCards('daily');
            renderChart('daily');
            // Show Users header for daily
            document.getElementById('chartHeaderLeft').style.display = 'block';
        }, 100);
    </script>
</body>
</html>