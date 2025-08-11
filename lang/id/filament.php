<?php

return [
    'direction' => 'ltr',
    'buttons' => [
        'dark_mode' => [
            'label' => 'Mode Gelap',
        ],
        'light_mode' => [
            'label' => 'Mode Terang',
        ],
        'logout' => [
            'label' => 'Keluar',
        ],
        'sidebar' => [
            'collapse' => [
                'label' => 'Tutup Sidebar',
            ],
            'expand' => [
                'label' => 'Buka Sidebar',
            ],
        ],
        'user_menu' => [
            'account' => [
                'label' => 'Akun',
            ],
            'profile' => [
                'label' => 'Profil',
            ],
        ],
    ],
    'widgets' => [
        'account' => [
            'heading' => 'Selamat Datang, :name',
        ],
    ],
    'pages' => [
        'dashboard' => [
            'title' => 'Dashboard',
        ],
    ],
    'resources' => [
        'label' => 'Label',
        'plural_label' => 'Label Jamak',
        'navigation_label' => 'Label Navigasi',
        'navigation_icon' => 'Ikon Navigasi',
        'navigation_group' => 'Grup Navigasi',
        'navigation_sort' => 'Urutan Navigasi',
        'navigation_count_badge' => 'Badge Jumlah Navigasi',
        'pagination_label' => 'navigasi paginasi :label',
        'table' => [
            'actions' => [
                'attach' => [
                    'label' => 'Lampirkan',
                ],
                'bulk_actions' => [
                    'label' => 'Aksi Massal',
                ],
                'create' => [
                    'label' => 'Buat :label',
                ],
                'delete' => [
                    'label' => 'Hapus',
                ],
                'delete_selected' => [
                    'label' => 'Hapus yang Dipilih',
                ],
                'detach' => [
                    'label' => 'Lepaskan',
                ],
                'edit' => [
                    'label' => 'Edit',
                ],
                'replicate' => [
                    'label' => 'Replikasi',
                ],
                'view' => [
                    'label' => 'Lihat',
                ],
            ],
            'filters' => [
                'actions' => [
                    'reset' => [
                        'label' => 'Reset Filter',
                    ],
                ],
                'indicator' => 'Filter Aktif',
            ],
            'reorder_indicator' => 'Seret dan lepas record untuk mengurutkan.',
            'selection_indicator' => [
                'selected_count' => '{1} 1 record dipilih.|[2,*] :count record dipilih.',
                'actions' => [
                    'select_all' => [
                        'label' => 'Pilih semua :count',
                    ],
                    'deselect_all' => [
                        'label' => 'Batalkan pilihan',
                    ],
                ],
            ],
            'sorting' => [
                'fields' => [
                    'column' => 'Kolom',
                    'direction' => 'Arah',
                ],
            ],
        ],
    ],
    'fields' => [
        'bulk_select_page' => [
            'label' => 'Pilih/batalkan pilihan semua item untuk aksi massal.',
        ],
        'bulk_select_record' => [
            'label' => 'Pilih/batalkan pilihan item :key untuk aksi massal.',
        ],
        'file_upload' => [
            'editor' => [
                'actions' => [
                    'cancel' => [
                        'label' => 'Batal',
                    ],
                    'drag_crop' => [
                        'label' => 'Mode seret "crop"',
                    ],
                    'drag_move' => [
                        'label' => 'Mode seret "move"',
                    ],
                    'flip_horizontal' => [
                        'label' => 'Balik gambar secara horizontal',
                    ],
                    'flip_vertical' => [
                        'label' => 'Balik gambar secara vertikal',
                    ],
                    'move_down' => [
                        'label' => 'Pindahkan gambar ke bawah',
                    ],
                    'move_left' => [
                        'label' => 'Pindahkan gambar ke kiri',
                    ],
                    'move_right' => [
                        'label' => 'Pindahkan gambar ke kanan',
                    ],
                    'move_up' => [
                        'label' => 'Pindahkan gambar ke atas',
                    ],
                    'reset' => [
                        'label' => 'Reset',
                    ],
                    'rotate_left' => [
                        'label' => 'Putar gambar ke kiri',
                    ],
                    'rotate_right' => [
                        'label' => 'Putar gambar ke kanan',
                    ],
                    'set_aspect_ratio' => [
                        'label' => 'Atur rasio aspek ke :ratio',
                    ],
                    'save' => [
                        'label' => 'Simpan',
                    ],
                    'zoom_100' => [
                        'label' => 'Zoom gambar ke 100%',
                    ],
                    'zoom_in' => [
                        'label' => 'Zoom in',
                    ],
                    'zoom_out' => [
                        'label' => 'Zoom out',
                    ],
                ],
            ],
        ],
        'key_value' => [
            'actions' => [
                'add' => [
                    'label' => 'Tambah baris',
                ],
                'delete' => [
                    'label' => 'Hapus baris',
                ],
                'reorder' => [
                    'label' => 'Urutkan ulang baris',
                ],
            ],
            'fields' => [
                'key' => [
                    'label' => 'Kunci',
                ],
                'value' => [
                    'label' => 'Nilai',
                ],
            ],
        ],
        'markdown_editor' => [
            'toolbar_buttons' => [
                'attach_files' => 'Lampirkan File',
                'bold' => 'Tebal',
                'bullet_list' => 'Daftar Bullet',
                'code_block' => 'Blok Kode',
                'edit' => 'Edit',
                'italic' => 'Miring',
                'link' => 'Link',
                'ordered_list' => 'Daftar Berurutan',
                'preview' => 'Pratinjau',
                'strike' => 'Coret',
            ],
        ],
        'repeater' => [
            'actions' => [
                'add' => [
                    'label' => 'Tambah ke :label',
                ],
                'delete' => [
                    'label' => 'Hapus',
                ],
                'clone' => [
                    'label' => 'Klon',
                ],
                'reorder' => [
                    'label' => 'Pindah',
                ],
                'move_down' => [
                    'label' => 'Pindah ke bawah',
                ],
                'move_up' => [
                    'label' => 'Pindah ke atas',
                ],
                'collapse' => [
                    'label' => 'Tutup',
                ],
                'expand' => [
                    'label' => 'Buka',
                ],
                'collapse_all' => [
                    'label' => 'Tutup semua',
                ],
                'expand_all' => [
                    'label' => 'Buka semua',
                ],
            ],
        ],
        'rich_editor' => [
            'dialogs' => [
                'link' => [
                    'actions' => [
                        'link' => 'Link',
                        'unlink' => 'Hapus link',
                    ],
                    'label' => 'URL',
                    'placeholder' => 'Masukkan URL',
                ],
            ],
            'toolbar_buttons' => [
                'attach_files' => 'Lampirkan File',
                'blockquote' => 'Blockquote',
                'bold' => 'Tebal',
                'bullet_list' => 'Daftar Bullet',
                'code_block' => 'Blok Kode',
                'h1' => 'Judul',
                'h2' => 'Heading',
                'h3' => 'Subheading',
                'italic' => 'Miring',
                'link' => 'Link',
                'ordered_list' => 'Daftar Berurutan',
                'redo' => 'Redo',
                'strike' => 'Coret',
                'underline' => 'Garis bawah',
                'undo' => 'Undo',
            ],
        ],
        'select' => [
            'actions' => [
                'create_option' => [
                    'modal' => [
                        'heading' => 'Buat',
                        'actions' => [
                            'create' => [
                                'label' => 'Buat',
                            ],
                            'create_another' => [
                                'label' => 'Buat & buat lainnya',
                            ],
                        ],
                    ],
                ],
                'edit_option' => [
                    'modal' => [
                        'heading' => 'Edit',
                        'actions' => [
                            'save' => [
                                'label' => 'Simpan',
                            ],
                        ],
                    ],
                ],
            ],
            'boolean' => [
                'true' => 'Ya',
                'false' => 'Tidak',
            ],
            'loading_message' => 'Memuat...',
            'max_items_message' => 'Hanya :count yang dapat dipilih.',
            'no_search_results_message' => 'Tidak ada opsi yang cocok dengan pencarian Anda.',
            'placeholder' => 'Pilih opsi',
            'searching_message' => 'Mencari...',
            'search_prompt' => 'Mulai mengetik untuk mencari...',
        ],
        'tags_input' => [
            'placeholder' => 'Tag baru',
        ],
        'textarea' => [
            'actions' => [
                'expand' => [
                    'label' => 'Perluas',
                ],
                'collapse' => [
                    'label' => 'Tutup',
                ],
            ],
        ],
        'toggle_buttons' => [
            'boolean' => [
                'true' => 'Ya',
                'false' => 'Tidak',
            ],
        ],
    ],
    'actions' => [
        'attach' => [
            'label' => 'Lampirkan',
        ],
        'attach_another' => [
            'label' => 'Lampirkan & lampirkan lainnya',
        ],
        'attach_and_detach' => [
            'label' => 'Lampirkan & lepaskan',
        ],
        'bulk_actions' => [
            'label' => 'Aksi massal',
        ],
        'cancel' => [
            'label' => 'Batal',
        ],
        'create' => [
            'label' => 'Buat',
        ],
        'create_another' => [
            'label' => 'Buat & buat lainnya',
        ],
        'delete' => [
            'label' => 'Hapus',
        ],
        'delete_selected' => [
            'label' => 'Hapus yang dipilih',
        ],
        'detach' => [
            'label' => 'Lepaskan',
        ],
        'detach_selected' => [
            'label' => 'Lepaskan yang dipilih',
        ],
        'edit' => [
            'label' => 'Edit',
        ],
        'export' => [
            'label' => 'Ekspor',
        ],
        'filter' => [
            'label' => 'Filter',
        ],
        'import' => [
            'label' => 'Impor',
        ],
        'new' => [
            'label' => 'Baru',
        ],
        'open_bulk_actions' => [
            'label' => 'Aksi massal',
        ],
        'open_actions' => [
            'label' => 'Aksi terbuka',
        ],
        'replicate' => [
            'label' => 'Replikasi',
        ],
        'save' => [
            'label' => 'Simpan',
        ],
        'save_and_add_another' => [
            'label' => 'Simpan & tambah lainnya',
        ],
        'save_and_continue' => [
            'label' => 'Simpan & lanjutkan',
        ],
        'save_changes' => [
            'label' => 'Simpan perubahan',
        ],
        'view' => [
            'label' => 'Lihat',
        ],
    ],
    'modal' => [
        'confirmation' => [
            'actions' => [
                'confirm' => [
                    'label' => 'Konfirmasi',
                ],
                'cancel' => [
                    'label' => 'Batal',
                ],
            ],
        ],
        'require_confirmation' => [
            'actions' => [
                'confirm' => [
                    'label' => 'Konfirmasi',
                ],
                'cancel' => [
                    'label' => 'Batal',
                ],
            ],
        ],
    ],
    'notifications' => [
        'actions' => [
            'close' => [
                'label' => 'Tutup',
            ],
            'mark_all_as_read' => [
                'label' => 'Tandai semua sebagai dibaca',
            ],
        ],
        'empty' => [
            'heading' => 'Tidak ada notifikasi',
            'description' => 'Silakan periksa kembali nanti.',
        ],
        'indicator' => 'Notifikasi baru',
    ],
    'pagination' => [
        'label' => 'Navigasi paginasi',
        'overview' => 'Menampilkan :first hingga :last dari :total hasil',
        'fields' => [
            'records_per_page' => [
                'label' => 'per halaman',
                'options' => [
                    'all' => 'Semua',
                ],
            ],
        ],
        'actions' => [
            'go_to_page' => [
                'label' => 'Pergi ke halaman :page',
            ],
            'next' => [
                'label' => 'Berikutnya',
            ],
            'previous' => [
                'label' => 'Sebelumnya',
            ],
        ],
    ],
    'tabs' => [
        'more' => 'Lebih banyak',
    ],
];



