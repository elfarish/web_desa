<div id="sidebar-wrapper" class="bg-success text-white min-vh-100 shadow-sm position-sticky" style="top:0;">
    {{-- Sidebar Heading --}}
    <div class="sidebar-heading fw-bold px-3 py-4 border-bottom d-flex align-items-center">
        <i class="bi bi-speedometer2 me-2 fs-4"></i>
        <span>Admin Desa</span>
    </div>

    {{-- List Menu --}}
    <div class="list-group list-group-flush">

        {{-- Single Links --}}
        @php
            $singleLinks = [
                ['route' => 'admin.dashboard', 'icon' => 'house-door', 'label' => 'Dashboard'],
                ['route' => 'admin.struktural.index', 'icon' => 'people', 'label' => 'Struktural'],
                ['route' => 'admin.potensi.index', 'icon' => 'tree', 'label' => 'Potensi Desa'],
                ['route' => 'admin.berita.index', 'icon' => 'newspaper', 'label' => 'Berita'],
                ['route' => 'admin.galeri.index', 'icon' => 'images', 'label' => 'Galeri'],
                ['route' => 'admin.pengaturan.index', 'icon' => 'sliders', 'label' => 'Pengaturan'],
            ];
        @endphp

        @foreach ($singleLinks as $link)
            <a href="{{ route($link['route']) }}"
                class="list-group-item list-group-item-action bg-success text-white border-0 d-flex align-items-center
               {{ Request::is(str_replace('.index', '*', $link['route'])) ? 'active-sidebar' : '' }}">
                <i class="bi bi-{{ $link['icon'] }} me-2 fs-5"></i>
                {{ $link['label'] }}
            </a>
        @endforeach

        {{-- Dropdown Menus --}}
        @php
            $dropdownMenus = [
                [
                    'label' => 'Layanan',
                    'icon' => 'gear',
                    'collapseId' => 'layananMenu',
                    'items' => [
                        [
                            'route' => 'admin.layanan.template_surat',
                            'icon' => 'file-earmark-text',
                            'label' => 'Template Surat',
                        ],
                        [
                            'route' => 'admin.layanan.pengajuan_proposal.index',
                            'icon' => 'envelope-paper',
                            'label' => 'Pengajuan Proposal',
                        ],
                    ],
                ],
                [
                    'label' => 'Beranda User',
                    'icon' => 'columns-gap',
                    'collapseId' => 'berandaMenu',
                    'items' => [
                        ['route' => 'admin.beranda.slide.index', 'icon' => 'images', 'label' => 'Slide Foto'],
                        [
                            'route' => 'admin.beranda.statistik.index',
                            'icon' => 'bar-chart-line',
                            'label' => 'Statistik',
                        ],
                    ],
                ],
            ];
        @endphp

        @foreach ($dropdownMenus as $menu)
            <a class="list-group-item list-group-item-action bg-success text-white border-0 d-flex justify-content-between align-items-center"
                data-bs-toggle="collapse" href="#{{ $menu['collapseId'] }}" role="button"
                aria-expanded="{{ Request::is('admin/' . strtolower($menu['label']) . '*') ? 'true' : 'false' }}">
                <span><i class="bi bi-{{ $menu['icon'] }} me-2 fs-5"></i> {{ $menu['label'] }}</span>
                <i class="bi bi-caret-down-fill dropdown-icon"></i>
            </a>
            <div class="collapse {{ Request::is('admin/' . strtolower($menu['label']) . '*') ? 'show' : '' }}"
                id="{{ $menu['collapseId'] }}">
                <div class="list-group list-group-flush">
                    @foreach ($menu['items'] as $item)
                        <a href="{{ route($item['route']) }}"
                            class="list-group-item list-group-item-action bg-success text-white border-0 ps-4
                           {{ Request::is(str_replace('.index', '*', $item['route'])) ? 'active-sidebar' : '' }}">
                            <i class="bi bi-{{ $item['icon'] }} me-2"></i> {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
</div>

<style>
    /* Hover halus */
    #sidebar-wrapper .list-group-item {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    #sidebar-wrapper .list-group-item:hover {
        background: #198754 !important;
        color: #fff !important;
        transform: translateX(4px);
    }

    /* Sidebar aktif */
    .active-sidebar {
        background: #145c32 !important;
        font-weight: 600;
        color: #fff !important;
    }

    /* Collapse caret smooth rotate */
    .dropdown-icon {
        transition: transform 0.3s ease;
    }
</style>

{{-- JS untuk panah collapse --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownLinks = document.querySelectorAll('a[data-bs-toggle="collapse"]');

        dropdownLinks.forEach(link => {
            const collapseEl = document.querySelector(link.getAttribute('href'));
            const icon = link.querySelector('.dropdown-icon');

            if (collapseEl && icon) {
                if (collapseEl.classList.contains('show')) icon.style.transform = 'rotate(180deg)';

                collapseEl.addEventListener('show.bs.collapse', () => icon.style.transform =
                    'rotate(180deg)');
                collapseEl.addEventListener('hide.bs.collapse', () => icon.style.transform =
                    'rotate(0deg)');
            }
        });
    });
</script>
