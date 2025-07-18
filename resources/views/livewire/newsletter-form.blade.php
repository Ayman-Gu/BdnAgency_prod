<div class="sidebar-widget newsLetter-block">
    <h5 class="text-center ps-3 fw-bold rounded-3">Newsletter</h5>
    <p class="mt-3 text-center">Subscribe for the latest updates</p>
    <form wire:submit.prevent="submit" class="send-newsletter">
        <input type="email" wire:model.defer="sidebarEmail" placeholder="Entrez votre email..." class="newsletter-input" autocomplete="off" required>
        <button type="submit" class="newsletter-button">
            <i class="bi bi-arrow-right-circle-fill"></i>
        </button>
    </form>

  <div
  x-data="{ showSidebarPopup: false }"
  @open-sidebar-modal.window="showSidebarPopup = true"
  @close-sidebar-modal.window="showSidebarPopup = false"
  x-effect="showSidebarPopup ? document.body.classList.add('no-scroll') : document.body.classList.remove('no-scroll')"
>
  <!-- STEP 2: Sidebar popup form -->
  <div
    x-show="showSidebarPopup"
    x-cloak
    class="popup-overlay"
  >
    <div class="popup-content" @click.stop>
      <form wire:submit.prevent="submitSidebarModal" class="send-newsletter-popup">
        <!-- Close button -->
        <button
          @click="showSidebarPopup = false"
          type="button"
          class="popup-close-btn"
        >&times;</button>

        <!-- Nom & Prénom -->
        <div class="form-row">
          <div class="form-group">
            <label for="sidebar-nom" class="popup-newsletter-label">Nom</label>
            <input id="sidebar-nom" type="text" wire:model.defer="first_name" placeholder="Entrez votre nom" class="form-input popup-newsletter-input" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="sidebar-prenom" class="popup-newsletter-label">Prénom</label>
            <input id="sidebar-prenom" type="text" wire:model.defer="last_name" placeholder="Entrez votre prénom" class="form-input popup-newsletter-input" autocomplete="off" required>
          </div>
        </div>

        <!-- Email (readonly) -->
        <div class="form-group">
          <label for="sidebar-email" class="popup-newsletter-label">Email</label>
          <input id="sidebar-email" type="email" wire:model.defer="sidebarEmail" class="form-input popup-newsletter-input">
        </div>

        <!-- Téléphone -->
        <div class="form-group">
          <label for="sidebar-telephone" class="popup-newsletter-label">Téléphone (optionnel)</label>
          <input id="sidebar-telephone" type="tel" wire:model.defer="phone" placeholder="Entrez votre téléphone" class="form-input popup-newsletter-input" autocomplete="off">
        </div>

        <!-- Checkboxes -->
        <div class="form-group checkbox-group">
          <div>
            <input type="checkbox" id="sidebar-checkbox1" required>
            <label for="sidebar-checkbox1">J’ai lu et j’accepte la note légale <strong><a href="{{ asset('storage/' . $pdfFile->file_path) }}" target="_blank">"BDN-AGENCY"</a></strong></label>
          </div>
          <div>
            <input type="checkbox" id="sidebar-checkbox2" required>
            <label for="sidebar-checkbox2">J'accepte de recevoir la newsletter quotidienne...</label>
          </div>
          <div>
            <input type="checkbox" id="sidebar-checkbox3" required>
            <label for="sidebar-checkbox3">J'accepte de recevoir la newsletter des partenaires...</label>
          </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="submit-button envoyer-popup-newsletter mt-4">Envoyer</button>
      </form>
    </div>
  </div>
</div>

</div>
