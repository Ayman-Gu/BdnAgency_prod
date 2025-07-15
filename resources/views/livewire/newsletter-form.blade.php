<div class="sidebar-widget newsLetter-block">
    <h5 class="text-center ps-3 fw-bold rounded-3">Newsletter</h5>
    <p class="mt-3 text-center">Subscribe for the latest updates</p>
    <form wire:submit.prevent="submit" class="send-newsletter">
        <input type="email" wire:model.defer="sidebarEmail" placeholder="Entrez votre email..." class="newsletter-input" autocomplete="off" required>
        <button type="submit" class="newsletter-button">
            <i class="bi bi-arrow-right-circle-fill"></i>
        </button>
    </form>

   @if (session()->has('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="newsletter-success mt-3 text-center"
        >
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @error('sidebarEmail')
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3000)"
            x-show="show"
            x-transition
            class="newsletter-error mt-3 text-center"
        >
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            {{ $message }}
        </div>
    @enderror

</div>
