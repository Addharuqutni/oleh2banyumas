@extends('admin.layouts.app')

@section('title', 'Edit Toko')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }

        .shop-image {
            position: relative;
            margin-bottom: 15px;
        }

        .shop-image img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .shop-image .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc3545;
            cursor: pointer;
            transition: all 0.2s;
        }

        .shop-image .delete-btn:hover {
            background-color: #dc3545;
            color: white;
        }
        
        /* Styling untuk loading overlay */
        .form-loading {
            position: relative;
        }
        
        .form-loading::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        
        .form-loading::before {
            content: "Menyimpan...";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1001;
            background-color: white;
            padding: 15px 20px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Edit Toko</h1>
            <a href="{{ route('admin.shops.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tampilkan error validasi secara umum -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi kesalahan!</strong> Silakan periksa form Anda.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form id="editShopForm" action="{{ route('admin.shops.update', $shop->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Toko <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $shop->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">Slug URL</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                name="slug" value="{{ old('slug', $shop->slug) }}">
                            <small class="text-muted">Akan digunakan di URL: example.com/detail-toko/[slug]. Kosongi untuk
                                generate otomatis.</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                                required>
                                <option value="active" {{ old('status', $shop->status) == 'active' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="inactive" {{ old('status', $shop->status) == 'inactive' ? 'selected' : '' }}>
                                    Nonaktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2"
                            required>{{ old('address', $shop->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="latitude" class="form-label">Latitude <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('latitude') is-invalid @enderror"
                                id="latitude" name="latitude" value="{{ old('latitude', $shop->latitude) }}" required>
                            @error('latitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="longitude" class="form-label">Longitude <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('longitude') is-invalid @enderror"
                                id="longitude" name="longitude" value="{{ old('longitude', $shop->longitude) }}" required>
                            @error('longitude')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pilih Lokasi di Peta</label>
                        <div id="map"></div>
                        <small class="text-muted">Klik pada peta untuk menentukan lokasi toko</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ old('phone', $shop->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $shop->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="operating_hours" class="form-label">Jam Operasional</label>
                            <input type="text" class="form-control @error('operating_hours') is-invalid @enderror"
                                id="operating_hours" name="operating_hours"
                                value="{{ old('operating_hours', $shop->operating_hours) }}"
                                placeholder="Contoh: Senin-Jumat 08:00-17:00">
                            @error('operating_hours')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="has_delivery" class="form-label">Layanan Antar Jemput</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" id="has_delivery" name="has_delivery" value="1" 
                                    {{ old('has_delivery', $shop->has_delivery) ? 'checked' : '' }}>
                                <label class="form-check-label" for="has_delivery">Tersedia</label>
                            </div>
                        </div>
                    </div>

                    <div class="row delivery-links" id="deliveryLinksContainer" style="{{ old('has_delivery', $shop->has_delivery) ? '' : 'display: none;' }}">
                        <div class="col-md-6 mb-3">
                            <label for="grab_link" class="form-label">Link Grab</label>
                            <input type="url" class="form-control @error('grab_link') is-invalid @enderror" id="grab_link"
                                name="grab_link" value="{{ old('grab_link', $shop->grab_link) }}" placeholder="https://grab.com/...">
                            <small class="text-muted">Link untuk pemesanan via Grab</small>
                            @error('grab_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gojek_link" class="form-label">Link Gojek</label>
                            <input type="url" class="form-control @error('gojek_link') is-invalid @enderror" id="gojek_link"
                                name="gojek_link" value="{{ old('gojek_link', $shop->gojek_link) }}" placeholder="https://gojek.com/...">
                            <small class="text-muted">Link untuk pemesanan via Gojek</small>
                            @error('gojek_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="4">{{ old('description', $shop->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Foto Utama</label>
                        @if ($shop->featured_image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $shop->featured_image) }}" alt="{{ $shop->name }}"
                                    class="img-thumbnail" style="max-height: 200px;">
                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="checkbox" id="remove_featured_image"
                                        name="remove_featured_image">
                                    <label class="form-check-label" for="remove_featured_image">Hapus foto utama</label>
                                </div>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                            id="featured_image" name="featured_image" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF. Maks: 2MB.</small>
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Foto Galeri</label>
                        <div class="row" id="shop-images-container">
                            @if ($shop->images->count() > 0)
                                @foreach ($shop->images as $image)
                                    <div class="col-md-3 col-sm-4 col-6 image-item" data-id="{{ $image->id }}">
                                        <div class="shop-image">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                alt="{{ $image->caption ?? $shop->name }}">
                                            <button type="button" class="delete-btn delete-image-btn" 
                                                data-id="{{ $image->id }}" title="Hapus Foto">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">Belum ada foto galeri.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Tambah Foto Galeri</label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror" id="images"
                            name="images[]" multiple accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, GIF. Maks: 2MB per file. Maks 5 file.</small>
                        @error('images')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('images.*')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.shops.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteImageModal" tabindex="-1" aria-labelledby="deleteImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteImageModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus foto ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            const form = document.getElementById('editShopForm');
            const submitBtn = document.getElementById('submitBtn');

            // Slug generator
            nameInput.addEventListener('input', function() {
                if (!slugInput.value.trim()) {
                    // Only auto-generate if user hasn't manually entered a slug
                    slugInput.value = nameInput.value
                        .toLowerCase()
                        .replace(/\s+/g, '-') // Replace spaces with -
                        .replace(/[^\w\-]+/g, '') // Remove all non-word chars
                        .replace(/\-\-+/g, '-') // Replace multiple - with single -
                        .replace(/^-+/, '') // Trim - from start
                        .replace(/-+$/, ''); // Trim - from end
                }
            });

            // Form submission handler
            form.addEventListener('submit', function(e) {
                // Disable submit button to prevent multiple submissions
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...';
                
                // Add loading class to form
                form.classList.add('form-loading');
                
                // Continue with form submission
                return true;
            });
            
            // Initialize map
            var lat = {{ $shop->latitude ?? 'null' }};
            var lng = {{ $shop->longitude ?? 'null' }};
            
            // Default to center of Indonesia if no coordinates
            if (!lat || !lng) {
                lat = -2.5489;
                lng = 118.0149;
            }
            
            var map = L.map('map').setView([lat, lng], 15);
            var marker;

            // Add OpenStreetMap tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);

            // Add marker for shop location
            marker = L.marker([lat, lng]).addTo(map);

            // Handle map click event
            map.on('click', function(e) {
                // Update latitude and longitude inputs
                document.getElementById('latitude').value = e.latlng.lat.toFixed(8);
                document.getElementById('longitude').value = e.latlng.lng.toFixed(8);

                // Update marker position
                marker.setLatLng(e.latlng);
            });
            
            // Refresh map when it becomes visible (fixes Leaflet rendering issues)
            setTimeout(function() {
                map.invalidateSize();
            }, 100);
            
            // Handle image deletion
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteImageModal'));
            let imageIdToDelete = null;
            let imageElementToRemove = null;
            
            // Handle delete button click
            document.querySelectorAll('.delete-image-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    imageIdToDelete = this.getAttribute('data-id');
                    imageElementToRemove = document.querySelector(`.image-item[data-id="${imageIdToDelete}"]`);
                    deleteModal.show();
                });
            });
            
            // Handle confirm delete button
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                if (imageIdToDelete) {
                    // Add loading state
                    if (imageElementToRemove) {
                        imageElementToRemove.classList.add('deleting');
                    }
                    
                    // Send AJAX request to delete the image
                    fetch(`{{ url('admin/shop-images') }}/${imageIdToDelete}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Remove the image element from DOM
                        if (imageElementToRemove) {
                            imageElementToRemove.remove();
                        }
                        
                        // Show success message
                        const alertContainer = document.createElement('div');
                        alertContainer.className = 'alert alert-success alert-dismissible fade show';
                        alertContainer.innerHTML = `
                            ${data.message || 'Foto berhasil dihapus.'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        `;
                        document.querySelector('.container-fluid').insertBefore(alertContainer, document.querySelector('.card'));
                        
                        // Check if there are no more images
                        const remainingImages = document.querySelectorAll('.image-item');
                        if (remainingImages.length === 0) {
                            const noImagesMessage = document.createElement('div');
                            noImagesMessage.className = 'col-12';
                            noImagesMessage.innerHTML = '<p class="text-muted">Belum ada foto galeri.</p>';
                            document.getElementById('shop-images-container').appendChild(noImagesMessage);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Remove loading state
                        if (imageElementToRemove) {
                            imageElementToRemove.classList.remove('deleting');
                        }
                        
                        // Show error message
                        const alertContainer = document.createElement('div');
                        alertContainer.className = 'alert alert-danger alert-dismissible fade show';
                        alertContainer.innerHTML = `
                            Terjadi kesalahan saat menghapus foto.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        `;
                        document.querySelector('.container-fluid').insertBefore(alertContainer, document.querySelector('.card'));
                    })
                    .finally(() => {
                        deleteModal.hide();
                        imageIdToDelete = null;
                        imageElementToRemove = null;
                    });
                }
            });
            
            // File validation
            const imageInput = document.getElementById('featured_image');
            const multipleImagesInput = document.getElementById('images');
            
            function validateFileSize(input) {
                if (input.files) {
                    for (let i = 0; i < input.files.length; i++) {
                        const fileSize = input.files[i].size / 1024 / 1024; // in MB
                        if (fileSize > 2) {
                            alert('File terlalu besar! Maksimal ukuran file adalah 2MB.');
                            input.value = '';
                            return false;
                        }
                    }
                }
                return true;
            }
            
            imageInput.addEventListener('change', function() {
                validateFileSize(this);
            });
            
            multipleImagesInput.addEventListener('change', function() {
                validateFileSize(this);
            });
        });
    </script>
@endsection