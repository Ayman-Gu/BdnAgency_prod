<div class="container py-4">
    <div class="row g-4">
      <!-- Left Card -->
      <div class="col-md-6">
        <div class="card shadow-lg h-100">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $editingId ? 'Edit' : 'Add' }} Team Member</h5>
          </div>
          <div class="card-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data" id="leftForm">
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" wire:model.defer="name" placeholder="Full Name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Job</label>
                <input type="text" class="form-control" wire:model.defer="position" placeholder="Position" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" wire:model="image">
                @if ($image)
                  <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail" width="100">
                  </div>
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
  
      <!-- Right Card -->
      <div class="col-md-6">
        <div class="card shadow-lg h-100">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Social Media Links</h5>
          </div>
          <div class="card-body">
            <!-- No separate form tag so submit button can stay in left card, or you can merge forms -->
            <div class="mb-3">
              <label class="form-label">Twitter</label>
              <input type="text" class="form-control" wire:model.defer="twitter" placeholder="Twitter Link">
            </div>
            <div class="mb-3">
              <label class="form-label">Facebook</label>
              <input type="text" class="form-control" wire:model.defer="facebook" placeholder="Facebook Link">
            </div>
            <div class="mb-3">
              <label class="form-label">Instagram</label>
              <input type="text" class="form-control" wire:model.defer="instagram" placeholder="Instagram Link">
            </div>
            <div class="mb-3">
              <label class="form-label">LinkedIn</label>
              <input type="text" class="form-control" wire:model.defer="linkedin" placeholder="LinkedIn Link">
            </div>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-success" form="leftForm">
              {{ $editingId ? 'Update Member' : 'Add Member' }}
            </button>
          </div>
        </div>
      </div>
    </div>

    <hr class="my-4">

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($members as $member)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" class="card-img-top" alt="{{ $member->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $member->name }}</h5>
                        <p class="card-text">{{ $member->position }}</p>
                        <div class="d-flex gap-2">
                            @if($member->twitter)<a href="{{ $member->twitter }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-twitter-x"></i></a>@endif
                            @if($member->facebook)<a href="{{ $member->facebook }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-facebook"></i></a>@endif
                            @if($member->instagram)<a href="{{ $member->instagram }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-instagram"></i></a>@endif
                            @if($member->linkedin)<a href="{{ $member->linkedin }}" class="btn btn-sm btn-outline-primary" target="_blank"><i class="bi bi-linkedin"></i></a>@endif
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button wire:click="edit({{ $member->id }})" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button wire:click="delete({{ $member->id }})" class="btn btn-danger btn-sm" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
