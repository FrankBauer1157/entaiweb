@extends('admin.layouts.app')
@section('title', 'Settings')
@section('content')
<h3 class="mb-4" style="color: #1A3C1A;"><i class="fas fa-cog me-2" style="color: #2E7D32;"></i>Settings</h3>

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
            <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-building me-2" style="color:#2E7D32;"></i>Company Info</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $settings['company_name'] ?? 'Entai Kenya') }}">
                </div>
                <div class="col-md-6">
                    <label for="company_email" class="form-label">Email</label>
                    <input type="email" name="company_email" id="company_email" class="form-control" value="{{ old('company_email', $settings['company_email'] ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label for="company_phone" class="form-label">Phone</label>
                    <input type="text" name="company_phone" id="company_phone" class="form-control" value="{{ old('company_phone', $settings['company_phone'] ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label for="company_address" class="form-label">Address</label>
                    <input type="text" name="company_address" id="company_address" class="form-control" value="{{ old('company_address', $settings['company_address'] ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control" accept="image/*" onchange="previewLogo(event)">
                    @if(!empty($settings['logo']))
                        <img src="{{ asset('storage/' . $settings['logo']) }}" class="mt-2 rounded" style="max-height:60px;" alt="Current Logo">
                    @endif
                    <img id="logoPreview" src="#" class="mt-2 rounded" style="display:none; max-height:60px;" alt="Preview">
                </div>
                <div class="col-md-6">
                    <label for="hero_image" class="form-label">Hero Image</label>
                    <input type="file" name="hero_image" id="hero_image" class="form-control" accept="image/*" onchange="previewHero(event)">
                    @if(!empty($settings['hero_image']))
                        <img src="{{ asset('storage/' . $settings['hero_image']) }}" class="mt-2 rounded" style="max-height:60px;" alt="Current Hero">
                    @endif
                    <img id="heroPreview" src="#" class="mt-2 rounded" style="display:none; max-height:60px;" alt="Preview">
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
            <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-info-circle me-2" style="color:#2E7D32;"></i>About Content</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="about_text" class="form-label">About Text</label>
                <textarea name="about_text" id="about_text" class="form-control" rows="5">{{ old('about_text', $settings['about_text'] ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="vision_text" class="form-label">Vision</label>
                <textarea name="vision_text" id="vision_text" class="form-control" rows="3">{{ old('vision_text', $settings['vision_text'] ?? '') }}</textarea>
            </div>
            <div class="mb-0">
                <label for="mission_text" class="form-label">Mission</label>
                <textarea name="mission_text" id="mission_text" class="form-control" rows="3">{{ old('mission_text', $settings['mission_text'] ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
            <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-gem me-2" style="color:#2E7D32;"></i>Core Values</h5>
        </div>
        <div class="card-body">
            @for($i = 1; $i <= 5; $i++)
            <div class="row g-3 mb-3 {{ $i < 5 ? 'border-bottom pb-3' : '' }}">
                <div class="col-md-4">
                    <label for="value_title_{{ $i }}" class="form-label">Value {{ $i }} Title</label>
                    <input type="text" name="value_title_{{ $i }}" id="value_title_{{ $i }}" class="form-control"
                           value="{{ old("value_title_$i", $settings["value_title_$i"] ?? '') }}">
                </div>
                <div class="col-md-8">
                    <label for="value_desc_{{ $i }}" class="form-label">Value {{ $i }} Description</label>
                    <input type="text" name="value_desc_{{ $i }}" id="value_desc_{{ $i }}" class="form-control"
                           value="{{ old("value_desc_$i", $settings["value_desc_$i"] ?? '') }}">
                </div>
            </div>
            @endfor
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
            <h5 class="mb-0" style="color:#1A3C1A;"><i class="fas fa-share-alt me-2" style="color:#2E7D32;"></i>Social Media</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="facebook_url" class="form-label">
                        <i class="fab fa-facebook me-1" style="color:#1877F2;"></i> Facebook URL
                    </label>
                    <input type="url" name="facebook_url" id="facebook_url" class="form-control" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="https://facebook.com/entaikenya">
                </div>
                <div class="col-md-6">
                    <label for="instagram_url" class="form-label">
                        <i class="fab fa-instagram me-1" style="color:#E4405F;"></i> Instagram URL
                    </label>
                    <input type="url" name="instagram_url" id="instagram_url" class="form-control" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" placeholder="https://instagram.com/entaikenya">
                </div>
                <div class="col-md-6">
                    <label for="twitter_url" class="form-label">
                        <i class="fab fa-x-twitter me-1"></i> X (Twitter) URL
                    </label>
                    <input type="url" name="twitter_url" id="twitter_url" class="form-control" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" placeholder="https://x.com/entaikenya">
                </div>
                <div class="col-md-6">
                    <label for="youtube_url" class="form-label">
                        <i class="fab fa-youtube me-1" style="color:#FF0000;"></i> YouTube URL
                    </label>
                    <input type="url" name="youtube_url" id="youtube_url" class="form-control" value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}" placeholder="https://youtube.com/@entaikenya">
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white py-3" style="border-bottom: 2px solid #E8F5E9;">
            <h5 class="mb-0" style="color:#1A3C1A;"><i class="fab fa-whatsapp me-2" style="color:#25D366;"></i>WhatsApp</h5>
        </div>
        <div class="card-body">
            <div class="col-md-6">
                <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
                <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control"
                       value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}" placeholder="+254700000000">
                <small class="text-muted">Include country code, e.g. +254700000000</small>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <button type="submit" class="btn btn-primary-custom btn-lg px-5">
            <i class="fas fa-save me-2"></i>Save Settings
        </button>
    </div>
</form>
@push('scripts')
<script>
function previewLogo(e) { const p = document.getElementById('logoPreview'); p.src = URL.createObjectURL(e.target.files[0]); p.style.display = 'block'; }
function previewHero(e) { const p = document.getElementById('heroPreview'); p.src = URL.createObjectURL(e.target.files[0]); p.style.display = 'block'; }
</script>
@endpush
@endsection
