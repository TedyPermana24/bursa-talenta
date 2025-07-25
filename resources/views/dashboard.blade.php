<x-user-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search and Filter Section -->
        <div class="flex items-center justify-between space-x-4 mb-8 p-4 border border-gray-300 rounded-lg">
            <!-- Filter Box -->
            <x-filter-box />

            <!-- Search Box -->
            <x-search-box />
        </div>

        <!-- Job Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @for ($i = 0; $i < 6; $i++)
                <x-job-card />
            @endfor
        </div>
    </div>
</x-user-layout>