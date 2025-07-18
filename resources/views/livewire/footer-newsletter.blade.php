<div
  x-data="{ showPopup: false }"
  @open-newsletter-modal.window="showPopup = true"
  @close-newsletter-modal.window="showPopup = false"
  x-effect="showPopup ? document.body.classList.add('no-scroll') : document.body.classList.remove('no-scroll')"
>

  <!-- STEP 1: First form to collect email -->
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

  <!-- STEP 2: Newsletter popup form -->
  <div
    x-show="showPopup"
    x-cloak
    class="popup-overlay"
  >
    <div class="popup-content" @click.stop>
      <form wire:submit.prevent="submitModal" class="send-newsletter-popup">
        <!-- Close button -->
        <button
          @click="showPopup = false"
          type="button"
          class="popup-close-btn"
        >&times;</button>

        <!-- Ligne avec Nom et Prénom côte à côte -->
        <div class="form-row">
          <!-- Nom -->
          <div class="form-group">
            <label for="nom" class="popup-newsletter-label">Nom</label>
            <input
              id="nom"
              type="text"
              wire:model.defer="first_name"
              placeholder="Entrez votre nom"
              class="form-input popup-newsletter-input"
              autocomplete="off"
              required
            >
          </div>
        
          <!-- Prénom -->
          <div class="form-group">
            <label for="prenom" class="popup-newsletter-label">Prénom</label>
            <input
              id="prenom"
              type="text"
              wire:model.defer="last_name"
              placeholder="Entrez votre prénom"
              class="form-input popup-newsletter-input"
              autocomplete="off"
              required
            >
          </div>
        </div>

        <!-- Email (readonly for confirmation) -->
        <div class="form-group">
          <label for="email" class="popup-newsletter-label">Email</label>
          <input
            id="email"
            type="email"
            wire:model.defer="footerEmail"
            class="form-input popup-newsletter-input"
          >
        </div>

        <!-- Téléphone -->
        <div class="form-group">
          <label for="telephone" class="popup-newsletter-label">Téléphone (optionnel)</label>
          <input
            id="telephone"
            type="tel"
            wire:model.defer="phone"
            placeholder="Entrez votre téléphone"
            class="form-input popup-newsletter-input"
            autocomplete="off"
          >
        </div>

        <!-- Checkboxes -->
        <div class="form-group checkbox-group">
          <div>
            <input type="checkbox" id="checkbox1" required>
            <label for="checkbox1">J’ai lu et j’accepte la note légale <strong><a href="{{ asset('storage/' . $pdfFile->file_path) }}" target="_blank">"BDN-AGENCY"</a></strong>...</label>
          </div>
          <div>
            <input type="checkbox" id="checkbox2" required>
            <label for="checkbox2">J'accepte de recevoir la newsletter quotidienne...</label>
          </div>
          <div>
            <input type="checkbox" id="checkbox3" required>
            <label for="checkbox3">J'accepte de recevoir la newsletter des partenaires...</label>
          </div>
        </div>

        <!-- Submit final popup -->
        <button
          type="submit"
          class="submit-button envoyer-popup-newsletter mt-4"
        >
          Envoyer
        </button>
      </form>
    </div>
  </div>
</div>
