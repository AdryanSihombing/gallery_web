<form wire:submit.prevent="submit">
    <div class="flex gap-2 mt-2">
        <input wire:model="comment"
            class="w-full px-4 py-1.5 text-primary rounded-xl border border-black bg-[#e6e7eb] focus:outline-none"
            placeholder="Tulis komentar..." required></input>
        <button type="submit"
            class="px-4 py-1 text-white transition rounded-md bg-[#727893] hover:bg-primary hover:text-secondary">Kirim</button>
    </div>
</form>
