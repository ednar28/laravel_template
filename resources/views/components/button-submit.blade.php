<div x-data="{ submitting: false }">
    <button class="w-28 btn btn-primary" x-bind:disabled="submitting" @click.debounce.100="submitting = true"
        type="submit">
        {{$label}}
        <template x-if="submitting">
            <span class="absolute dot"></span>
        </template>
    </button>
</div>