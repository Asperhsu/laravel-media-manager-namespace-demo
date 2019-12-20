<media-manager-modal inline-template>
    <div v-cloak>
        <div v-if="inputName">@include('MediaManager::extras.modal')</div>
        <media-modal item="image" :name="inputName"></media-modal>
    </div>
</media-manager-modal>

@push('styles')
    <style> [v-cloak] { display: none; } </style>
@endpush
