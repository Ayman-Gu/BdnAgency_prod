<div>
    <form wire:submit.prevent="submit" class="send-newsletter">
        <input
            type="email"
            wire:model.defer="footerEmail"
            placeholder="Entrez votre email..."
            class="newsletter-input"
            autocomplete="off"
            required
        >
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

    @error('footerEmail')
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
